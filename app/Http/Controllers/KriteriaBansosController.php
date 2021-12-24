<?php

namespace App\Http\Controllers;

use App\Http\Requests\KriteriaBansosRequest;
use App\Models\Jenisbansos;
use App\Models\Kriteria;
use App\Models\KriteriaBansos;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriaBansosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kriteria_bansos')
        ->join('jenis_bansos', 'jenis_bansos.id', '=', 'kriteria_bansos.jenis_bansos_id')
        ->join('kriteria', 'kriteria.id', '=', 'kriteria_bansos.kriteria_id')
        ->select('kriteria_bansos.*', 'jenis_bansos.nama_jenis_bansos','kriteria.nama_kriteria')
        ->get();
        return view('kriteria_bansos.index')->with([
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
        $kriteria = Kriteria::all();
        return view('kriteria_bansos.create')->with([
            'jenis_bansos' => $jenis_bansos,
            'kriteria' => $kriteria

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KriteriaBansosRequest $request)
    {
        $data = $request->all();
        KriteriaBansos::create($data);
        Alert::toast('Tambah data berhasil', 'success');
        return redirect()->route('kriteria_bansos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KriteriaBansos  $kriteriaBansos
     * @return \Illuminate\Http\Response
     */
    public function show(KriteriaBansos $kriteriaBansos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KriteriaBansos  $kriteriaBansos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis_bansos = Jenisbansos::all();
        $kriteria = Kriteria::all();
        $data = KriteriaBansos::findOrFail($id);
        return view('kriteria_bansos.edit')->with([
            'data' => $data,
            'jenis_bansos' => $jenis_bansos,
            'kriteria' => $kriteria
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KriteriaBansos  $kriteriaBansos
     * @return \Illuminate\Http\Response
     */
    public function update(KriteriaBansosRequest $request, $id)
    {
        $data = $request->all();
        $item = KriteriaBansos::findOrFail($id);
        $item->update($data);
        Alert::toast('Update data berhasil', 'success');
        return redirect()->route('kriteria_bansos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KriteriaBansos  $kriteriaBansos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = KriteriaBansos::findOrFail($id);
        $data->delete();
        Alert::toast('Hapus data berhasil', 'success');
        return redirect()->route('kriteria_bansos.index');
    }
}
