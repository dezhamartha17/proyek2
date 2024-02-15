<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() 
    {
        $barangs = Barang::all();
        if (Auth::check()) {
            $userEmail = Auth::user()->email;
    
            // Correct the property name to 'email_pemesan'
            $jumlahData = Pesanan::where('enail_pemesan', $userEmail)->count();
    
            return view('home.index', ['barangs' => $barangs, 'jumlahData' => $jumlahData]);
        }
        return view('home.index', ['barangs' => $barangs, 'jumlahData' => 0]);
    }
}
