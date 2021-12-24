@extends('layouts.master')
@section('title', 'Nilai Alternatif')
@section('content')
@php
    $query = DB::select("SELECT alternatif_bansos.jenis_bansos_id,alternatif.nama_alternatif,alternatif.id as alternatif_id
    FROM alternatif_bansos
    Join alternatif on alternatif.id = alternatif_bansos.alternatif_id
    WHERE jenis_bansos_id=$jenis_bansos_id");

    $data_kriteria = DB::select("SELECT kriteria_bansos.kriteria_id, kriteria.nama_kriteria
    FROM kriteria_bansos join kriteria on kriteria.id = kriteria_bansos.kriteria_id
    WHERE kriteria_bansos.jenis_bansos_id=$jenis_bansos_id");
@endphp
<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body booking_card">
                <div class="card-body">
                    <div class="table-responsive">

                        <h5>Inputkan Nilai Alternatif !!!</h5>
                        <form action="{{ route('hasil_spk') }}" method="POST">
                        @csrf
                        <table class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th>Nama Alternatif</th>
                                    @foreach ($data_kriteria as $b )
                                        <th>{{ $b->nama_kriteria }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            @foreach ($query as $a)
                                <tr>
                                    <td>{{ $a->nama_alternatif }}</td>
                                    <input type="hidden" name="jenis_bansos_id" value="{{ $jenis_bansos_id }}" class="form-control">
                                    @foreach ($data_kriteria as $b)
                                        <td>
                                            @php
                                                $data_sub_kriteria = DB::select("SELECT *
                                                FROM sub_kriteria
                                                WHERE kriteria_id=$b->kriteria_id");
                                            @endphp
                                            <input type="hidden" name="alternatif_id[]" value="{{ $a->alternatif_id }}" class="form-control">
                                            <input type="hidden" name="kriteria_id[]" value="{{ $b->kriteria_id }}" class="form-control">
                                            <select name="sub_kriteria_id[]" id="sub_kriteria_id" class="form-control" required>
                                                {{-- <option value=""> -- Pilih --</option> --}}
                                                @foreach ($data_sub_kriteria as $c )
                                                    <option value="{{ $c->id}}">{{ $c->nama_sub_kriteria }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                        <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
