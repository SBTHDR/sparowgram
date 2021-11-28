@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Post</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title"><strong>{{ __('Title') }}</strong></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $user->profile->title }}"  autocomplete="title" autofocus>
                            
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                                        
                        </div>

                        <div class="form-group">
                            <label for="description"><strong>{{ __('Description') }}</strong></label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $user->profile->description }}"  autocomplete="description" autofocus>
                            
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                                        
                        </div>
                        
                        <div class="form-group">
                            <label for="image"><strong>{{ __('Image') }}</strong></label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        @error('image')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
