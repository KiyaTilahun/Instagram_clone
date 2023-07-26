@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$posts->image}}" alt="" class="w-100">

        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pe-5">
                        <img src="{{$posts->user->profile->ProfileImage()}}" alt="" class="rounded-circle w-100" style="max-width:40px">
                    </div>
                    <div class="font-weight-bold">
                        <div class="fw-bold">
                          <a href="/profile/{{$posts->user->id}}" class="text-dark text-decoration-none">  <span >{{$posts->user->username}}</span></a>
                          <a href="" class="ps-2 text-decoration-none">Follow <sup></sup></a>
</div>
                    </div>
                </div>
                <hr class="hr">
                <p><span class="fw-bold"> <a href="/profile/{{$posts->user->id}}" class="text-dark text-decoration-none">  <span>{{$posts->user->username}}</span></a></span> {{$posts->caption}}</p>
            </div>
        </div>
    </div>
</div>
@endsection