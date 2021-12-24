<?php
use Illuminate\Support\Facades\DB;

function getNilaiPerbandinganKriteria($urutan1,$urutan2,$jenis_bansos_id)
{
	$kriteria_id1 = getKriteriaID($urutan1,$jenis_bansos_id);
	$kriteria_id2 = getKriteriaID($urutan2,$jenis_bansos_id);

    $list = DB::select("SELECT nilai FROM perbandingan_kriteria WHERE kriteria1 = $kriteria_id1 AND kriteria2 = $kriteria_id2 AND jenis_bansos_id=$jenis_bansos_id");

    $jml = DB::table("perbandingan_kriteria")
       ->where('kriteria1', '=', $kriteria_id1)
       ->where('kriteria2', '=', $kriteria_id2)
       ->where('jenis_bansos_id', '=', $jenis_bansos_id)
       ->count();

	if ($jml == 0) {
		$nilai = 1;
	} else {
		foreach ($list as $row) {
			$nilai= $row->nilai;
		}
	}
	return $nilai;
}




function getKriteriaID($no_urut, $jenis_bansos_id) {
    $list = DB::select("SELECT kriteria_id FROM kriteria_bansos where jenis_bansos_id='$jenis_bansos_id' ORDER BY kriteria_id ");
    if ($list) {
        foreach ($list as $a) {
                $listID[] = $a->kriteria_id;
            }
     }
     return $listID[($no_urut)];
}

function inputDataPerbandinganKriteria($kriteria1,$kriteria2,$nilai,$jenis_bansos_id) {
	$kriteria_id1 = getKriteriaID($kriteria1,$jenis_bansos_id);
	$kriteria_id2 = getKriteriaID($kriteria2,$jenis_bansos_id);
    $jml = DB::table("perbandingan_kriteria")
       ->where('kriteria1', '=', $kriteria_id1)
       ->where('kriteria2', '=', $kriteria_id2)
       ->where('jenis_bansos_id', '=', $jenis_bansos_id)
       ->count();

	if ($jml == 0) {
        DB::table('perbandingan_kriteria')->insert([
            'kriteria1' => $kriteria_id1,
            'kriteria2' => $kriteria_id2,
            'jenis_bansos_id' => $jenis_bansos_id,
            'nilai' => $nilai,

        ]);
    }else{
        DB::table('perbandingan_kriteria')
              ->where('kriteria1', $kriteria_id1)
              ->where('kriteria2', $kriteria_id2)
              ->where('jenis_bansos_id', $jenis_bansos_id)
              ->update(['nilai' => $nilai]);
	}
}

function getSubKriteriaID($no_urut, $kriteria_id) {
    $list = DB::select("SELECT id FROM sub_kriteria where kriteria_id='$kriteria_id' ORDER BY id ");
    if ($list) {
        foreach ($list as $a) {
                $listID[] = $a->id;
            }
     }
     return $listID[($no_urut)];
}

function getNilaiPerbandinganSubKriteria($urutan1,$urutan2,$jenis_bansos_id,$kriteria_id)
{
	$sub_kriteria_id1 = getSubKriteriaID($urutan1,$kriteria_id);
	$sub_kriteria_id2 = getSubKriteriaID($urutan2,$kriteria_id);
    $list = DB::select("SELECT nilai FROM perbandingan_sub_kriteria WHERE sub_kriteria1= $sub_kriteria_id1 AND sub_kriteria2= $sub_kriteria_id2 AND jenis_bansos_id=$jenis_bansos_id");
    $jml = DB::table("perbandingan_sub_kriteria")
       ->where('sub_kriteria1', '=', $sub_kriteria_id1)
       ->where('sub_kriteria2', '=', $sub_kriteria_id2)
       ->where('jenis_bansos_id', '=', $jenis_bansos_id)
       ->count();

	if ($jml == 0) {
		$nilai = 1;
	} else {
		foreach ($list as $row) {
			$nilai= $row->nilai;
		}
	}
	return $nilai;
}

