@extends('layouts.master')
@section('title', 'Edit kriteria')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <form action="{{ route('kriteria.update', $data->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <div class="mb-2">
                                    <label for="kode_kriteria" class="form-label">Kode kriteria</label>
                                    <input readonly type="text" class="form-control " name="kode_kriteria" autocomplete="off" id="nama_kriteria" placeholder="Kode kriteria" value="{{ old('kode_kriteria') ? old('kode_kriteria') : $data->kode_kriteria}}">
                                    @error('kode_kriteria')
                                        <span style="color:red; font-size:12px">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <div class="mb-2">
                                    <label for="nama_kriteria" class="form-label">Nama kriteria</label>
                                    <input type="text" class="form-control " name="nama_kriteria" autocomplete="off" id="nama_kriteria" placeholder="Nama kriteria" value="{{ old('nama_kriteria') ? old('nama_kriteria') : $data->nama_kriteria}}">
                                    @error('nama_kriteria')
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
