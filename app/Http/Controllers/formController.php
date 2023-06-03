<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formController extends Controller
{
    public function submitForm(Request $request)
    {
        $selectedValue = $request->input('jenis_kos');
        // Gunakan nilai enum yang telah Anda ambil untuk melakukan operasi yang Anda butuhkan di sini
    }
}
?>
