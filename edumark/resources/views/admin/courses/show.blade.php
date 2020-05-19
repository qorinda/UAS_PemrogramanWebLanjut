@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-search-plus"></i> Detail Course
    </div>

    <img src="/uploads/{{ $course['gambar_course'] }}" width="480px"><br>

    <table class="table table-hover table-bordered table-striped">
        <img class="mb-3" style="width:200px" src="">
        <tr>
            <th>Nama</th>
            <td>{{ $course['nama_course'] }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $course['keterangan_course'] }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ $course['kategori_course'] }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>{{ $course['harga_course'] }}</td>
        </tr>
        <tr>
            <th>Rating</th>
            <td>{{ $course['rating_course'] }}</td>
        </tr>
        <tr>
            <th>Pengajar</th>
            <td>{{ $course['nama_teacher'] }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $course['job_teacher'] }}</td>
        </tr>
        <tr>
            <th>Foto</th>
            <td><img src="/uploads/{{ $course['gambar_teacher'] }}" width="100px"></td>
        </tr>
    </table>

    <a href="/admin/courses" class="btn btn-primary btn-sm mb-5">Kembali</a>
</div>
@endsection