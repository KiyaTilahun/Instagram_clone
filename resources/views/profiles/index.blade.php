@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ asset('images/kiya.jpg') }}" alt="" class="rounded-circle w-100">
        </div>
        <div class="col-9 ps-5 pt-4">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user['username']}}</h1>
                <a href="/p/create">Add new Post</a>
            </div>
            <div class="d-flex ">
                <div class="pe-5"><strong>0</strong> posts</div>
                <div class="pe-5"><strong>84</strong> followers</div>
                <div class="pe-5"><strong>100</strong> following</div>
            </div>
            <div class="fw-bold">
            <!-- መወለድ ቋንቋ ነው< -->
            <div class="pt-3"><strong>{{ $user->profile->title }}</strong></div>
            <div>{{  $user->profile['description'] }}</div>
            <div><a href="#">{{  $user->profile['url'] }}</a></div>
            </div>
        </div>
        <div class="row pt-4">
            @foreach($user->posts as $posts)
            <div class="col-4"><img src="/storage/{{ $posts->image }}" alt="" class="w-100"></div>
           
            @endforeach
        </div>
        
    </div>
</div>
@endsection