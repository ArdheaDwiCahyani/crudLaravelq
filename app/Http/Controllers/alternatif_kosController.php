<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\sub_kriteria;
use App\Models\kriteria;
use Illuminate\Http\Request;
use App\Models\alternatif_kos;
use App\Models\pemilik;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
class alternatif_kosController extends Controller
{
    public function index()
    {
        $alternatif_kos = alternatif_kos::with(['pemilik'])->get();
        return view('alternatif_kos.index', [
            'alternatif_kos'=> $alternatif_kos
        ]);
    }

    public function getkriteria(Request $request)
    {
        $data_sub_kriteria = sub_kriteria::where('kriteria_id', $request->kriteria_id)->get();

        if (count($data_sub_kriteria) > 0) {
            return response()->json($data_sub_kriteria);
        }
    }

    public function tambah() 
    {
        $pemilik = pemilik::get();
        return view('alternatif_kos.form', [
            'pemilik'=> $pemilik
        ]);
    }

    public function simpan(Request $request)
    {
        
        $alternatif_kos = [
            'nama_kos' => $request -> nama_kos,
            'jenis_kos' => $request -> jenis_kos,
            'alamat' => $request -> alamat,
            'pemilik_id' => $request -> pemilik_id,
        ];

        alternatif_kos::create($alternatif_kos);

        return redirect() -> route('alternatif_kos');
    }

    public function edit($id)
    {
        $alternatif_kos = alternatif_kos::find($id);

        return view('alternatif_kos.formEdit', ['alternatif_kos'=>$alternatif_kos]);
    }

    public function update($id, Request $request)
    {
        // $alternatif_kos = alternatif_kos::find($id);
        // if($request->hasFile('foto_kos')) {
        //     $image_file = $request->file('foto_kos');
        //     $image_extension = $image_file->extension();
        //     $image_name = date('ymdhis') . "." . $image_extension;
        //     $image_file->move(public_path('img'), $image_name);

        //     $data_image = alternatif_kos::where('id', $id) -> first();
        //     File::delete(public_path('img') . '/' . $data_image -> foto_kos);
        // }

        $alternatif_kos = [
            'nama_kos' => $request -> nama_kos,
            'jenis_kos' => $request -> jenis_kos,
            'kriteria_id' => $request -> kriteria_id,
            'sub_kriteria_id' => $request -> sub_kriteria_id,
        ];

        alternatif_kos::find($id)->update($alternatif_kos);

        return redirect() -> route('alternatif_kos');
    }

    public function hapus($id)
    {
        alternatif_kos::find($id)->delete();

        return redirect()->route('alternatif_kos');
    }

    public function cetak()
    {
        $alternatif_kos = alternatif_kos::all();
        view()->share('alternatif_kos', $alternatif_kos);
        $pdf = PDF::loadview('alternatif_kos.kos_cetak');
        return $pdf->download('data_kos.pdf');
    }
}
