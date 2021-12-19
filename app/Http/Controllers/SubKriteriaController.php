<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubKriteriaRequest;
use App\Models\Kriteria;
use App\Models\SubKriteri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('sub_kriteria')
        ->join('kriteria', 'kriteria.id', '=', 'sub_kriteria.kriteria_id')
        ->select('sub_kriteria.*', 'kriteria.nama_kriteria')
        ->get();
        return view('sub_kriteria.index')->with([
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
        $kriteria = Kriteria::all();
        // ambil maksimal kode Kriteria dari yang sudah ada di database
        $max = SubKriteri::max('kode_sub_kriteria');


        // jika nilai variabel max tidak kosong
        if (!empty($max)) {
            # simpan nilai max kedalam variabel kode
            $kode = $max; //SK001

            # buat urutan kode (01)
            $urutan = (int) substr($kode,2,3);

        }else{
            # urutan mulai dari 0
            $urutan = 0;
        }

        # increment variabel urutan
        $urutan++;
        # buat format kode => A01, A02, dst..
        $kode = 'SK'.sprintf("%03s",$urutan);
        return view('sub_kriteria.create')->with([
            'kode' => $kode,
            'kriteria' => $kriteria

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubKriteriaRequest $request)
    {
        $data = $request->all();
        SubKriteri::create($data);
        Alert::toast('Tambah data berhasil', 'success');
        return redirect()->route('sub_kriteria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubKriteri  $subKriteri
     * @return \Illuminate\Http\Response
     */
    public function show(SubKriteri $subKriteri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubKriteri  $subKriteri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kriteria = Kriteria::all();
        $data = SubKriteri::findOrFail($id);
        return view('sub_kriteria.edit')->with([
            'data' => $data,
            'kriteria' => $kriteria

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubKriteri  $subKriteri
     * @return \Illuminate\Http\Response
     */
    public function update(SubKriteriaRequest $request, $id)
    {
        $data = $request->all();
        $item = SubKriteri::findOrFail($id);
        $item->update($data);
        Alert::toast('Update data berhasil', 'success');
        return redirect()->route('sub_kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubKriteri  $subKriteri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SubKriteri::findOrFail($id);
        $data->delete();
        Alert::toast('Hapus data berhasil', 'success');
        return redirect()->route('sub_kriteria.index');
    }
}
