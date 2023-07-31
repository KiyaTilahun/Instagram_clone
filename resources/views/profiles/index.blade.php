@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->ProfileImage() }}"  alt="" class="rounded-circle w-100">
        </div>
        <div class="col-9 ps-5 pt-4">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-2">
                <div class="h4 me-4">{{ $user['username']}}</div>
                
                <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                </div>
                @can('update',$user->profile)
                <a href="/p/create">Add new Post</a>
                @endcan

            </div>
            @can('update',$user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex ">
                <div class="pe-5"><strong>{{$postCounter}}</strong> posts</div>
                <div class="pe-5"><strong>{{$followerCounter}}</strong> followers</div>
                <div class="pe-5"><strong>{{$followingCounter}}</strong> following</div>
            </div>
            <div class="fw-bold">
                <!-- መወለድ ቋንቋ ነው< -->
                <div class="pt-3"><strong>{{ $user->profile->title }}</strong></div>
                <div>{{ $user->profile['description'] }}</div>
                <div><a href="#">{{ $user->profile['url'] }}</a></div>
            </div>
        </div>
        <div class="row pt-4">
            @foreach($user->posts as $posts)
            <div class="col-4  mb-4">
<a href="/p/{{$posts->id}}">
<img src="/storage/{{ $posts->image }}" alt="" class="w-100">
</a>           
 </div>

            @endforeach
        </div>

    </div>
</div>

@endsection