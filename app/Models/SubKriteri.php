<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteri extends Model
{
    use HasFactory;
    protected $table = 'sub_kriteria';
    protected $fillable = ['kode_sub_kriteria','nama_sub_kriteria','kriteria_id'];
}
