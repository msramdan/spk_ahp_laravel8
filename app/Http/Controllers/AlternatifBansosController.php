<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlternatifBansosRequest;
use App\Models\Alternatif;
use App\Models\AlternatifBansos;
use App\Models\Jenisbansos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AlternatifBansosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $data = DB::table('alternatif_bansos')
        ->join('jenis_bansos', 'jenis_bansos.id', '=', 'alternatif_bansos.jenis_bansos_id')
        ->join('alternatif', 'alternatif.id', '=', 'alternatif_bansos.alternatif_id')
        ->select('alternatif_bansos.*', 'jenis_bansos.nama_jenis_bansos','alternatif.nama_alternatif')
        ->get();
        return view('alternatif_bansos.index')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_bansos = Jenisbansos::all();
        $alternatif = DB::select("SELECT alternatif.id,alternatif.nama_alternatif FROM alternatif LEFT JOIN alternatif_bansos ON alternatif_bansos.alternatif_id=alternatif.id where alternatif_bansos.id IS null");
        return view('alternatif_bansos.create')->with([
            'jenis_bansos' => $jenis_bansos,
            'alternatif' => $alternatif

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlternatifBansosRequest $request)
    {
        $data = $request->all();
        AlternatifBansos::create($data);
        Alert::toast('Tambah data berhasil', 'success');
        return redirect()->route('alternatif_bansos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlternatifBansos  $alternatifBansos
     * @return \Illuminate\Http\Response
     */
    public function show(AlternatifBansos $alternatifBansos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlternatifBansos  $alternatifBansos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis_bansos = Jenisbansos::all();
        $data = AlternatifBansos::findOrFail($id);
        $alternatif = DB::select("SELECT alternatif.id,alternatif.nama_alternatif FROM alternatif LEFT JOIN alternatif_bansos ON alternatif_bansos.alternatif_id=alternatif.id where alternatif_bansos.id IS null or alternatif.id='$data->alternatif_id'");
        return view('alternatif_bansos.edit')->with([
            'data' => $data,
            'jenis_bansos' => $jenis_bansos,
            'alternatif' => $alternatif

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlternatifBansos  $alternatifBansos
     * @return \Illuminate\Http\Response
     */
    public function update(AlternatifBansosRequest $request, $id)
    {
        $data = $request->all();
        $item = AlternatifBansos::findOrFail($id);
        $item->update($data);
        Alert::toast('Update data berhasil', 'success');
        return redirect()->route('alternatif_bansos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlternatifBansos  $alternatifBansos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AlternatifBansos::findOrFail($id);
        $data->delete();
        Alert::toast('Hapus data berhasil', 'success');
        return redirect()->route('alternatif_bansos.index');
    }
}
