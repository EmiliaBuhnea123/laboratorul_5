<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    protected function handleAvatar($avatar)
    {
        if ($avatar) {
            $path = $avatar->store('avatars', 'public');
            return $path; 
        }
        return null; 
    }

    public function create()
    {
        return view('tasks.profile.create');
    }

    public function store(ProfileRequest $request){
        $validatedData = $request->validated();

        $avatarPath = null;
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $avatarPath = $this->handleAvatar($request->file('avatar'));
        }

       Profile::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'avatar' => $avatarPath, 
            'user_id' => auth()->user()->id, 
        ]);

        return redirect()->route('home')->with('status', 'Profilul a fost creat cu succes!');

    }


    public function show($id)
    {

        $profiles = Profile::where('user_id', $id)->firstOrFail();

        if (Gate::denies('view-profile', $profiles)) {
            abort(403, 'Nu ai permisiunea să accesezi acest profil.');
        }

        return view('tasks.profile.show', [
            'profiles' => $profiles,
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
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
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}