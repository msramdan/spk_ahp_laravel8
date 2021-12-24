<?php

namespace App\Http\Controllers;

use App\Models\Jenisbansos;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_bansos = Jenisbansos::all();
        return view('report.index')->with([
            'jenis_bansos' => $jenis_bansos
        ]);
    }

    public function view(){
        $id = $_POST['jenis_bansos_id'];
        return view('report.hasil')->with([
            'jenis_bansos_id' => $id
        ]);
    }
}
