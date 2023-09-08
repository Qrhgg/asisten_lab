<?php

namespace App\Http\Controllers;

use App\Models\lab_komputer;
use Illuminate\Http\Request;

class LabKomputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lab=lab_komputer::all();

        return view('lab-komputer.index', ['lab' => $lab ]);

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
        lab_komputer::create($request->all());

        return redirect ('/lab-komputer')->with('sukses', 'Lab Komputer Berhasil Ditambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lab_komputer  $lab_komputer
     * @return \Illuminate\Http\Response
     */
    public function show(lab_komputer $lab_komputer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lab_komputer  $lab_komputer
     * @return \Illuminate\Http\Response
     */
    public function edit(lab_komputer $lab_komputer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lab_komputer  $lab_komputer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lab =lab_komputer::find($id);

        $lab->update($request->all());

        return redirect('/lab-komputer')->with('edit', 'Lab Komputer Berhasil DiUbah ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lab_komputer  $lab_komputer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lab = lab_komputer::find($id);
        $lab->delete();

        return redirect ('/lab-komputer')->with('hapus', 'Lab Komputer Berhasil Dihapus !');

    }
}
