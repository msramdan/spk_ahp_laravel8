@extends('layouts.master')
@section('title', 'Tambah Jenis Bansos')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <form action="{{ route('jenisBansos.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label for="nama_jenis_bansos" class="form-label">Nama Jenis Bansos</label>
                                    <input type="text" class="form-control " name="nama_jenis_bansos" autocomplete="off" id="nama_jenis_bansos" placeholder="Nama Jenis Bansos" value="{{ old('nama_jenis_bansos') }}">
                                    @error('nama_jenis_bansos')
                                        <span style="color:red; font-size:12px">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
