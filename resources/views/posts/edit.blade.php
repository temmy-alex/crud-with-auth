@extends('layouts.base')

@section('title', 'Edit Post')

@section('content')
@include('layouts.include.message')

<h1 class="text-center">Edit Post</h1>
<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control"
            id="title" aria-describedby="title" value="{{ old('title', $post->title) }}">

            @error('title')
                {{-- <div class="text-danger">
                    <small>{{ $message }}</small>
                </div> --}}

                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" class="form-control"
            id="description" value="{{ old('description', $post->description) }}">

        @error('description')
            {{-- <div class="text-danger">
                <small>{{ $message }}</small>
            </div> --}}

            <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control" id="image">

        @error('image')
            <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
