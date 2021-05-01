@extends('layout.master')

@section('content')
<section id="market" class="py-1 text-center bg-light">
    <div class="container">
      <h2>List Items</h2>
      <hr>
      <div class="row">
        @foreach ($market as $data)
        <div class="col-md-4">
            <a href="#">
            <img src="{{ $data->foto != null ? asset('images/'.$data->foto) : asset('image-not-found.jpg') }}" style="width:120px; height:150px">
            <p>
                <h5>{{ $data->produkl }}</h5><a>
                {{ $data->produk }}<br></a>
                Harga : {{ $data->harga }}
            </p>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection