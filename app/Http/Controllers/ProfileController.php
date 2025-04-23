<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'phone_number' => 'nullable|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = auth()->user();

        // Upload photo if available
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('public/profile_photos');
            $user->profile_photo_path = str_replace('public/', 'storage/', $path);
        }

        $user->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'phone_number' => $request->phone_number,
            'profile_photo_path' => $user->profile_photo_path,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}