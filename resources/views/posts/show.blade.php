@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row pt-5 mb-5">            
            <div class="card">
                <div class="row p-2">
                    <div class="col-md-6">                    
                        <img src="/storage/{{ $post->image }}" alt="" class="w-100">
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <img src="/storage/{{ $post->user->profile->image }}" width="50px" alt="" class="rounded-circle">                    
                            <div class="ml-2">
                                <a href="{{ route('profile.show', $post->id) }}" class="font-weight-bold text-dark">{{ $post->user->username }}</a>
                                <a href="{{ route('profile.show', $post->id) }}" class="font-weight-bold text-success ml-2">Follwo</a>
                            </div>
                        </div>
                        <div class="mt-3 font-weight-bold">{{ $post->user->profile->title }}</div>
                        <div class="font-weight-bold">{{ $post->caption }}</div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection
