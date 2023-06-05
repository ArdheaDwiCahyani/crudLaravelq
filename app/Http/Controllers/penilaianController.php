<?php

namespace App\Http\Controllers;

use App\Models\penilaian;
use Illuminate\Http\Request;

class penilaianController extends Controller
{
    public function index()
    {
        $nilai = penilaian::get();
        return view('penilaian.index', ['nilai'=>$nilai]);
    }

    public function tambah() 
    {
        return view('penilaian.form');
    }

    public function edit($id)
    {
        $nilai = penilaian::where('kos_id', $id)->get();
        return view('penilaian.formEdit', ['penilaian'=>$nilai]);
    }

    // public function update($id, Request $request)
    // {
    //     $nilai = [
    //         'nilai' => $request -> nilai,
    //         'kriteria' => $request -> kriteria,
    //         'sub_kriteria' => $request -> sub_kriteria,
    //     ];
    //     penilaian::find($id)->update($nilai);

    //     return redirect() -> route('nilai');
    // }

    // public function hapus($id)
    // {
    //     penilaian::find($id)->delete();

    //     return redirect()->route('nilai');
    // }
}
