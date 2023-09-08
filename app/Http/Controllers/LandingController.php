<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\Jurusan;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
class LandingController extends Controller
{
    
    public function index(){
        $siswa_malam = Mahasiswa::all()->where('id_shift', 3)->count();
        $siswa_siang= Mahasiswa::all()->where('id_shift', 2)->count();
        $siswa_pagi = Mahasiswa::all()->where('id_shift', 1)->count();
        $siswa_maintenance = Mahasiswa::all()->count();

        $shift_pagi = Shift::all()->where('id', 1)->first();
        $shift_siang = Shift::all()->where('id', 2)->first();
        $shift_malam = Shift::all()->where('id', 3)->first();

        
        
        
        

        return view('landing_page.home', ['siswa_malam'=> $siswa_malam, 'siswa_siang' => $siswa_siang, 'siswa_pagi' => $siswa_pagi,
         'siswa_maintenance' => $siswa_maintenance, 'shift_pagi' => $shift_pagi, 'shift_siang' => $shift_siang, 'shift_malam' => $shift_malam]);
    }

    public function piketpagi(){

        $siswa_pagi = Mahasiswa::all()->where('id_shift', 1);

        $shift_pagi = Shift::all()->where('id', 1)->first();
     


        return view('piket.piketpagi', ['siswa_pagi' => $siswa_pagi, 'shift_pagi' => $shift_pagi]);
    }

    public function piketpagiads(){

        $siswa_pagi = Mahasiswa::all()->where('id_shift', 1);
        $shift_pagi = Shift::all()->where('id', 1)->first();
     


        return view('piketads.piketpagiads', ['siswa_pagi' => $siswa_pagi, 'shift_pagi' => $shift_pagi]);
    }


    public function piketsiang(){

        $siswa_siang = Mahasiswa::all()->where('id_shift', 2);
        $shift_siang = Shift::all()->where('id', 2)->first();

        return view('piket.piketsiang', ['siswa_siang' => $siswa_siang, 'shift_siang' => $shift_siang]);


    }

    public function piketsiangads(){

        $siswa_siang = Mahasiswa::all()->where('id_shift', 2);
        $shift_siang = Shift::all()->where('id', 2)->first();

        return view('piketads.piketsiangads', ['siswa_siang' => $siswa_siang, 'shift_siang' => $shift_siang]);


    }


    public function piketmalam(){
        $siswa_malam = Mahasiswa::all()->where('id_shift', 3);
        $shift_malam = Shift::all()->where('id', 3)->first();

    

        return view('piket.piketmalam', ['siswa_malam' => $siswa_malam, 'shift_malam' => $shift_malam]);

    }

    public function piketmalamads(){
        $siswa_malam = Mahasiswa::all()->where('id_shift', 3);
        $shift_malam = Shift::all()->where('id', 3)->first();


        return view('piketads.piketmalamads', ['siswa_malam' => $siswa_malam, 'shift_malam' => $shift_malam]);

    }
    public function maintenance(){

        $maintenance = Mahasiswa::all();

        return view('piket.maintenance', ['maintenance' =>$maintenance]);

    }

    public function maintenanceads(){

        $maintenance = Mahasiswa::all();

        return view('piketads.maintenanceads', ['maintenance' =>$maintenance]);

    }



    public function register(){
        $jurusan = Jurusan::all();   
        $shift = Shift::all();
 

        return view('landing_page.register', ['jurusan' => $jurusan, 'shift' => $shift]);
    }

    public function prosesregister(Request $request){


        $this->validate($request,[

            'nim' => 'required|unique:mahasiswa',
            'nm_mahasiswa' => 'required',
            'email' => 'required|email|unique:users',
            'alamat' => 'required', 
            'id_jurusan' => 'required', 
            'id_shift' => 'required', 
            'dibuat_sejak' => 'required', 
            'berakhir' => 'required',
            'password' => 'required|min:5',
            

        ],
        [

            'nim.required' => 'nim tidak boleh kosong',
            'nim.unique' => 'nim sudah dipakai',

            'nm_mahasiswa.required' => 'nama tidak boleh kosong',

            'email.required' => ' email tidak boleh kosong', 
            'email.email' => 'harus sesuai dengan format email @',
            'email.unique' => 'email sudah dipakai',
            
            'alamat.required' => 'alamat tidak boleh kosong',
            'id_jurusan.required' => 'jurusan tidak boleh kosong',
            'id_shift.required' => 'shift tidak boleh kosong', 
            'dibuat_sejak.required' => ' Tanggal dibuat tidak boleh kosong',
            'berakhir.required' => 'Tanggal berakhir tidak boleh kosong',

            'password.required' => 'password tidak boleh kosong',
            'password.min' => 'password terlalu pendek',
      

       


        ]);




        //insert ke tabel user
        $user = new User;
        $user->role= 'mahasiswa';
        $user->name = $request->nm_mahasiswa;
        $user->email =$request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        Mahasiswa::create($request->all());

        return redirect('/',)->with('sukses', 'Registrasi Berhasil');


    }
}
