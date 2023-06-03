<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_kriteria extends Model
{
    protected $table = 'sub_kriterias';
    protected $primaryKey = 'id';

    protected $fillable = ['kriteria_id', 'sub_kriteria', 'bobot_sub'];

    public function kriteria()
    {
        return $this->belongsTo(kriteria::class, 'kriteria_id', 'id');
    }
}
