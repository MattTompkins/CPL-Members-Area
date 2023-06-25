<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\AccountSetting;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $accountSettings = AccountSetting::where('user_id', $user->id)->first();

        return view('profile.edit', [
            'user' => $user,
            'accountSettings' => $accountSettings,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile image
     */
    public function updateImage(Request $request)
    {
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $path = $photo->store('profile-images', 'public');

            $user = $request->user();
            $user->profile_image = config('app.url') . Storage::url($path);
            $user->save();

            return redirect()->back()->with('status', 'image-updated');
        }

        return redirect()->back()->withErrors(['photo' => 'Please upload a profile image.']);
    }


    /**
     * Update the user's account settings
     */
    public function updateAccountSettings(Request $request)
    {
        $user = $request->user();
        $accountSettings = $user->accountSettings;
    
        // Update the account settings
        $accountSettings->update([
            'show_profile' => $request->has('show_profile') ? $request->boolean('show_profile') : false,
            'show_contact_info' => $request->has('show_contact_info') ? $request->boolean('show_contact_info') : false,
            'show_qualifications' => $request->has('show_qualifications') ? $request->boolean('show_qualifications') : false,
            'show_my_events' => $request->has('show_my_events') ? $request->boolean('show_my_events') : false,
            'show_my_training' => $request->has('show_my_training') ? $request->boolean('show_my_training') : false,
            'receive_emails' => $request->has('receive_emails') ? $request->boolean('receive_emails') : false,
        ]);
    
        app('toast')->create('Your account settings have been updated.', 'success');
        return redirect()->back()->with('status', 'settings-updated');
    }
    


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
