<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function settings()
    {
        return view('profile.settings');
    }

    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        if ($user->profile_picture) {
            Storage::delete($user->profile_picture);
        }

        $path = $request->file('profile_picture')->store('profile_pictures', 'public');

        $user->update(['profile_picture' => $path]);

        return back()->with('success', 'Profile picture updated successfully.');
    }

    public function removeProfilePicture()
    {
        $user = auth()->user();

        if ($user->profile_picture) {
            Storage::delete($user->profile_picture);
            $user->update(['profile_picture' => null]);
        }

        return back()->with('success', 'Profile picture removed successfully.');
    }

    public function show()
    {
        $bookmarks = auth()->user()
                          ->bookmarks()
                          ->with(['article' => function($query) {
                              $query->select('id', 'title', 'thumbnail', 'author', 'category', 'created_at');
                          }])
                          ->latest()
                          ->get();
        
        return view('profile', compact('bookmarks'));
    }

    public function updateCategories(Request $request)
    {
        $user = auth()->user();
        $user->categories = $request->input('categories', []);
        $user->save();
    
        return redirect()->route('profile.settings')->with('success', 'Categories successfully updated.');
    }
}
