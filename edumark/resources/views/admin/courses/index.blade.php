@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <h4>List Course</h4>

    <a href="/admin/courses/create"><button class="btn btn-sm btn-primary mb-3"><i class="fas fa-sm fa-plus"></i> Tambah Course</button></a>
    <a href=""> <button class="btn btn-sm btn-danger mb-3"><i class="fas fa-file-pdf"></i> Export PDF</button></a>

    <table class="table table-bordered table-striped" id="data_course">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Course</th>
                <th>Keterangan</th>
                <th>Harga</th>
                <th>Rating</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $course['nama_course'] }}</td>
                <td>{{ $course['keterangan_course'] }}</td>
                <td>{{ $course['harga_course'] }}</td>
                <td>{{ $course['rating_course'] }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/admin/courses/{{ $course['id_course'] }}"><button type="button" class="btn btn-success btn-sm mr-1"><i class="fas fa-search-plus"></i> Detail</button></a>
                        <a href="/admin/courses/{{ $course['id_course'] }}/edit"><button type="button" class="btn btn-primary btn-sm mr-1"><i class="fa fa-edit"></i> Edit</button></a>
                        <form action="courses/{{ $course['id_course'] }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection