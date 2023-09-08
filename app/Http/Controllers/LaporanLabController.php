<?php

namespace App\Http\Controllers;

use App\Models\LaporanLab;
use App\Models\lab_komputer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LaporanLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $lab = lab_komputer::all();
        $laporan_lab = LaporanLab::all();
        return view('laporan-lab.index', ['laporan_lab' => $laporan_lab, 'lab' => $lab]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        LaporanLab::create($request->all());


        return redirect('/laporan-lab')->with('sukses', 'Laporan Lab Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanLab  $laporanLab
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanLab $laporanLab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanLab  $laporanLab
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanLab $laporanLab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanLab  $laporanLab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $laporan_lab = LaporanLab::find($id);
        $laporan_lab->update($request->all());

        return redirect('/laporan-lab')->with('edit', 'Laporan Lab Berhasil Diubah ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanLab  $laporanLab
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $laporan_lab=LaporanLab::find($id);
        $laporan_lab->delete();

        return redirect('/laporan-lab')->with('hapus', 'Laporan Lab Berhasil Dihapus !');

    }
}
