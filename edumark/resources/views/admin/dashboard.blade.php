@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Selamat Datang!</h4>
        <p>Selamat Datang di <strong>Sistem Informasi Online Course</strong></p>
        <hr>
        <a href="admin/courses"><button type="button" class="btn btn-primary">Data Course</button></a>
        <a href=""><button type="button" class="btn btn-info">Data Invoice</button></a>
        <a href=""><button type="button" class="btn btn-primary">Verifikasi Member</button></a>
        <a href=""><button type="button" class="btn btn-info">List Member</button></a>
    </div>
</div>
@endsection