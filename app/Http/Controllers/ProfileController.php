<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function create()
    {
        return view('profiles.create');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $imagePath = request('image')->store('profile', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->profile()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user) : false;

        return view('profiles.index', compact('user', 'follows'));
    }


    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 300);
            $image->save();

            auth()->user()->profile()->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'image' => $imagePath,
            ]);
        }

        auth()->user()->profile()->update([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }
}
