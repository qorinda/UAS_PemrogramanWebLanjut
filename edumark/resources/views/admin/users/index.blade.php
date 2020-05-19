@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <h4>List Member</h4>

    <a href=""> <button class="btn btn-sm btn-danger mb-3"><i class="fas fa-file-pdf"></i> Export PDF</button></a>

    <table class="table table-bordered table-hover table-striped" id="list_member">
        <thead>
            <tr>
                <th>No</th>
                <th>ID User</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>User-{{ $user['id'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/admin/users/{{ $user['id'] }}/edit"><button type="button" class="btn btn-primary btn-sm mr-1"><i class="fa fa-edit"></i> Edit</button></a>
                        <form action="users/{{ $user['id'] }}" method="POST" class="d-inline">
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