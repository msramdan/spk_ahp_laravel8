<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerbandinganSubKriteriaController extends Controller
{
    public function prosess_sub_spk(){
        $kriteria_id = $_POST['kriteria_id'];
        $jenis_bansos_id = $_POST['jenis_bansos_id'];
        return view('perbandingan_sub_kriteria.index')->with([
            'kriteria_id' => $kriteria_id,
            'jenis_bansos_id' => $jenis_bansos_id
        ]);
    }

    public function hasil_sub_spk(){
        return view('perbandingan_sub_kriteria.hasil');
    }
}
