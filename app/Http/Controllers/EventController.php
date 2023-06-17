<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\ToastService;

class EventController extends Controller
{
    /**
     * Display a listing of the resource (View events)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
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
        return view('events.create-events');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        if ($request->has('save_as_draft')) {
            $status = 'draft';
        } elseif ($validatedData['end-date'] && strtotime($validatedData['end-date']) < $currentDate) {
            $status = 'finished';
        } elseif (!$validatedData['end-date'] && strtotime($validatedData['start-date']) < $currentDate) {
            $status = 'finished';
        } elseif (strtotime($validatedData['start-date']) <= $currentDate && (!$validatedData['end-date'] || strtotime($validatedData['end-date']) >= $currentDate)) {
            $status = 'ongoing';
        }
        
        $event->status = $status;
        
        $event->show_on_website = $request->has('publish_on_website');
        $event->members_only = $request->has('members_only');
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
    public function show(Event $event)
    {

        return view('events.single-event')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
