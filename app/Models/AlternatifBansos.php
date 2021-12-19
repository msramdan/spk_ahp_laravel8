<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternatifBansos extends Model
{
    use HasFactory;
    protected $table = 'alternatif_bansos';
    protected $fillable = ['alternatif_id','jenis_bansos_id'];
}
