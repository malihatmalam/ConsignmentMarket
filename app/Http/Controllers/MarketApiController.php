<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketApiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Market;
use File;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;

class MarketApiController extends Controller
{
    
    //Fungsi daftar buku
    public function daftarmarket(){
        $market = Market::all();
            
        return response()->json(['market' => $market], 200);
    }

    //Fungsi store
    public function store(Request $request){

        $validasi = Validator::make($request->all(), [
            'produk' => 'required|string',
            'kondisi' => 'required|string',
            'deskripsi' => 'required|string',
            // 'foto'=>'required|image|mimes:jpeg,jpg,png',
            'harga' => 'required|numeric',
            'tgl_ditambahkan' => 'required|date',
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        // $foto = $request->foto;
        // $namafile = time().'.'.$foto->getClientOriginalExtension();
        // $foto->move('images/', $namafile);

        $market = new Market;
        $market->produk = $request->produk;
        $market->kondisi = $request->kondisi;
        $market->deskripsi = $request->deskripsi;
        // $market->foto = $namafile;
        $market->harga = $request->harga;
        $market->tgl_ditambahkan = $request->tgl_ditambahkan;
        $market->save();

        // if ($request->foto) {
        //     $namafile = microtime().'.'.$request->foto->getClientOriginalExtension();
        //     Storage::disk('public')->put($namafile, file_get_contents($request->foto));

        //     Market::create([
        //         'produk' => $request->produk,
        //         'kondisi' => $request->kondisi,
        //         'deskripsi' => $request->deskripsi,
        //         'foto' => asset(Storage::url($namafile)),
        //         'harga' => $request->harga,
        //         'status' => $request->status,
        //     ]);
        // } else{
        //     Market::create($request->all());
        // }

        return response()->json([
            'status' => 'Success',
            'message' => "Data Buku Berhasil di Simpan.",
            'market' => $market
        ]);

        // try{
            

        // }catch(\Exception $e){
        //     return response()->json([
        //         'message' => "Something seems not good today!"
        //     ], 500);
        // }
        
    }

    //Fungsi Destroy
    public function destroy($id){
        $market=Market::find($id);
        $market->delete();

        return response()->json([
            'status' => 'Success',
            'message' => "Data Buku Berhasil di Hapus.",
            'market' => $market
        ]);
    }

    //Fungsi Update
    public function update(Request $request, $id){
        
        $validasi = Validator::make($request->all(), [
            'produk' => 'required|string',
            'kondisi' => 'required|string',
            'deskripsi' => 'required|string',
            // 'foto'=>'required|image|mimes:jpeg,jpg,png',
            'harga' => 'required|numeric',
            // 'tgl_ditambahkan' => 'required|date',
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $market = Market::find($id);
        $market->produk = request('produk');
        $market->kondisi = request('kondisi');
        $market->deskripsi = request('deskripsi');
        $market->harga = request('harga');
        // if (request('foto')!= null){
        //     File::delete('images/'.$market->foto);

        //     $foto = request('foto');
        //     $namafile = time().'.'.$foto->getClientOriginalExtension();
        //     $foto->move('images/', $namafile);
        //     $market->foto = $namafile;
        // }
        $market->save();

        return response()->json([
            'status' => 'Success',
            'message' => "Data Buku Berhasil di Perbaharui.",
            'market' => $market
        ]);
    }

    //Fungsi Send Message Error
    public function error($message){
        return response()->json([
             'status' => 'Failed',
             'message' => $message
        ]);
    }


}
