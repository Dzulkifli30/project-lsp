<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Tarif;

class PelangganController extends Controller
{
    public function index()
    {
        # code...
        $data = Tarif::all();
        return view('pelanggan',["data" => $data]);
    }
}
