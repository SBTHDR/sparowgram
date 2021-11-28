@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <img src="/storage/{{ $user->profile->image }}" width="180px" class="rounded-circle" alt="">
        </div>
        <div class="col-md-9">
            <div class="">
                <div class="d-flex align-items-center justify-content-between">
                    <h1>{{ $user->username }}</h1>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @can('update', $user->profile)
                        <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary">Add a post</a>
                    @endcan
                </div>
                @can('update', $user->profile)
                    <div class="mb-2">
                        <a href="{{ route('profile.edit', $user->id) }}">Edit Profile</a>
                    </div>
                @endcan
            </div>
            <div class="d-flex">
                <div class="pr-4"><strong>{{ $user->posts->count() }}</strong> Posts</div>
                <div class="pr-4"><strong>{{ $user->profile->followers->count() }}</strong> Followers</div>
                <div class="pr-4"><strong>{{ $user->following->count() }}</strong> Following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>

        <div class="row pt-5 mb-5">            
            @foreach ($user->posts as $post)
                <div class="col-md-4">
                    <a href="{{ route('post.show', $post->id) }}">
                        <img src="/storage/{{ $post->image }}" alt="" class="w-100">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
