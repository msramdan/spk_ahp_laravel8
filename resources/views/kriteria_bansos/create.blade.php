@extends('layouts.master')
@section('title', 'Tambah kriteria Bansos')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <form action="{{ route('kriteria_bansos.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <div class="mb-2">
                                    <label for="jenis_bansos_id" class="form-label">Jenis Bansos</label>
                                    <select name="jenis_bansos_id" class="form-control">
                                        <option value="" disabled selected>-- Pilih --</option>
                                        @foreach ($jenis_bansos as $data)
                                            <option value="{{ $data->id }}" {{ old('jenis_bansos_id') && old('jenis_bansos_id') == $data->id ? 'selected' : $data->id }}>{{ $data->nama_jenis_bansos }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenis_bansos_id')
                                        <span style="color:red; font-size:12px">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <div class="mb-2">
                                    <label for="kriteria_id" class="form-label">Kriteria Bansos</label>
                                    <select name="kriteria_id" class="form-control">
                                        <option value="" disabled selected>-- Pilih --</option>
                                        @foreach ($kriteria as $data)
                                            <option value="{{ $data->id }}" {{ old('kriteria_id') && old('kriteria_id') == $data->id ? 'selected' : $data->id }}>{{ $data->nama_kriteria }}</option>
                                        @endforeach
                                    </select>
                                    @error('kriteria_id')
                                        <span style="color:red; font-size:12px">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>


                            </div>
                        </div>
                            <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
