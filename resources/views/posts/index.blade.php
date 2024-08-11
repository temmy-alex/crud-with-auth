@extends('layouts.base')

@section('title', 'List Post')

@section('content')
@include('layouts.include.message')

<h1 class="text-center mb-4">List Post</h1>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $key => $post)
            <tr>
                <th scope="row">
                    {{ ($posts->currentpage()-1) * $posts->perpage() + $key + 1 }}

                    {{-- {{ $loop->iteration }} --}}
                </th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->category->name }}</td>
                <td>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success">Edit</a>

                    <button id="delete" data-title="{{ $post->title }}"
                        href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger btn-sm" style="font-weight: bold;">
                        <i class="la la-trash" style="font-size: 1.5em; font-weight: bold;"></i>
                        Delete
                    </button>

                    <form method="post" id="deleteForm">
                        @csrf
                        @method("DELETE")

                        <input type="submit" value="" style="display:none;">
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>

<ul class="pagination">
    {{ $posts->links() }}
</ul>
@endsection

@push('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('button#delete').on('click', function () {
        var href = $(this).attr('href');
        var title = $(this).data('title');

        swal({
                title: "Are you sure delete " + title + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById('deleteForm').action = href;
                    document.getElementById('deleteForm').submit();
                    swal("Data booking member has been deleted!", {
                        icon: "success",
                    });
                }
            });
    });
</script>
@endpush
