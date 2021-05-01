<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Market;
use File;

class HomeController extends Controller
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
    public function index()
    {
        return view('home');
    }

    //Fungsi daftar buku
    public function daftarmarket(){
        $market = Market::all();
            
        return view('market.daftarmarket', compact('market'));
    }
}