function inputDataPerbandinganSubKriteria($sub_kriteria1,$sub_kriteria2,$nilai,$jenis_bansos_id,$kriteria_id) {
	$sub_kriteria_id1 = getSubKriteriaID($sub_kriteria1,$kriteria_id);
	$sub_kriteria_id2 = getSubKriteriaID($sub_kriteria2,$kriteria_id);
    $jml = DB::table("perbandingan_sub_kriteria")
       ->where('sub_kriteria1', '=', $sub_kriteria_id1)
       ->where('sub_kriteria2', '=', $sub_kriteria_id2)
       ->where('jenis_bansos_id', '=', $jenis_bansos_id)
       ->count();
	if ($jml == 0) {
        DB::table('perbandingan_sub_kriteria')->insert([
            'sub_kriteria1' => $sub_kriteria_id1,
            'sub_kriteria2' => $sub_kriteria_id2,
            'jenis_bansos_id' => $jenis_bansos_id,
            'nilai' => $nilai,
        ]);
    }else{
        DB::table('perbandingan_sub_kriteria')
              ->where('sub_kriteria1', $sub_kriteria_id1)
              ->where('sub_kriteria2', $sub_kriteria_id2)
              ->where('jenis_bansos_id', $jenis_bansos_id)
              ->update(['nilai' => $nilai]);
	}
}

// memasukkan nilai priority vektor kriteria
function inputKriteriaPV ($kriteria_id,$pv,$jenis_bansos_id) {
    $jml = DB::table("pv_kriteria")
       ->where('kriteria_id', '=', $kriteria_id)
       ->where('jenis_bansos_id', '=', $jenis_bansos_id)
       ->count();
	if ($jml==0) {
        DB::table('pv_kriteria')->insert([
            'kriteria_id' => $kriteria_id,
            'jenis_bansos_id' => $jenis_bansos_id,
            'nilai' => $pv,

        ]);

	} else {
        DB::table('pv_kriteria')
              ->where('kriteria_id', $kriteria_id)
              ->where('jenis_bansos_id', $jenis_bansos_id)
              ->update(['nilai' => $pv]);
	}
}

// memasukkan nilai priority vektor kriteria
function inputSubKriteriaPV ($sub_kriteria_id,$pv,$jenis_bansos_id) {
    $jml = DB::table("pv_sub_kriteria")
       ->where('sub_kriteria_id', '=', $sub_kriteria_id)
       ->where('jenis_bansos_id', '=', $jenis_bansos_id)
       ->count();
	if ($jml==0) {
        DB::table('pv_sub_kriteria')->insert([
            'sub_kriteria_id' => $sub_kriteria_id,
            'jenis_bansos_id' => $jenis_bansos_id,
            'nilai' => $pv,

        ]);

	} else {
        DB::table('pv_sub_kriteria')
              ->where('sub_kriteria_id', $sub_kriteria_id)
              ->where('jenis_bansos_id', $jenis_bansos_id)
              ->update(['nilai' => $pv]);
	}
}

// mencari Principe Eigen Vector (λ maks)
function getEigenVector($matrik_a,$matrik_b,$n) {
	$eigenvektor = 0;
	for ($i=0; $i <= ($n-1) ; $i++) {
		$eigenvektor += ($matrik_a[$i] * (($matrik_b[$i]) / $n));
	}

	return $eigenvektor;
}

// mencari Cons Index
function getConsIndex($matrik_a,$matrik_b,$n) {
	$eigenvektor = getEigenVector($matrik_a,$matrik_b,$n);
	$consindex = ($eigenvektor - $n)/($n-1);
	return $consindex;
}

// Mencari Consistency Ratio
function getConsRatio($matrik_a,$matrik_b,$n) {
	$consindex = getConsIndex($matrik_a,$matrik_b,$n);
	$consratio = $consindex / getNilaiIR($n);
	return $consratio;
}

// menampilkan nilai IR
function getNilaiIR($jmlKriteria) {

    $query = DB::select("SELECT nilai FROM ir WHERE jumlah=$jmlKriteria");

	foreach ($query as $row) {
		$nilaiIR = $row->nilai;
	}
	return $nilaiIR;
}

// mencari nama kriteria
function getKriteriaNama($no_urut,$jenis_bansos_id) {
    $query = DB::select("SELECT * FROM kriteria_bansos join kriteria on kriteria.id = kriteria_bansos.kriteria_id where kriteria_bansos.jenis_bansos_id='$jenis_bansos_id'");
    foreach ($query as $row) {
		$nama[] = $row->nama_kriteria;
	}
	return $nama[($no_urut)];
}

function getSubKriteriaNama($no_urut,$kriteria_id) {
    $query = DB::select("SELECT nama_sub_kriteria FROM sub_kriteria where kriteria_id='$kriteria_id'");
    foreach ($query as $row) {
		$nama[] = $row->nama_sub_kriteria;
	}
	return $nama[($no_urut)];
}

function nama_kriteria_by_id($kriteria_id) {
    $kriteria = DB::table('kriteria')->where('id', $kriteria_id)->first();
    return $kriteria->nama_kriteria;
}




