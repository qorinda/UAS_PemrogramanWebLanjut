@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <h4>Invoice Pembelian Course</h4>

    <a href=""> <button class="btn btn-sm btn-danger mb-3"><i class="fas fa-file-pdf"></i> Export PDF</button></a>

    <table class="table table-bordered table-hover table-striped" id="invoice">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Course</th>
                <th>Tanggal Pembelian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $invoice['name'] }}</td>
                <td>{{ $invoice['email'] }}</td>
                <td>{{ $invoice['nama_course'] }}</td>
                <td>{{ $invoice['tgl_transaksi'] }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/admin/invoices/{{ $invoice['id_invoice'] }}"><button type="button" class="btn btn-primary btn-sm mr-3">Detail</button></a>
                        <form action="invoices/{{ $invoice['id_invoice'] }}" method="POST" class="d-inline">
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