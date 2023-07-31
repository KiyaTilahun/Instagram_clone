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


    public function index(){
        $user=auth()->user()->following()->pluck('profiles.user_id');
        $posts=Post::whereIn('user_id',$user)->with('user')->latest()->paginate(1);
// dd($posts);
return view('posts.index',compact('posts'));
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


}
