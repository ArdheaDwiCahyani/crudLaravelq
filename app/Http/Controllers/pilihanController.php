<?php

namespace App\Http\Controllers;

use App\Models\pilihan;
use Illuminate\Http\Request;

class pilihanController extends Controller
{
    public function index()
    {
        $pilihan = pilihan::get();
        return view('pilihan.index', ['pilihan'=>$pilihan]);
    }

}
