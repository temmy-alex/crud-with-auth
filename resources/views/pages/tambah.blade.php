{{-- @extends('layouts.base') --}}

{{-- @section('content') --}}
<h1 class="text-center">Tambah Pengguna</h1>
<form action="{{ route('simpan.data') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="nama">nama</label>
        <input type="text" name="nama" class="form-control"
            id="nama" aria-describedby="nama" value="{{ old('nama') }}">
    </div>
    <div class="form-group">
        <label for="title">Email</label>
        <input type="text" name="email" class="form-control"
            id="email" aria-describedby="email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="title">Alamat</label>
        <input type="text" name="alamat" class="form-control"
            id="alamat" aria-describedby="alamat" value="{{ old('alamat') }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
{{-- @endsection --}}
