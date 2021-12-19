@extends('layouts.master')
@section('title', 'Perbandingan Kriteria')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <form action="{{ route('prosess_spk') }}" method="GET">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <div class="mb-2">
                                    <label for="jenis_bansos_id" class="form-label">Jenis Bansos</label>
                                    <select name="jenis_bansos_id" class="form-control" required>
                                        <option value="" disabled selected>-- Pilih --</option>
                                        @foreach ($jenis_bansos as $data)
                                            <option value="{{ $data->id }}" {{ old('jenis_bansos_id') && old('jenis_bansos_id') == $data->id ? 'selected' : $data->id }}>{{ $data->nama_jenis_bansos }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
