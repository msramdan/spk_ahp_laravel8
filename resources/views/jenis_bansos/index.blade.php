@extends('layouts.master')
@section('title', 'Jenis Bansos')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('jenisBansos.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jenis Bansos</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenis_bansos as $item )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_jenis_bansos }}</td>
                            <td>
                                <a href="{{ route('jenisBansos.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('jenisBansos.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                    {!! method_field('delete') . csrf_field() !!}
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
