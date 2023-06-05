<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\sub_kriteria;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class sub_kriteriaController extends Controller
{
    public function index()
    {
        $sub_kriteria = sub_kriteria::get();
        return view('sub_kriteria.index', ['sub_kriteria'=>$sub_kriteria]);
    }

    public function tambah() 
    {
        $kriteria = kriteria::get();
        return view('sub_kriteria.form', compact('kriteria'));
    }

    public function simpan(Request $request)
    {
        $sub_kriteria = [
            'kriteria_id' => $request -> kriteria_id,
            'sub_kriteria' => $request -> sub_kriteria,
            'bobot_sub' => $request -> bobot_sub,
        ];

        sub_kriteria::create($sub_kriteria);

        return redirect() -> route('sub_kriteria');
    }

    public function edit($id)
    {
        $sub_kriteria = sub_kriteria::find($id);

        return view('sub_kriteria.formedit', ['sub_kriteria'=>$sub_kriteria]);
    }

    public function update($id, Request $request)
    {
        $sub_kriteria = [
            'kriteria_id' => $request -> kriteria_id,
            'sub_kriteria' => $request -> sub_kriteria,
            'bobot_sub' => $request -> bobot_sub,
        ];
        sub_kriteria::find($id)->update($sub_kriteria);

        return redirect() -> route('sub_kriteria');
    }

    public function hapus($id)
    {
        sub_kriteria::find($id)->delete();

        return redirect()->route('sub_kriteria');
    }

    public function cetak()
    {
        $sub_kriteria = sub_kriteria::all();
        view()->share('sub_kriteria', $sub_kriteria);
        $pdf = PDF::loadview('sub_kriteria.sub_kriteria_cetak');
        return $pdf->download('data_sub_kriteria.pdf');
    }

}
