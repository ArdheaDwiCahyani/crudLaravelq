<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        $user = user::where('role_id', '2')->get();
        return view('user.index', ['user'=>$user]);
    }

    public function tambah() 
    {
        return view('user.form');
    }

    public function simpan(Request $request)
    {
        $user = [
            'username' => $request -> username,
            'email' => $request -> email,
            'password' => $request -> password,
            'nama' => '',
            'jenis_kelamin' => '',
            'no_telp'=> '',
            'role_id' => 2,
        ];

        user::create($user);

        return redirect() -> route('user');
    }

    public function edit($id)
    {
        $user = user::find($id);

        return view('user.formEdit', ['user'=>$user]);
    }

    public function update($id, Request $request)
    {
        $user = [
            'username' => $request -> username,
            'email' => $request -> email,
            'password' => $request -> password,
            'nama' => $request -> nama,
            'jenis_kelamin' => $request -> jenis_kelamin,
            'no_telp' => $request -> no_telp,
            'role_id' => 2,
        ];
        user::find($id)->update($user);

        return redirect() -> route('user');
    }

    public function hapus($id)
    {
        user::find($id)->delete();

        return redirect()->route('user');
    }
}
