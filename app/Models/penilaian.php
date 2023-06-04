<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaian extends Model
{
    protected $table = 'penilaians';

    protected $fillable = ['nama_kos', 'kriteria_id', 'nilai'];
}
