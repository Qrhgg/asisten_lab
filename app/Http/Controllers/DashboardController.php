<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\Jurusan;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index(){

        

        return view('dashboard.admin');

    }

    public function homeadmin(){

        $siswa_malam = Mahasiswa::all()->where('id_shift', 3)->count();
        $siswa_siang= Mahasiswa::all()->where('id_shift', 2)->count();
        $siswa_pagi = Mahasiswa::all()->where('id_shift', 1)->count();
        $siswa_maintenance = Mahasiswa::all()->count();

        $shift_pagi = Shift::all()->where('id', 1)->first();
        $shift_siang = Shift::all()->where('id', 2)->first();
        $shift_malam = Shift::all()->where('id', 3)->first();
        
        

        return view('dashboard.home', ['siswa_malam'=> $siswa_malam, 'siswa_siang' => $siswa_siang, 'siswa_pagi' => $siswa_pagi, 'siswa_maintenance' => $siswa_maintenance, 
        'shift_pagi' => $shift_pagi, 'shift_malam' => $shift_malam, 'shift_siang' => $shift_siang]);

        
    }

}
