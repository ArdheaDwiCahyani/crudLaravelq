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

    public function simpan(Request $request)
    {
        $nilai = [
            'alternatif_kos' => $request -> alternatif_kos,
            'nilai' => $request -> nilai,
        ];

        penilaian::create($nilai);

        return redirect() -> route('nilai');
    }

    public function edit($id)
    {
        $nilai = penilaian::where('kos_id', $id)->get();
        return view('penilaian.form', ['id'=>$id]);
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
