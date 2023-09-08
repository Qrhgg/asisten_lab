<?php

namespace App\Http\Controllers;

use App\Models\LaporanAlat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class LaporanAlatController extends Controller
{


    public function index(){


         $laporan_alat = LaporanAlat::all();

         $waktu = Carbon::now();





        return view('laporanalat.index', ['laporan_alat' => $laporan_alat, 'waktu' => $waktu]);

    }



    public function store(Request $request){



        $data = [
            'tanggal' => $request->tanggal,
            'peralatan' => $request->peralatan,
            'ruangan' => $request->ruangan,
            'nama_dosen' => $request->nama_dosen,
            'mahasiswa_pemberi' => auth()->user()->siswa->id,

          
            'jam_mulai' =>   $waktu = Carbon::createFromFormat('H:i', $request->jam_mulai),
            'jam_habis' =>   $waktu = Carbon::createFromFormat('H:i', $request->jam_habis),
            'status' => 'belum selesai',
    
        ];
        
        DB::table('laporan_alat_asisten')->insert($data);


    
    return redirect('/laporanalat');
    }


    public function update(Request $request,$id){

        $waktu = Carbon::now();
    

        DB::table('laporan_alat_asisten')
        ->where('id', $id)
        ->update(['mahasiswa_pengambil' => auth()->user()->siswa->id, 
        'status' => $request->status,
        'jam_diambil' => $waktu
    
    
    ]);

    return redirect('/laporanalat');

    }

    public function hapus($id){

         $laporanalat =LaporanAlat::find($id);
        $laporanalat->delete();


        return redirect('/laporanalat');



    }


   
}
