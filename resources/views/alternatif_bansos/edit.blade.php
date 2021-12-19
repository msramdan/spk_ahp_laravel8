@extends('layouts.master')
@section('title', 'Edit Alternatif Bansos')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <form action="{{ route('alternatif_bansos.update', $data->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <div class="mb-2">
                                    <label for="jenis_bansos_id" class="form-label">Jenis Bansos</label>
                                    <select name="jenis_bansos_id" class="form-control">
                                        <option value="" disabled selected>-- Pilih --</option>
                                        @foreach ($jenis_bansos as $row)
                                            <option value="{{ $row->id }}" {{ old('jenis_bansos_id') && old('jenis_bansos_id') == $row->id ? 'selected' : $row->id }}
                                                {{ $data->jenis_bansos_id == $row->id ? 'selected' : '' }}>{{ $row->nama_jenis_bansos }}</option>
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
                                    <label for="alternatif_id" class="form-label">Alternatif</label>
                                    <select name="alternatif_id" class="form-control">
                                        <option value="" disabled selected>-- Pilih --</option>
                                        @foreach ($alternatif as $row)
                                            <option value="{{ $row->id }}" {{ old('alternatif_id') && old('alternatif_id') == $row->id ? 'selected' : $row->id }}
                                                {{ $data->alternatif_id == $row->id ? 'selected' : '' }}>{{ $row->nama_alternatif }}</option>
                                        @endforeach
                                    </select>
                                    @error('alternatif_id')
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
