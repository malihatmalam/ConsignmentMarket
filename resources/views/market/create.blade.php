@extends('layout.master')
@section('content')
    <div class="container">
        
        <h4>Tambah Buku</h4>
        @if(count($errors)>0)
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form method="post" action="{{ route('market.store') }}" enctype="multipart/form-data">
        @csrf
        <table>
            <tr> 
                <td>Produk</td><td><input type="text" class="form-control" name="produk"></td>
            </tr>
            <tr>
                <td>Kondisi</td><td><input type="text" class="form-control" name="kondisi"></td>
            </tr>
            <tr>
                <td>Deskripsi</td><td><input type="text" class="form-control" name="deskripsi"></td>
            </tr>
            <tr>
                <td>Foto</td><td><input type="file" class="form-control" name="foto"></td>
            </tr>
            <tr>
                <td>Harga</td><td><input type="text" class="form-control" name="harga"></td>
            </tr>
            <tr>
                <td>Tgl Ditambahkan</td><td class="date"><input type="text" class="form-control" class="date"  name="tgl_ditambahkan"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" class="btn btn-light">Simpan</button>
                <a class="btn btn-light" href="/market">Batal</a>
                </td>
            </tr>
        </table>
    </div>
@endsection
