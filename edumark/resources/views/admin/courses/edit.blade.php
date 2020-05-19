@extends('layout.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <h1 class="mt-3">Form Ubah Data Course</h1>

            <img src="/uploads/{{ $course['gambar_course'] }}" width="480px"><br><br>

            <form method="POST" action="/admin/courses/{{ $course->id }}">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="id_teacher">ID Pengajar</label>
                    <input type="text" class="form-control @error('id_teacher') is-invalid @enderror" id="id_teacher" name="id_teacher" placeholder="Masukkan ID Pengajar" value="{{ $course->id_teacher }}">
                    @error('id_teacher') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="nama_course">Nama Course</label>
                    <input type="text" class="form-control @error('nama_course') is-invalid @enderror" id="nama_course" name="nama_course" placeholder="Masukkan Nama" value="{{ $course->nama_course }}">
                    @error('nama_course') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="keterangan_course">Keterangan Course</label>
                    <input type="text" class="form-control @error('keterangan_course') is-invalid @enderror" id="keterangan_course" name="keterangan_course" placeholder="Masukkan Keterangan" value="{{ $course->keterangan_course }}">
                    @error('keterangan_course') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="kategori_course">Kategori Course</label>
                    <input type="text" class="form-control @error('kategori_course') is-invalid @enderror" id="kategori_course" name="kategori_course" placeholder="Masukkan Kategori" value="{{ $course->kategori_course }}">
                    @error('kategori_course') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="harga_course">Harga Course</label>
                    <input type="text" class="form-control @error('harga_course') is-invalid @enderror" id="harga_course" name="harga_course" placeholder="Masukkan Harga" value="{{ $course->harga_course }}">
                    @error('harga_course') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="rating_course">Rating Course</label>
                    <input type="text" class="form-control @error('rating_course') is-invalid @enderror" id="rating_course" name="rating_course" placeholder="Masukkan Rating" value="{{ $course->rating_course }}">
                    @error('rating_course') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="gambar_course">Gambar Course</label>
                    <input type="file" class="form-control" id="gambar_course" name="gambar_course" placeholder="Masukkan Gambar" value="{{ old('gambar_course') }}">
                </div>
                <button type="submit" class="btn btn-primary mb-5">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
@endsection