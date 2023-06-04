<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemilik;
use Barryvdh\DomPDF\Facade\Pdf;

class pemilikController extends Controller
{
    public function index()
    {
        $pemilik = pemilik::all();
        return view('pemilik.index', ['pemilik' => $pemilik]);
    }

    public function tambah()
    {
        return view('pemilik.form');
    }

    public function simpan(Request $request)
    {
        $pemilik = [
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
        ];

        pemilik::create($pemilik);

        return redirect()->route('pemilik');
    }

    public function edit($id)

    {
        $pemilik = pemilik::find($id);

        return view('pemilik.formEdit', ['pemilik' => $pemilik]);
    }

    public function update($id, Request $request)
    {
        $pemilik = [
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
        ];
        pemilik::find($id)->update($pemilik);

        return redirect()->route('pemilik');
    }

    public function hapus($id)
    {
        pemilik::find($id)->delete();

        return redirect()->route('pemilik');
    }

    public function cetak()
    {
        $pemilik = pemilik::where('role_id', '1')->get();
        view()->share('pemilik', $pemilik);
        $pdf = PDF::loadview('pemilik.pemilik_cetak');
        return $pdf->download('data_pemilik.pdf');
    }
}
