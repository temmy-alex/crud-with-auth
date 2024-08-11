{{-- @extends('layouts.base') --}}

{{-- @section('content') --}}
<h1 class="text-center">Show Name</h1>
<form action="{{ route('page.viewname') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="title">Fullname</label>
        <input type="text" name="fullname" class="form-control"
            id="fullname" aria-describedby="fullname" value="{{ old('fullname') }}">
    </div>

    <p>Full Name : {{ $fullname ?? 'Tidak ada nama' }}</p>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
{{-- @endsection --}}
