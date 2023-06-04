<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaian extends Model
{
    protected $table = 'penilaians';

    protected $fillable = ['kos_id', 'kriteria_id', 'nilai'];
    public function alternatif_kos()
    {
        return $this->belongsTo(alternatif_kos::class,'kos_id','id');
    }
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class,'kriteria_id','id');
    }
}
