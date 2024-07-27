@extends('layouts.base')

@section('title', 'List Post')

@section('content')
<h1 class="text-center">List Post</h1>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Detail</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $post->title }}</td>
          <td>{{ $post->description }}</td>
          <td>@mdo</td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
