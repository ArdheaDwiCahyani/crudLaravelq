<?php

namespace App\Http\Controllers;

use App\Models\role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $role = role::get();
        return view('role.index', ['role'=>$role]);
    }

    public function tambah() 
    {
        return view('role.form');
    }

    public function simpan(Request $request)
    {
        $role = [
            'role_user' => $request -> role_user,
        ];

        role::create($role);

        return redirect() -> route('role');
    }

    public function edit($id)
    {
        $role = role::find($id)->first();

        return view('role.form', ['role'=>$role]);
    }

    public function update($id, Request $request)
    {
        $role = [
            'role_user' => $request -> role_user,
        ];

        role::find($id)->update($role);

        return redirect() -> route('role');
    }

    public function hapus($id)
    {
        role::find($id)->delete();

        return redirect()->route('role');
    }
}
