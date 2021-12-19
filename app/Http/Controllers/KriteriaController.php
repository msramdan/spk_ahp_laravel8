<?php

namespace App\Http\Controllers;

use App\Http\Requests\KriteriaRequest;
use App\Models\Kriteria;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class KriteriaController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kriteria::all();
        return view('kriteria.index')->with([
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
        $Kriteria = new Kriteria;
        // ambil maksimal kode Kriteria dari yang sudah ada di database
        $max = Kriteria::max('kode_kriteria');


        // jika nilai variabel max tidak kosong
        if (!empty($max)) {
            # simpan nilai max kedalam variabel kode
            $kode = $max; //A001
            # buat urutan kode (01)
            $urutan = (int) substr($kode,1,3);

        }else{
            # urutan mulai dari 0
            $urutan = 0;
        }

        # increment variabel urutan
        $urutan++;
        # buat format kode => A01, A02, dst..
        $kode = 'K'.sprintf("%03s",$urutan);

        return view('kriteria.create', compact(['kode']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KriteriaRequest $request)
    {
        $data = $request->all();
        Kriteria::create($data);
        Alert::toast('Tambah data berhasil', 'success');
        return redirect()->route('kriteria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kriteria  $Kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $Kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kriteria  $Kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kriteria::findOrFail($id);
        return view('kriteria.edit')->with([
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kriteria  $Kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(KriteriaRequest $request, $id)
    {
        $data = $request->all();
        $item = Kriteria::findOrFail($id);
        $item->update($data);
        Alert::toast('Update data berhasil', 'success');
        return redirect()->route('kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriteria  $Kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kriteria::findOrFail($id);
        $data->delete();
        Alert::toast('Hapus data berhasil', 'success');
        return redirect()->route('kriteria.index');
    }
}
