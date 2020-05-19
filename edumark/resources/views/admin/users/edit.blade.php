@extends('layout.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <h1 class="mt-3">Form Ubah Data User</h1>

            <form method="POST" action="/admin/users/{{ $user->id }}">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan Nama" value="{{ $user->name }}">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email" value="{{ $user->email }}">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-5">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
@endsection