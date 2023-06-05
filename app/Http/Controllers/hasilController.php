<?php

namespace App\Http\Controllers;

use App\Models\hasil;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function cetak()
    {
        $hasil = hasil::all();
        view()->share('hasil', $hasil);
        $pdf = PDF::loadview('hasil.hasil_cetak');
        return $pdf->download('data_hasil.pdf');
    }
}
