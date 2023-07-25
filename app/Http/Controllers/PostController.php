<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
use Intervention\Image\Facades\Image;
use GuzzleHttp\Middleware;


class PostController extends Controller
{
    public function __construct()

    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);
        $imagepath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagepath}"))->fit(1200, 1200);
        $image->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagepath
        ]);


        return redirect('/profile/' . auth()->user()->id);
    }




    public function show(\App\Models\Post $posts)
    {


        return view('posts.show', compact('posts'));
    }


  
