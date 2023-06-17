<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Services\ToastService;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('access contacts');
        return view('exec.show-contacts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create contacts');
        return view('exec.create-contact');
    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    $this->authorize('create contacts');

    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'organisation' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone1' => 'nullable|string|max:255',
        'phone2' => 'nullable|string|max:255',
        'notes' => 'nullable|string',
    ]);

    $contact = new Contact();
    $contact->name = $validatedData['name'];
    $contact->organisation = $validatedData['organisation'];
    $contact->email = $validatedData['email'];
    $contact->phone1 = $validatedData['phone1'];
    $contact->phone2 = $validatedData['phone2'];
    $contact->notes = $validatedData['notes'];

    $contact->save();

    app('toast')->create('A new contact has been created successfully', 'success');
    return redirect()->route('contacts.index');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('show contacts');
        $contact = Contact::find($id);
        return view('exec.single-contact')->with('contact', $contact);
    }

}
