<?php

namespace App\Http\Controllers;

use App\Models\user;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class adminController extends Controller
{
    public function index()
    {
        $admin = user::where('role_id', '1')->get();
        return view('admin.index', ['admin' => $admin]);
    }

    public function tambah()
    {
        return view('admin.form');
    }

    public function simpan(Request $request)
    {
        $admin = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'nama' => '',
            'jenis_kelamin' => '',
            'no_telp' => '',
            'role_id' => 1,
        ];

        user::create($admin);

        return redirect()->route('admin');
    }

    public function edit($id)

    {
        $admin = user::find($id);

        return view('admin.formEdit', ['admin' => $admin]);
    }

    public function update($id, Request $request)
    {
        $admin = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'role_id' => 1,
        ];
        user::find($id)->update($admin);

        return redirect()->route('admin');
    }

    public function hapus($id)
    {
        user::find($id)->delete();

        return redirect()->route('admin');
    }

    public function cetak()
    {
        $admin = user::where('role_id', '1')->get();
        view()->share('admin', $admin);
        $pdf = PDF::loadview('admin.admin_cetak');
        return $pdf->download('data_admin.pdf');
    }
}
