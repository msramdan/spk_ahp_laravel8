<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaBansos extends Model
{
    use HasFactory;
    protected $table = 'kriteria_bansos';
    protected $fillable = ['kriteria_id','jenis_bansos_id'];
}
