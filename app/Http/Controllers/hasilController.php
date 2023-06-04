<?php

namespace App\Http\Controllers;

use App\Models\hasil;
use Illuminate\Http\Request;


class hasilController extends Controller
{
    public function index()
    {
        $hasil = hasil::with('alternatif_kos')->get();
        return view('hasil.index', ['hasil'=>$hasil]);
    }



    public function tambah() 
    {
        return view('hasil.form');
    }

    // public function simpan(Request $request)
    // {
    //     $nilai = [
    //         'nilai' => $request -> nilai,
    //         'kriteria' => $request -> kriteria,
    //         'sub_kriteria' => $request -> sub_kriteria,
    //     ];

    //     penilaian::create($nilai);

    //     return redirect() -> route('nilai');
    // }

    // public function edit($id)
    // {
    //     $nilai = penilaian::find($id)->first();

    //     return view('nilai.form', ['nilai'=>$nilai]);
    // }

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
