@extends('layouts.master')
@section('title', 'Tambah Alternatif')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <form action="{{ route('alternatif.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <div class="mb-2">
                                    <label for="kode_alternatif" class="form-label">Kode Alternatif</label>
                                    <input readonly type="text" class="form-control " name="kode_alternatif" autocomplete="off" id="nama_alternatif" placeholder="Kode Alternatif" value="{{ $kode }}">
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
                                    <input type="text" class="form-control " name="nama_alternatif" autocomplete="off" id="nama_alternatif" placeholder="Nama Alternatif" value="{{ old('nama_alternatif') }}">
                                    @error('nama_alternatif')
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
