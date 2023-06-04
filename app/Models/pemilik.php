<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemilik extends Model
{
    protected $table = 'pemiliks';

    protected $fillable = ['nama', 'jenis_kelamin', 'no_telp'];
}
