<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\ToastService;
use App\Models\User;

class EventController extends Controller
{
    /**
     * Display a listing of the resource (View events)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('start_date')->get();
        return view('events.view-events')->with('events', $events);
    }

    /**
     * Display a list for managing events
     *
     * @return \Illuminate\Http\Response
     */
    public function manageEvents()
    {
        return view('events.manage-events');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create event');
        $users = User::all();
        return view('events.create-events')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create event');
        // Validate the form fields
        $validatedData = $request->validate([
            'event-title' => 'required',
            'description' => 'required',
            'event-location' => 'required',
            'start-date' => 'required|date',
            'end-date' => 'nullable|date',
            'file-upload' => 'nullable|image|max:10240', // Max file size: 10MB
        ]);

        // Create a new Event instance and set its properties
        $event = new Event();
        $event->event_title = $validatedData['event-title'];
        $event->description = $validatedData['description'];
        $event->location = $validatedData['event-location'];
        $event->start_date = $validatedData['start-date'];
        $event->end_date = $validatedData['end-date'];

        $event->save();

        // Store the cover photo if provided
        if ($request->hasFile('file-upload')) {
            $banner_image = $request->file('file-upload');
            $bannerImagePath = $banner_image->store('banner-photos', 'public');
            $event->banner_image = config('app.url') . Storage::url($bannerImagePath);
            $event->save();
        }

        $status = 'upcoming';
        $currentDate = strtotime('today');

        if ($validatedData['end-date'] && strtotime($validatedData['end-date']) < $currentDate) {
            $status = 'finished';
        } elseif (!$validatedData['end-date'] && strtotime($validatedData['start-date']) < $currentDate) {
            $status = 'finished';
        } elseif (strtotime($validatedData['start-date']) <= $currentDate && (!$validatedData['end-date'] || strtotime($validatedData['end-date']) >= $currentDate)) {
            $status = 'ongoing';
        }


        $event->status = $status;
        $event->show_on_website = $request->has('publish_on_website');
        $event->members_only = $request->has('members_only');
        $event->managed_by = $request->event_manager;
        $event->save();

        app('toast')->create('A new event has been sucessfully created.', 'success');

        return redirect()->route('events.show', $event->id)->with('success', 'Event created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        if ($event['managed_by']) {
            $manager = User::find($event['managed_by']);
            $event['managed_by'] = $manager['name'];
            $event['managed_by_profile_image'] = $manager['profile_image'];
        }
        return view('events.single-event')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('edit event');
        $event = Event::find($id);
        $users = User::all();
        return view('events.edit-events', compact('event', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('edit event');
        $event = Event::find($id);

        // Validate the form fields
        $validatedData = $request->validate([
            'event-title' => 'required',
            'description' => 'required',
            'event-location' => 'required',
            'start-date' => 'required|date',
            'end-date' => 'nullable|date',
            'file-upload' => 'nullable|image|max:10240', // Max file size: 10MB
        ]);

        // Update the Event instance with new properties
        $event->event_title = $validatedData['event-title'];
        $event->description = $validatedData['description'];
        $event->location = $validatedData['event-location'];
        $event->start_date = $validatedData['start-date'];
        $event->end_date = $validatedData['end-date'];

        if ($request->hasFile('file-upload')) {
            // Store the new cover photo
            $banner_image = $request->file('file-upload');
            $bannerImagePath = $banner_image->store('banner-photos', 'public');
            $event->banner_image = config('app.url') . Storage::url($bannerImagePath);
        }

        $status = 'upcoming';
        $currentDate = strtotime('today');

        if ($validatedData['end-date'] && strtotime($validatedData['end-date']) < $currentDate) {
            $status = 'finished';
        } elseif (!$validatedData['end-date'] && strtotime($validatedData['start-date']) < $currentDate) {
            $status = 'finished';
        } elseif (strtotime($validatedData['start-date']) <= $currentDate && (!$validatedData['end-date'] || strtotime($validatedData['end-date']) >= $currentDate)) {
            $status = 'ongoing';
        }

        $event->status = $status;
        $event->show_on_website = $request->has('publish_on_website');
        $event->members_only = $request->has('members_only');
        $event->managed_by = $request->event_manager;

        $event->save();

        app('toast')->create('The event has been successfully updated.', 'success');

        return redirect()->route('events.show', $event->id)->with('success', 'Event updated successfully!');
    }
}
