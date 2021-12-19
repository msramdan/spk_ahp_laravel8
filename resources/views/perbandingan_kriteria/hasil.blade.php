@extends('layouts.master')
@section('title', 'Perbandingan Kriteria')
@section('content')
@php
$jenis_bansos_id =$_POST['jenis_bansos_id'];

$n =3;

$matrik = array();
$urut 	= 0;
for ($x=0; $x <= ($n-2) ; $x++) {
	for ($y=($x+1); $y <= ($n-1) ; $y++) {
		$urut++;
		$pilih	= "pilih".$urut;
		$bobot 	= "bobot".$urut;

		if ($_POST[$pilih] == 1) {
			$matrik[$x][$y] = $_POST[$bobot];
			$matrik[$y][$x] = 1 / $_POST[$bobot];
		} else {
			$matrik[$x][$y] = 1 / $_POST[$bobot];
			$matrik[$y][$x] = $_POST[$bobot];
		}
		inputDataPerbandinganKriteria($x,$y,$matrik[$x][$y],$jenis_bansos_id);
	}
}

// diagonal --> bernilai 1
for ($i = 0; $i <= ($n-1); $i++) {
		$matrik[$i][$i] = 1;
	}

	// inisialisasi jumlah tiap kolom dan baris kriteria
	$jmlmpb = array();
	$jmlmnk = array();
	for ($i=0; $i <= ($n-1); $i++) {
		$jmlmpb[$i] = 0;
		$jmlmnk[$i] = 0;
	}

	// menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
	for ($x=0; $x <= ($n-1) ; $x++) {
		for ($y=0; $y <= ($n-1) ; $y++) {
			$value		= $matrik[$x][$y];
			$jmlmpb[$y] += $value;

		}
	}

	for ($x=0; $x <= ($n-1) ; $x++) {
		for ($y=0; $y <= ($n-1) ; $y++) {
			$matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];
			$value	= $matrikb[$x][$y];
			$jmlmnk[$x] += $value;

		}
		// nilai priority vektor
		$pv[$x]	 = $jmlmnk[$x] / $n;

		// memasukkan nilai priority vektor ke dalam tabel pv_kriteria dan pv_alternatif
			$kriteria_id = getKriteriaID($x,$jenis_bansos_id);
			inputKriteriaPV($kriteria_id,$pv[$x]);
	}
    // cek konsistensi
	$eigenvektor = getEigenVector($jmlmpb,$jmlmnk,$n);
	$consIndex   = getConsIndex($jmlmpb,$jmlmnk,$n);
	$consRatio   = getConsRatio($jmlmpb,$jmlmnk,$n);


@endphp

<section class="content">
	<h3 class="ui header">Matriks Perbandingan Berpasangan</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Kriteria</th>
				<?php
					for ($i=0; $i <= ($n-1); $i++) {
						echo "<th>".getKriteriaNama($i)."</th>";
					}
				?>
			</tr>
		</thead>
		<tbody>
<?php
	for ($x=0; $x <= ($n-1); $x++) {
		echo "<tr>";
		echo "<td>".getKriteriaNama($x)."</td>";
			for ($y=0; $y <= ($n-1); $y++) {
				echo "<td>".round($matrik[$x][$y],5)."</td>";
			}

		echo "</tr>";
	}
?>
		</tbody>
		<tfoot>			<tr>
				<th>Jumlah</th>
<?php
		for ($i=0; $i <= ($n-1); $i++) {
			echo "<th>".round($jmlmpb[$i],5)."</th>";
		}
?>
			</tr>
		</tfoot>
	</table>


	<br>

	<h3 class="ui header">Matriks Nilai Kriteria</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Kriteria</th>
<?php
	for ($i=0; $i <= ($n-1); $i++) {
		echo "<th>".getKriteriaNama($i)."</th>";
	}
?>
				<th>Jumlah</th>
				<th>Priority Vector</th>
			</tr>
		</thead>
		<tbody>
<?php
	for ($x=0; $x <= ($n-1); $x++) {
		echo "<tr>";
		echo "<td>".getKriteriaNama($x)."</td>";
			for ($y=0; $y <= ($n-1); $y++) {
				echo "<td>".round($matrikb[$x][$y],5)."</td>";
			}

		echo "<td>".round($jmlmnk[$x],5)."</td>";
		echo "<td>".round($pv[$x],5)."</td>";

		echo "</tr>";
	}
?>

		</tbody>
		<tfoot>
			<tr>
				<th colspan="<?php echo ($n+2)?>">Principe Eigen Vector (λ maks)</th>
				<th><?php echo (round($eigenvektor,5))?></th>
			</tr>
			<tr>
				<th colspan="<?php echo ($n+2)?>">Consistency Index</th>
				<th><?php echo (round($consIndex,5))?></th>
			</tr>
			<tr>
				<th colspan="<?php echo ($n+2)?>">Consistency Ratio</th>
				<th><?php echo (round(($consRatio * 100),2))?> %</th>
			</tr>
		</tfoot>
	</table>

<?php
	if ($consRatio > 0.1) {
?>
		<div class="alert alert-danger alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		<strong>Nilai Consistency Ratio melebihi 10% !!!</strong>
		<p>Mohon input kembali tabel perbandingan...</p>
		</div>

		<a href='javascript:history.back()'>
		<button class="btn btn-default">
			<i class="fa fa-arrow-left"></i>
				Kembali
			</button>
		</a>

<?php
	} else {

?>
<br>
	<?php
	// $query = $this->db->query("SELECT * FROM kriteria order by kriteria_id asc LIMIT 1");
	// $data = $query->row();
	// $awal = $data->kriteria_id;

	?>
	{{-- <a href="<?= base_url('Perbandingan_alternatif/alt/' .$awal) ?>"> --}}
	<button class="btn btn-success">
	<i class="fa fa-arrow-right"></i>
		Lanjut
	</button>
	</a>
</section>

<?php
	}
?>

@endsection
