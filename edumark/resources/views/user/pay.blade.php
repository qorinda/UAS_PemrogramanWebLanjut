@extends('layout.user')
<style>
    .main-header-area {
        background-color: #b42dd7;
    }
</style>
@section('content')
<br><br><br><br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="btn btn-sm btn-info">
                <h3>Course : {{$course->nama_course}}</h4>
            </div><br>
            <hr>
            <div class="btn btn-sm btn-success mt-0">
                <h5>Harga : {{ $course->harga_course}}</h4>
            </div><br><br>
            <h3>Input Pembayaran</h3>
            <form method="POST" action="/courses/paid_off/{{ $users[0]->id }}/{{ $course->id }}">
                @csrf
                <input type="hidden" value="{{ $users[0]->id }}" name="id_user">
                <input type="hidden" value="{{ $course->id }}" name="id_course">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap Anda" value="{{ $users[0]->name }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email Anda" value="{{ $users[0]->email }}">
                </div>
                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <select class="form-control" name="metode">
                        <option>--Pilih Metode Pembayaran--</option>
                        <option>Mandiri</option>
                        <option>BRI</option>
                        <option>BNI</option>
                        <option>GoPay</option>
                        <option>Ovo</option>
                        <option>Dana</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Bayar</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<br><br><br><br><br><br><br>
@endsection