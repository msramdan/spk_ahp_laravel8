<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlternatifRequest;
use App\Models\Alternatif;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Alternatif::all();
        return view('alternatif.index')->with([
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
        $alternatif = new Alternatif;
        // ambil maksimal kode alternatif dari yang sudah ada di database
        $max = Alternatif::max('kode_alternatif');


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
        $kode = 'A'.sprintf("%03s",$urutan);

        return view('alternatif.create', compact(['kode']));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlternatifRequest $request)
    {
        $data = $request->all();
        Alternatif::create($data);
        Alert::toast('Tambah data berhasil', 'success');
        return redirect()->route('alternatif.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Alternatif::findOrFail($id);
        return view('alternatif.edit')->with([
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(AlternatifRequest $request, $id)
    {
        $data = $request->all();
        $item = Alternatif::findOrFail($id);
        $item->update($data);
        Alert::toast('Update data berhasil', 'success');
        return redirect()->route('alternatif.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Alternatif::findOrFail($id);
        $data->delete();
        Alert::toast('Hapus data berhasil', 'success');
        return redirect()->route('alternatif.index');
    }
}
