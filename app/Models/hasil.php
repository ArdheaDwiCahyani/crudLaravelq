<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hasil extends Model
{
    protected $table = 'hasils';

    protected $fillable = ['kos_id', 'nilai', 'ranking'];
    
    public function alternatif_kos()
    {
        return $this->belongsTo(alternatif_kos::class,'kos_id','id');
    }
}
