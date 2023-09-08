<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanMahasiswa;
use App\Http\Controllers\LaporanMahasiswaController;
use Carbon\Carbon;
use App\Models\Mahasiswa;
use App\Models\ruangan;



class LaporanMahasiswaController extends Controller
{
    //

    public function index(){


        $laporan = LaporanMahasiswa::where('id_user', auth()->user()->id)->orderBy('tanggal', 'asc')->get();
        // $laporan = LaporanMahasiswa::where('mahasiswa_id',  $mahasiswa->id )->orderBy('tgl', 'asc')->get();

        $ruangan = ruangan::all();

        $date = Carbon::now();
        $formattedDate = $date->format('Y-m-d');








        return view('mahasiswa.laporan', ['laporan' => $laporan, 'formattedDate' => $formattedDate, 'ruangan' => $ruangan]);

    }

    public function store(Request $request){


        $this->validate($request,[

           
            'tanggal' => 'required',
            

        ],
        [

           
            'tanggal.required' => 'tanggal harus di isi',
      

        ]);



        LaporanMahasiswa::create([
            'tanggal' => $request->tanggal,
            'id_user' => auth()->user()->id,
            'id_mahasiswa' => auth()->user()->siswa->id,
            'id_shift' => auth()->user()->siswa->id_shift,
            'kegiatan' => $request->kegiatan,
            'ruangan_id' => $request->ruangan,
            'status' => $request->status,

        ]);

        // $laporan = new LaporanMahasiswa;
        // $laporan->tanggal = $request->tanggal;
        // $laporan->id_mahasiswa = auth()->user()->siswa->id;
        // $laporan->id_user = auth()->user()->id;
        // $laporan->id_shift = auth()->user()->siswa->id_shift;
        // $laporan->kegiatan =$request->kegiatan;
        // $laporan->ruangan =$request->ruangan;
        // $laporan->status =$request->status;
        // $laporan->keterangan =$request->keterangan;
       
        // $laporan->save();

        return redirect('/laporanmahasiswa')->with('sukses', 'Laporan Berhasil Ditambah');

    }


    public function hapus($id){


    $laporan=LaporanMahasiswa::find($id);
    $laporan->delete();

    return redirect('/laporanmahasiswa')->with('hapus', 'Laporan Berhasil Dihapus !');
    

}
}

