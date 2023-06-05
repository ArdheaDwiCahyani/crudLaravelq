<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class kriteriaController extends Controller
{
    public function index()
    {
        $kriteria = kriteria::get();
        return view('kriteria.index',compact('kriteria'));
    }

    public function tambah()
    {
        $kriteria = kriteria::all();
        return view('kriteria.form',compact('kriteria'));
    }

    public function simpan(Request $request)
    {
        $kriteria = [
            'kriteria' => $request -> kriteria,
            'bobot' => $request -> bobot,
            'tipe' => $request -> tipe,
        ];

        kriteria::create($kriteria);

        return redirect()->route('kriteria');
    }

    public function edit($id)
    {
        $kriterias = kriteria::where('id', $id)->get();
        foreach ($kriterias as $kriteria) {
            $data = $kriteria;
        }
        return view('kriteria.form', ['kriteria' => $data]);
    }

    public function update($id, Request $request)
    {
        $kriteria = [
            'kriteria' => $request -> kriteria,
            'bobot' => $request -> bobot,
            'tipe' => $request -> tipe,
        ];
        kriteria::where('id', $id)->update($kriteria);

        return redirect()->route('kriteria');
    }

    public function hapus($id)
    {
        kriteria::where('id', $id)->delete();

        return redirect()->route('kriteria');
    }

    public function cetak()
    {
        $kriteria = kriteria::all();
        view()->share('kriteria', $kriteria);
        $pdf = PDF::loadview('kriteria.kriteria_cetak');
        return $pdf->download('data_kriteria.pdf');
    }
}
