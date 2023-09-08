<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Mahasiswa;
use App\Models\Shift;

use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;


class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mahasiswa = auth()->user()->siswa;

        $shift = Shift::where('id', $mahasiswa->id_shift)->first();

        

       
        
        
        
        return view('absen.absenmasuk', ['shift' => $shift]);

    }

        public function absenkeluar(){

            return view('absen.absenkeluar');
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
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $absen = Absen::where([
            ['user_id', '=', auth()->user()->id],
            ['mahasiswa_id', '=', auth()->user()->siswa->id],
            ['tgl', '=',$tanggal],
        ])->first();

        if($absen){
            return redirect('/absenmasuk')->with('hapus', 'Anda Sudah Absen !');
        }else{
            Absen::create([
                'user_id' => auth()->user()->id,
                'mahasiswa_id' => auth()->user()->siswa->id,
                'tgl' => $tanggal,
                'jam_masuk' => $localtime,

            ]);
        }

        return redirect('/absenmasuk')->with('sukses', 'Anda Berhasil Absen ! ');
    }

    public function simpankeluar(Request $request){
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');


       

        $absen = Absen::where([
            ['user_id', '=', auth()->user()->id],
            ['mahasiswa_id', '=', auth()->user()->siswa->id],
            ['tgl', '=', $tanggal],

        ])->first();

        $dt=[
            'jam_keluar' => $localtime,
            'keterangan' => 'Hadir',
        ];

        
       

        if ($absen->jam_keluar == ""){
            $absen->update($dt);
            return redirect('/absenkeluar')->with('sukses', 'Anda Berhasil Absen');

        }else{
            return redirect('/absenkeluar')->with('hapus', 'Anda Sudah Absen ! ');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        //
    }

    public function tambah_absen(Request $request, $id){

        $mahasiswa=Mahasiswa::find($id);

        $absen_= Absen::create([
            'user_id' => $mahasiswa->user_id,
            'mahasiswa_id' => $mahasiswa->id,
            'tgl' => $request->tanggal,
            'jam_masuk' => '-' , 
            'jam_keluar' => '-',
            'keterangan' => $request->keterangan

        ]);

        // $absen = Absen::where('mahasiswa_id',  $mahasiswa->id )->get();
        $absen = Absen::where('mahasiswa_id',  $mahasiswa->id )->orderBy('tgl', 'asc')->get();



        return view('mahasiswa.profile', ['mahasiswa' => $mahasiswa, 'absen' => $absen]);

    }
   
}
