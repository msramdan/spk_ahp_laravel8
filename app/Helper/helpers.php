<?php
use Illuminate\Support\Facades\DB;

function getNilaiPerbandinganKriteria($kriteria1,$kriteria2,$jenis_bansos_id)
{
	$kriteria_id1 = getKriteriaID($kriteria1,$jenis_bansos_id);
	$kriteria_id2 = getKriteriaID($kriteria2,$jenis_bansos_id);
    // dd($kriteria_id2);


    $list = DB::select("SELECT nilai FROM perbandingan_kriteria WHERE kriteria1 = $kriteria_id1 AND kriteria2 = $kriteria_id2");

    $jml = DB::table("perbandingan_kriteria")
       ->where('kriteria1', '=', $kriteria_id1)
       ->where('kriteria2', '=', $kriteria_id2)
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
       ->count();

	if ($jml == 0) {
        DB::table('perbandingan_kriteria')->insert([
            'kriteria1' => $kriteria_id1,
            'kriteria2' => $kriteria_id2,
            'nilai' => $nilai,

        ]);
    }else{
        DB::table('perbandingan_kriteria')
              ->where('kriteria1', $kriteria_id1)
              ->where('kriteria2', $kriteria_id2)
              ->update(['nilai' => $nilai]);
	}
}

// memasukkan nilai priority vektor kriteria
function inputKriteriaPV ($kriteria_id,$pv) {
    $jml = DB::table("pv_kriteria")
       ->where('kriteria_id', '=', $kriteria_id)
       ->count();
	if ($jml==0) {
		$query2 = "INSERT INTO pv_kriteria (kriteria_id, nilai) VALUES ($kriteria_id, $pv)";
        DB::table('pv_kriteria')->insert([
            'kriteria_id' => $kriteria_id,
            'nilai' => $pv,

        ]);

	} else {
        DB::table('pv_kriteria')
              ->where('kriteria_id', $kriteria_id)
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
function getKriteriaNama($no_urut) {
    $query = DB::select("SELECT * FROM kriteria_bansos join kriteria on kriteria.id = kriteria_bansos.kriteria_id where kriteria_bansos.jenis_bansos_id='1'");
    foreach ($query as $row) {
		$nama[] = $row->nama_kriteria;
	}
	return $nama[($no_urut)];
}




