@extends('layout.master')
@section('content')
<div class="container">
    @if(Session::has('pesan'))
        <div class="alert alert-success">{{Session::get('pesan')}}</div>
    @endif
    <h4>List Items</h4>
    <p align="right">
        <a href="{{ route('market.create') }}" class="btn btn-primary">
            + Jual
        </a>
    </p>
    <form action="{{ route('market.search') }}" method="get">@csrf
        <input type="text" name="kata" class="form-control" placeholder="Cari..." style="width:30%; display:inline; margin-top:10px; margin-bottom:10px; float:right;">
    </form>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Kondisi</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Harga</th>
                <th>Tgl. Ditambahkan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_market as $market)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $market->produk }}</td>
                    <td>{{ $market->kondisi }}</td>
                    <td>{{ $market->deskripsi }}</td>
                    <td><img src="{{ $market->foto != null ? asset('images/'.$market->foto) : asset('image-not-found.jpg') }}" style="width: 100px"></td>

                    <td>{{ "Rp ".number_format($market->harga,2,',','.') }}</td>
                    <td>{{ $market->tgl_ditambahkan->format('d/m/Y') }}</td>
                    <td>
                        <form action="{{ route('market.destroy',$market->id) }}" method="post">
                            @csrf
                            <a href="{{ route('market.edit',$market->id) }}" class="btn btn-info">ubah</a>
                            <button type="submit" class="btn btn-danger" onClick="return confirm('Apakah anda yakin menghapus?')">
                                hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <div class="kiri"><strong>Items: {{ $jumlah_market }}</strong></div>
        <div class="kanan">{{ $data_market->links() }}</div>
    </div>
</div>
@endsection
