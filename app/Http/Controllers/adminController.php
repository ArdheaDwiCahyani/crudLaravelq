<?php

namespace App\Http\Controllers;

use App\Models\user;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
        $user = user::where('role_id', '1')->get();
        return view('admin.index', ['user' => $user]);
    }

    public function tambah()
    {
        return view('admin.form');
    }

    public function simpan(Request $request)
    {
        $user = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'nama' => '',
            'jenis_kelamin' => '',
            'no_telp' => '',
            'role_id' => 1,
        ];

        user::create($user);

        return redirect()->route('admin');
    }

    public function edit($id)

    {
        $user = user::find($id);

        return view('admin.formEdit', ['user' => $user]);
    }

    public function update($id, Request $request)
    {
        $user = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'role_id' => 1,
        ];
        user::find($id)->update($user);

        return redirect()->route('admin');
    }

    public function hapus($id)
    {
        user::find($id)->delete();

        return redirect()->route('admin');
    }

    public function cetak()
    {
        // $user = user::all();
        // $PDF = New Dompdf;
        // return $PDF->stream('data-admin.pdf');

        // $dompdf = new Dompdf();
        // $dompdf->loadHtml();
        // $dompdf->setPaper('A4', 'portrait');
        // $dompdf->render();

        // Download PDF

        $user = user::all();
        $html = view('admin.cetak_admin', compact('user'))->render();
        $pdf->loadHTML($html);
        return $pdf->stream('document.pdf');
    }
}
