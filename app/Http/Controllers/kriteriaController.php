<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use Illuminate\Http\Request;

class kriteriaController extends Controller
{
    public function index()
    {
        $kriteria = kriteria::get();
        return view('kriteria.index', ['kriteria' => $kriteria]);
    }

    public function tambah()
    {
        return view('kriteria.form');
    }

    public function simpan(Request $request)
    {
        $kriteria = [
            'kriteria' => $request->kriteria,
            'bobot' => $request->bobot,
            'tipe' => $request->tipe,
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
            'kriteria' => $request->kriteria,
            'bobot' => $request->bobot,
            'tipe' => $request->tipe,
        ];
        kriteria::where('id', $id)->update($kriteria);

        return redirect()->route('kriteria');
    }

    public function hapus($id)
    {
        kriteria::where('id', $id)->delete();

        return redirect()->route('kriteria');
    }
}
