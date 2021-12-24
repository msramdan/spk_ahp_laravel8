<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index(){
        $jenis_bansos_id       = $_POST['jenis_bansos_id'];
        $alternatif_id         = $_POST['alternatif_id'];
        $kriteria_id           = $_POST['kriteria_id'];
        $sub_kriteria_id       = $_POST['sub_kriteria_id'];

        $jumlah_data = count($alternatif_id);
        for($i = 0; $i < $jumlah_data;$i++)
        {
            $data['jenis_bansos_id'] = $jenis_bansos_id;
            $data['alternatif_id'] = $alternatif_id[$i];
            $data['kriteria_id'] = $kriteria_id[$i];
            $data['sub_kriteria_id'] = $sub_kriteria_id[$i];

            $jml = DB::table("nilai_alternatif")
            ->where('jenis_bansos_id', '=', $jenis_bansos_id)
            ->where('alternatif_id', '=', $alternatif_id[$i])
            ->where('kriteria_id', '=', $kriteria_id[$i])
            ->count();
            if ($jml==0) {
                DB::table('nilai_alternatif')->insert([
                    'jenis_bansos_id' => $jenis_bansos_id,
                    'alternatif_id' => $alternatif_id[$i],
                    'kriteria_id' => $kriteria_id[$i],
                    'sub_kriteria_id' => $sub_kriteria_id[$i],
                ]);
            } else {
                DB::table('nilai_alternatif')
                    ->where('jenis_bansos_id',$jenis_bansos_id)
                    ->where('alternatif_id', $alternatif_id[$i])
                    ->where('kriteria_id', $kriteria_id[$i])
                    ->update(['sub_kriteria_id' => $sub_kriteria_id[$i]]);
            }
        }
        $list = DB::select("SELECT nilai_alternatif.*,pv_sub_kriteria.nilai FROM nilai_alternatif JOIN pv_sub_kriteria on pv_sub_kriteria.sub_kriteria_id=nilai_alternatif.sub_kriteria_id WHERE nilai_alternatif.jenis_bansos_id ='$jenis_bansos_id' AND pv_sub_kriteria.jenis_bansos_id='$jenis_bansos_id'");
        // cek jml data
        $jml_list =count($list); //24
        $jml_data = 0;
        //cek nilai pv kriteria
        foreach ($list as $key => $row) {
            $urutan = $key + 1;
            $alternatif_id = $row->alternatif_id; //1
            //ambil nilai pv kriteria
             $query = DB::table('pv_kriteria')
             ->where('pv_kriteria.jenis_bansos_id', $jenis_bansos_id)
             ->where('pv_kriteria.kriteria_id', $row->kriteria_id)
             ->first();
        $nilai_pv  =$query->nilai;

        $jumlah_nilai_alternatif = $nilai_pv * $row->nilai;
        if ($urutan ==1) {
            $jml_data = $jml_data + $jumlah_nilai_alternatif;
            $alternatif_sebelumnya = $row->alternatif_id;
        }else if($alternatif_sebelumnya == $row->alternatif_id) {
            if ($jml_list != $urutan) {
                $jml_data = $jml_data + $jumlah_nilai_alternatif;
            }else if( $jml_list == $urutan){
                $jml_data = $jml_data + $jumlah_nilai_alternatif;
                $jml = DB::table("rangking")
                ->where('jenis_bansos_id', '=', $jenis_bansos_id)
                ->where('alternatif_id', '=', $alternatif_sebelumnya)
                ->count();
                if ($jml==0) {
                    DB::table('rangking')->insert([
                        'jenis_bansos_id' => $jenis_bansos_id,
                        'alternatif_id' => $alternatif_sebelumnya,
                        'nilai_prioritas' => $jml_data,
                    ]);
                } else {
                    DB::table('rangking')
                        ->where('jenis_bansos_id',$jenis_bansos_id)
                        ->where('alternatif_id', $alternatif_sebelumnya)
                        ->update(['nilai_prioritas' => $jml_data]);
                }
        }

        }else if ($alternatif_sebelumnya != $row->alternatif_id) {
            //cen untuk input atw update data jumlah ke tebel
            $jml = DB::table("rangking")
            ->where('jenis_bansos_id', '=', $jenis_bansos_id)
            ->where('alternatif_id', '=', $alternatif_sebelumnya)
            ->count();
            if ($jml==0) {
                DB::table('rangking')->insert([
                    'jenis_bansos_id' => $jenis_bansos_id,
                    'alternatif_id' => $alternatif_sebelumnya,
                    'nilai_prioritas' => $jml_data,
                ]);
            } else {
                DB::table('rangking')
                    ->where('jenis_bansos_id',$jenis_bansos_id)
                    ->where('alternatif_id', $alternatif_sebelumnya)
                    ->update(['nilai_prioritas' => $jml_data]);
            }
            //set alternatif baru
            $alternatif_sebelumnya = $row->alternatif_id;
            //set jml jadi 0 lagi dan tambah dengan jml baru
            $jml_data = 0 + $jumlah_nilai_alternatif;
        }
	}
        return view('hasil.index')->with([
            'jenis_bansos_id' => $jenis_bansos_id
        ]);
    }
}
