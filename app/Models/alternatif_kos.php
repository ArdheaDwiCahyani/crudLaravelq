<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alternatif_kos extends Model
{
    protected $table = 'alternatif_kos';

    protected $fillable = ['nama_kos', 'jenis_kos', 'kriteria_id', 'sub_kriteria_id'];

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\user');
    // }

    public function user()
    {
        return $this->hasMany(user::class, 'id', 'id');
    }

    public function kriteria()
    {
        return $this->hasMany(kriteria::class, 'id', 'kriteria_id');
    }

    public function sub_kriteria()
    {
        return $this->hasMany(sub_kriteria::class, 'id', 'sub_kriteria_id');
    }
}
