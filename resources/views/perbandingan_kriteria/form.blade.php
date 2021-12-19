@extends('layouts.master')
@section('title', 'Perbandingan Kriteria')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <form action="{{ route('hasil_pv_alternatif') }}" method="POST">
                        @csrf
                        <table  class="table table-bordered"  width="100%" cellspacing="0">
                            <thead class="table table-bordered">
                                <tr>
                                    <th colspan="2" class="text-center">Pilih yang lebih penting</th>
                                    <th class="text-center">Nilai perbandingan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $jenis_bansos_id = $_GET['jenis_bansos_id'];
                                    $list = \DB::select("SELECT kriteria_bansos.*,kriteria.nama_kriteria from kriteria_bansos
                                    join kriteria on kriteria.id = kriteria_bansos.kriteria_id where kriteria_bansos.jenis_bansos_id='$jenis_bansos_id'");
                                    if ($list) {
                                        foreach ($list as $a) {
                                            $pilihan[] = $a->nama_kriteria;
                                        }
                                    }
                                @endphp
                                <?php
                                $n = DB::table("kriteria_bansos")
                                        ->where('jenis_bansos_id', '=', $jenis_bansos_id)
                                        ->count();

                                $urut = 0;
                                for ($x = 0; $x <= ($n - 2); $x++) {
                                    for ($y = ($x + 1); $y <= ($n - 1); $y++) {
                                        $urut++;
                                ?>
                                        <tr>
                                            <td>
                                                <div class="radio">
                                                    <label>
                                                        <input name="pilih<?php echo $urut ?>" value="1" checked="" type="radio" class=""> <?php echo $pilihan[$x]; ?>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="radio">
                                                    <label>
                                                        <input name="pilih<?php echo $urut ?>" value="2" type="radio" class=""> <?php echo $pilihan[$y]; ?>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="field">
                                                    <?php
                                                    $nilai = getNilaiPerbandinganKriteria($x, $y,$jenis_bansos_id);
                                                    ?>
                                                    <input type="number" max="12" min="1" class="form-control" name="bobot<?php echo $urut ?>" value="<?php echo $nilai ?>" required>
                                                </div>
                                            </td>

                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <input type="text" name="jenis" value="kriteria" hidden>
                        <input type="text" name="jenis_bansos_id" value="{{ $jenis_bansos_id }}" hidden>
                        @if ($n > 0)
                            <input class="btn btn-sm btn-primary" type="submit" name="submit" value="SUBMIT">
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Kedua elemen sama pentingnya</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>Elemen yang satu sedikit lebih penting dari pada elemen yang lainnya</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Elemen yang satu lebih penting dari pada yang lainnya</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Satu elemen kelas lebih mutlak penting dari pada elemen lainnya</td>
                                        <td>7</td>
                                    </tr>
                                    <tr>
                                        <td>Satu elemen mutlak penting dari pada elemen lainnya</td>
                                        <td>9</td>
                                    </tr>
                                    <tr>
                                        <td>Nilai-nilai antara dua nllai pertimbangan-pertimbangan yang berdekatan</td>
                                        <td>2,4,6,8</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
