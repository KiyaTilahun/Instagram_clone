<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{
    public function index($user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user) : false;


        $user = User::findOrFail($user);
        $postCounter = Cache::remember('count.posts.' . $user->id, now()->addSeconds(30), function () use ($user) {
            return $user->posts->count();
        });
        $followerCounter = Cache::remember('count.followers.' . $user->id, now()->addSeconds(30), function () use ($user) {
            return $user->profile->followers->count();
        });
        $followingCounter = Cache::remember('count.following.' . $user->id, now()->addSeconds(30), function () use ($user) {
            return $user->following->count();
        });
        // dd($follows);

        return view('profiles.index', compact('user', 'follows', 'postCounter', 'followingCounter', 'followerCounter'));
    }
    public function edit(User $user)
    {


        // $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => '',
            'image' => '',
        ]);

        if (request('image')) {
            $imagepath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagepath}"))->fit(1000, 1000);
            $image->save();
            $imageArray = ['image' => $imagepath];
        }

        $user->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
