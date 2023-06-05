<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    protected $table = 'kriterias';
    public $primaryKey = 'kriteria_id';

    protected $fillable = ['kriteria', 'bobot', 'tipe'];

    public function sub_kriteria()
    {
        return $this->belongsTo(sub_kriteria::class, 'id', 'kriteria_id');
    }
}
