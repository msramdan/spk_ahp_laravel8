<?php

namespace App\Http\Controllers;

use App\Http\Requests\jenisBansosRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Jenisbansos;
use Illuminate\Http\Request;

class JenisBansosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $jenis_bansos = Jenisbansos::all();
        return view('jenis_bansos.index')->with([
            'jenis_bansos' => $jenis_bansos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis_bansos.create');
    }

    public function store(jenisBansosRequest $request)
    {
        $data = $request->all();
        Jenisbansos::create($data);
        Alert::toast('Tambah data berhasil', 'success');
        return redirect()->route('jenisBansos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenisbansos  $jenisbansos
     * @return \Illuminate\Http\Response
     */
    public function show(Jenisbansos $jenisbansos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenisbansos  $jenisbansos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Jenisbansos::findOrFail($id);
        return view('jenis_bansos.edit')->with([
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jenisbansos  $jenisbansos
     * @return \Illuminate\Http\Response
     */
    public function update(jenisBansosRequest $request, $id)
    {
        $data = $request->all();
        $item = Jenisbansos::findOrFail($id);
        $item->update($data);
        Alert::toast('Update data berhasil', 'success');
        return redirect()->route('jenisBansos.index');
    }

    public function destroy($id)
    {
        $Jenisbansos = Jenisbansos::findOrFail($id);
        $Jenisbansos->delete();
        Alert::toast('Hapus data berhasil', 'success');
        return redirect()->route('jenisBansos.index');
    }
}
