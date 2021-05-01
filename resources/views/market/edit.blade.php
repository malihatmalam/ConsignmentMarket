@extends('layout.master')
@section('content')
    <div class="container">
        @if(Session::has('pesan'))
            <div class="alert alert-success">{{Session::get('pesan')}}</div>
        @endif 
        <h4>
            Edit Items
        </h4>
        @if (count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
        @endif

        <form method="post" action="{{ route('market.update' , $market->id) }}" enctype="multipart/form-data" >
        @csrf
        <div class="form-group row">
            <label for="produk_market" class="col-sm-3 col-form-label">Produk</label>
            <div class="col-sm-9">
                <input type="text" id="produk" name="produk" class="form-control" value="{{ $market->produk }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="produk_market" class="col-sm-3 col-form-label">Kondisi</label>
            <div class="col-sm-9">
                <input type="text" id="kondisi" name="kondisi" class="form-control" value="{{ $market->kondisi }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="produk_market" class="col-sm-3 col-form-label">Deskripsi</label>
            <div class="col-sm-9">
                <input type="text" id="deskripsi" name="deskripsi" class="form-control" value="{{ $market->deskripsi }}">
            </div>
        </div>
        <div class="form-group row" >
            <label for="produk_market" class="col-sm-3 col-form-label">Foto</label>
            <img src="{{ asset('images/'.$market->foto) }}" style="width: 100px">
            <div class="col-sm-9">
>
            <input type="file" id="foto" class="form-control" name="foto">
            </div>
        </div>
        <div class="form-group row">
            <label for="produk_market" class="col-sm-3 col-form-label">Harga</label>
            <div class="col-sm-9">
                <input type="text" id="harga" name="harga" class="form-control" value="{{ $market->harga }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="produk_buku" class="col-sm-3 col-form-label">Tgl Ditambahkan</label>
            <div class="col-sm-9">
                <input type="text" id="tgl_ditambahkan" name="tgl_ditambahkan" class="form-control" class="date" value="{{ $market->tgl_ditambahkan }}"
                >;  
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>

            </div>
        </div>
        <div class="form-group row">
            <div class=col-sm-9>
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn btn-warning" href="/market">Batal</a>         
            </div>
        </div>
        <br><br><br>
    </div>
@endsection