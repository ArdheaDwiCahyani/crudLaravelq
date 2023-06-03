<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hasil extends Model
{
    protected $table = 'hasils';

    protected $fillable = ['ranking', 'kos_id'];
}
