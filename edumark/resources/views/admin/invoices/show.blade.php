@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-search-plus"></i> Detail Invoice
    </div>

    <table class="table table-hover table-bordered table-striped">
        <h3>Kode Invoice : {{$invoice['id_invoice']}}</h3>
        <img class="mb-3" style="width:480px" src="/uploads/{{ $invoice['gambar_course'] }}">
        <tr>
            <th>Nama</th>
            <td>{{ $invoice['name'] }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $invoice['email'] }}</td>
        </tr>
        <tr>
            <th>Course</th>
            <td>{{ $invoice['nama_course'] }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $invoice['keterangan_course'] }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ $invoice['kategori_course'] }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>{{ $invoice['harga_course'] }}</td>
        </tr>
        <tr>
            <th>Rating</th>
            <td>{{ $invoice['rating_course'] }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $invoice['tgl_transaksi'] }}</td>
        </tr>
    </table>

    <a href="/admin/invoices" class="btn btn-primary btn-sm mb-5">Kembali</a>
</div>
@endsection