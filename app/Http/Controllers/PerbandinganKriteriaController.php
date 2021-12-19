<?php

namespace App\Http\Controllers;

use App\Models\Jenisbansos;
use App\Models\PerbandinganKriteria;
use Illuminate\Http\Request;

class PerbandinganKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_bansos = Jenisbansos::all();
        return view('perbandingan_kriteria.index')->with([
            'jenis_bansos' => $jenis_bansos

        ]);
    }


    public function prosess_spk(Request $request){
        $jenis_bansos_id = $request->jenis_bansos_id;
        return view('perbandingan_kriteria.form')->with([
            'jenis_bansos_id' => $jenis_bansos_id
        ]);
    }

    public function hasil_spk(Request $request){
        return view('perbandingan_kriteria.hasil');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerbandinganKriteria  $perbandinganKriteria
     * @return \Illuminate\Http\Response
     */
    public function show(PerbandinganKriteria $perbandinganKriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerbandinganKriteria  $perbandinganKriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(PerbandinganKriteria $perbandinganKriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerbandinganKriteria  $perbandinganKriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerbandinganKriteria $perbandinganKriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerbandinganKriteria  $perbandinganKriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerbandinganKriteria $perbandinganKriteria)
    {
        //
    }
}
