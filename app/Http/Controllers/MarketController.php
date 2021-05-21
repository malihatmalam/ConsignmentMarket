<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Market;
use File;


class MarketController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    //fungsi index
    public function index(){
        $batas = 10;
        $jumlah_market = Market::count();
        $data_market = Market::orderBy('tgl_ditambahkan')->paginate($batas);
        $no = 0;

        return view('market.index', compact('data_market','no','jumlah_market'));
    }

    //Fungsi Search
    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_market = Market::where('produk','like',"%".$cari."%")->orwhere('kondisi','like',"%".$cari."%")->paginate($batas);
        $jumlah_market = $data_market->count();
        $no = $batas *($data_market->currentPage()-1);
        

        return view('market.search', compact('data_market','no','jumlah_market','cari'));
    }
        
    //fungsi create
    public function create(){
        return view('market.create');
    }

    //fungsi store
    public function store(Request $request){

        $this->validate($request,[
            'produk' => 'required|string',
            'kondisi' => 'required|string',
            'deskripsi' => 'required|string',
            'foto'=>'required|image|mimes:jpeg,jpg,png',
            'harga' => 'required|numeric',
            'tgl_ditambahkan' => 'required|date',
        ]);

        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();
        $foto->move('images/', $namafile);

        $market = new Market;
        $market->produk = $request->produk;
        $market->kondisi = $request->kondisi;
        $market->deskripsi = $request->deskripsi;
        $market->foto = $namafile;
        $market->harga = $request->harga;
        $market->tgl_ditambahkan = $request->tgl_ditambahkan;
        $market->save();

        return redirect('/market')->with('pesan','Data Buku Berhasil di Simpan');
    }

    //Fungsi Destroy
    public function destroy($id){
        $market=Market::find($id);
        $market->delete();
        $namafile = $market->foto;
        File::delete('images/'.$namafile);

        return redirect('/market')->with('pesan','Data Buku Berhasil di Hapus');
    }
    
    //Fungsi Edit
    public function edit($id){
        $market=Market::find($id);

        return view('market.edit', compact('market'));
    }
    //fungsi Update
    public function update(Request $request, $id){
        $this->validate($request,[
            'produk' => 'required|string',
            'kondisi' => 'required|string',
            'deskripsi' => 'required|string',
            'foto'=>'required|image|mimes:jpeg,jpg,png',
            'harga' => 'required|numeric',
        ]);

        $market = Market::find($id);
        $market->produk = request('produk');
        $market->kondisi = request('kondisi');
        $market->deskripsi = request('deskripsi');
        $market->harga = request('harga');
        if (request('foto')!= null){
            File::delete('images/'.$market->foto);

            $foto = request('foto');
            $namafile = time().'.'.$foto->getClientOriginalExtension();
            $foto->move('images/', $namafile);
            $market->foto = $namafile;
        }
        $market->save();

        return redirect('/market')->with('pesan','Item Berhasil di Update');
    }


}
