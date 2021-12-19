@extends('layouts.master')
@section('title', 'Edit Sub Kriteria')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <form action="{{ route('sub_kriteria.update', $data->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <div class="mb-2">
                                    <label for="kode_sub_kriteria" class="form-label">Kode Sub Kriteria</label>
                                    <input type="text" class="form-control " name="kode_sub_kriteria" autocomplete="off" id="kode_sub_kriteria" readonly placeholder="Kode Sub Kriteria" value="{{ old('kode_sub_kriteria') ? old('kode_sub_kriteria') : $data->kode_sub_kriteria}}">
                                    @error('kode_sub_kriteria')
                                        <span style="color:red; font-size:12px">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="mb-2">
                                    <label for="nama_sub_kriteria" class="form-label">Nama Sub Kriteria</label>
                                    <input type="text" class="form-control " name="nama_sub_kriteria" autocomplete="off" id="nama_sub_kriteria" placeholder="Nama Sub Kriteria" value="{{ old('nama_sub_kriteria') ? old('nama_sub_kriteria') : $data->nama_sub_kriteria}}">
                                    @error('nama_sub_kriteria')
                                        <span style="color:red; font-size:12px">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <div class="mb-2">
                                    <label for="kriteria_id" class="form-label">Kriteria</label>
                                    <select name="kriteria_id" class="form-control">
                                        <option value="" disabled selected>-- Pilih --</option>
                                        @foreach ($kriteria as $row)
                                            <option value="{{ $row->id }}" {{ old('kriteria_id') && old('kriteria_id') == $row->id ? 'selected' : $row->id }}
                                                {{ $data->kriteria_id == $row->id ? 'selected' : '' }}>{{ $row->nama_kriteria }}</option>
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
