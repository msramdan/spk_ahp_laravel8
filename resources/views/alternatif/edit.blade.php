@extends('layouts.master')
@section('title', 'Edit Alternatif')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <form action="{{ route('alternatif.update', $data->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <div class="mb-2">
                                    <label for="kode_alternatif" class="form-label">Kode Alternatif</label>
                                    <input readonly type="text" class="form-control " name="kode_alternatif" autocomplete="off" id="nama_alternatif" placeholder="Kode Alternatif" value="{{ old('kode_alternatif') ? old('kode_alternatif') : $data->kode_alternatif}}">
                                    @error('kode_alternatif')
                                        <span style="color:red; font-size:12px">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <div class="mb-2">
                                    <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
                                    <input type="text" class="form-control " name="nama_alternatif" autocomplete="off" id="nama_alternatif" placeholder="Nama Alternatif" value="{{ old('nama_alternatif') ? old('nama_alternatif') : $data->nama_alternatif}}">
                                    @error('nama_alternatif')
                                        <span style="color:red; font-size:12px">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                            <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
