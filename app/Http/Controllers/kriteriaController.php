<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use Illuminate\Http\Request;

class kriteriaController extends Controller
{
    public function index()
    {
        $kriteria = kriteria::get();
        return view('kriteria.index', ['kriteria'=>$kriteria]);
    }

    public function tambah() 
    {
        return view('kriteria.form');
    }

    public function simpan(Request $request)
    {
        $kriteria = [
            'kriteria' => $request -> kriteria,
            'bobot' => $request -> bobot,
            'tipe' => $request -> tipe,
        ];

        kriteria::create($kriteria);

        return redirect() -> route('kriteria');
    }

    public function edit($id)
    {
        $kriteria = kriteria::find($id)->first();

        return view('kriteria.form', ['kriteria'=>$kriteria]);
    }

    public function update($id, Request $request)
    {
        $kriteria = [
            'kriteria' => $request -> kriteria,
            'bobot' => $request -> bobot,
            'tipe' => $request -> tipe,
        ];
        kriteria::find($id)->update($kriteria);

        return redirect() -> route('kriteria');
    }

    public function hapus($id)
    {
        kriteria::find($id)->delete();

        return redirect()->route('kriteria');
    }
}
