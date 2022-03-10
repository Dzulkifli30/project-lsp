<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarif;

class TarifController extends Controller
{
    public function index()
    {
        # code...
        $data = Tarif::all();
        return view('tarif',["data" => $data]);
    }
    public function store(Request $request)
    {
        $data = Tarif::create([
            'daya' => $request->daya,
            'tarifperkwh' => $request->tarifperkwh,
        ]);
        return redirect()->route('tarif');
    }
    public function show($id)
    {
        $data = Tarif::where('id', $id)->first();
        if ($data) {
            return view('edittarif',["data" => $data]);
        } else {
            return abort("404");
        }
        
    }
    public function update(Request $request, $id)
    {
        $data = Tarif::where('id', $id)->first();
        if ($data) {
            $data->daya = $request->daya;
            $data->tarifperkwh = $request->tarifperkwh;
            $result = $data->save();
            if ($result) {
                return redirect()->route('tarif');
            } else {
                return abort("404");
            }
            
            return view('edittarif',["data" => $data]);
        } else {
            return abort("404");
        }
    }
    public function delete($id)
    {
        $data = Tarif::where('id', $id)->first();
        if ($data) {
            if ($data->delete()) {
                return redirect()->route('tarif');
            } else {
                return abort("404");
            }
            return view('edittarif',["data" => $data]);
        } else {
            return abort("404");
        }
        
    }
}
