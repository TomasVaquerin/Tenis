<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function show(Request $request)
    {
        return view('auth.show', [
            'user' => $request->user()
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('auth.edit', [
            'user' => $request->user(),
        ]);
    }


    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();

        // Update user's profile information
        $user->fill($data);
        $user->save();

        // Update password if provided
        if ($request->filled('password')) {
            // Validate current password
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => __('The current password is incorrect.')]);
            }

            // Validate new password confirmation
            $request->validate([
                'password' => 'required|confirmed|min:8',
            ]);

            // Update password
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('profile.show')->with('status', 'Profile updated successfully.');
    }


    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


}
