<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketApiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Market;
use File;

class MarketApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    
     //Fungsi daftar buku
    public function daftarmarket(){
        $market = Market::all();
            
        return response()->json(['market' => $market], 200);
    }

    public function create()
    {
        //
    }

    //fungsi store
    public function store(MarketApiRequest $request){
        try{
            if ($request->foto) {
                $namafile = microtime().'.'.$request->foto->getClientOriginalExtension();
                Storage::disk('public')->put($namafile, file_get_contents($request->foto));

                Market::create([
                    'produk' => $request->produk,
                    'kondisi' => $request->kondisi,
                    'deskripsi' => $request->deskripsi,
                    'foto' => asset(Storage::url($namafile)),
                    'harga' => $request->harga,
                    'status' => $request->status,
                ]);
            } else{
                Market::create($request->all());
            }
            return response()->json([
                'message' => "List added successfully."
            ], 201);

        }catch(\Exception $e){
            return response()->json([
                'message' => "Something seems not good today!"
            ], 500);
        }
        
    }


}
