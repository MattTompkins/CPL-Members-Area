<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Access\Gate;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class ManageMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('access members');
        return view('members.show-members');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create members');
        $roles = Role::all();

        return view('members.create-member')->with('roles', $roles);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first-name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'repeat-password' => 'required|same:password',
        ], [
            'first-name.required' => 'The first name field is required.',
            'surname.required' => 'The surname field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters.',
            'repeat-password.required' => 'The repeat password field is required.',
            'repeat-password.same' => 'The repeat password does not match the password.',
        ]);

        $user = User::create(
            [
                'name' => $validated['first-name'] . ' ' . $validated['surname'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );

        $roleIds = $request->input('roles', []);
        $roles = Role::whereIn('id', $roleIds)->get();
        $user->syncRoles($roles);

        app('toast')->create('New user has been successfully created.', 'success');

        return redirect()->route('members.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->authorize('edit members');
        $userData = User::find($id);
    
        if (!$userData) {
            abort(404, 'User not found');
        }
    
        $roles = Role::all();
        $userRoles = $userData->roles;
    
        // Add the password field to the compact() function
        return view('members.edit-member', compact('userData', 'roles', 'userRoles'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('edit members');
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|string|min:6|confirmed',
            'roles' => 'array',
            'roles.*' => 'exists:roles,id',
        ]);
    
        $userData = User::findOrFail($id);
    
        $userData->name = $request->input('name');
        $userData->email = $request->input('email');
        if ($request->filled('password')) {
            $userData->password = Hash::make($request->input('password'));
        }
        $userData->save();
    
        $userData->roles()->sync($request->input('roles', []));
        
        
        app('toast')->create( "$userData->name's account has been successfully updated!", 'success');
        return redirect()->route('members.index')->with('success', 'User updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
