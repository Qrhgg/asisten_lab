<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LaporanLabController;
use App\Http\Controllers\LabKomputerController;
use App\Http\Controllers\LaporandanAbsenController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LaporanMahasiswaController;
use App\Http\Controllers\LaporanHarianController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LaporanAlatController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[LandingController::class, 'index']);
Route::get('/piketpagi', [LandingController::class, 'piketpagi']);
Route::get('/piketsiang', [LandingController::class, 'piketsiang']);
Route::get('/piketmalam', [LandingController::class, 'piketmalam']);
Route::get('/maintenance', [LandingController::class, 'maintenance']);
Route::get('/register', [LandingController::class, 'register']);
Route::post('prosesregister', [LandingController::class, 'prosesregister']);

Route::get('/template', function () {

    return view ('template.layout');

});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'auth', 'checkRole:admin'], function(){

    // Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);
    Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit']);
    Route::post('/mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
    Route::get('/mahasiswa/hapus/{id}', [MahasiswaController::class, 'destroy']);
    Route::get('/mahasiswa/profile/{id}', [MahasiswaController::class, 'profile']);
    Route::post('/mahasiswa/tambah-absen/{id}', [AbsenController::class, 'tambah_absen']);
    Route::get('/mahasiswa/absenall/{id}', [MahasiswaController::class, 'absenall']);

    Route::post('/aktifasi/update/{id}', [MahasiswaController::class, 'aktifasi']);
    Route::get('/mahasiswa/hapus-akun/{id}', [MahasiswaController::class, 'hapusakun']);


    //profile
    Route::get('/profile/{id}', [ProfileController::class, 'profile']);

    //jurusan
    Route::get('/jurusan', [JurusanController::class, 'index']);
    Route::post('/jurusan/store', [JurusanController::class, 'store']);
    Route::post('/jurusan/update/{id}', [JurusanController::class, 'update']);
    Route::get('/jurusan/hapus/{id}', [JurusanController::class, 'destroy']);

    //Shift
    Route::get('/shift', [ShiftController::class, 'index']);
    Route::post('/shift/store', [ShiftController::class, 'store']);
    Route::post('/shift/update/{id}', [ShiftController::class, 'update']);
    Route::get('/shift/hapus/{id}', [ShiftController::class, 'destroy']);

    //Lab Komputer
    Route::get('/lab-komputer', [LabKomputerController::class, 'index']);
    Route::post('/lab-komputer/store', [LabKomputerController::class, 'store']);
    Route::post('/lab-komputer/update/{id}', [LabKomputerController::class, 'update']);
    Route::get('/lab-komputer/hapus/{id}', [LabKomputerController::class, 'destroy']);

    //Laporan Lab Komputer
    Route::get('/laporan-lab',[LaporanLabController::class, 'index']);
    Route::post('/laporan-lab/store', [LaporanLabController::class, 'store']);
    Route::post('/laporan-lab/update/{id}', [LaporanLabController::class, 'update']);
    Route::get('/laporan-lab/hapus/{id}', [LaporanLabController::class, 'destroy']);

    //Laporan dan absen mahasiswa
    Route::get('/laporan-absen', [LaporandanAbsenController::class, 'index']);


});
Route::group(['middleware' => 'auth', 'checkRole:mahasiswa'], function(){

    Route::get('/profilesaya', [MahasiswaController::class, 'profilesaya']);
    // Route::get('/laporanharian', [LaporanHarianController::class, 'laporanharian']);
    // Route::post('/buatlaporan', [LaporanHarianController::class, 'store']);
    Route::get('/absenmasuk', [AbsenController::class, 'index']);
    Route::post('/simpanmasuk', [AbsenController::class, 'store']);
    Route::get('/absenkeluar', [AbsenController::class, 'absenkeluar']);
    Route::post('/simpankeluar', [AbsenController::class, 'simpankeluar']);

   //ROUTE BUAT LAPORAN MAHASISWA

   Route::post('/buatlaporan', [LaporanMahasiswaController::class, 'store']);
   Route::get('/laporanmahasiswa', [LaporanMahasiswaController::class, 'index']);
   Route::get('/laporan/hapus/{id}', [LaporanMahasiswaController::class, 'hapus']);

   //laporan alat asisten lab 

   Route::get('/laporanalat', [LaporanAlatController::class, 'index']);
   Route::post('/laporanalat-store', [LaporanALatController::class, 'store']);
   Route::post('/laporanalat-update/{id}', [LaporanAlatController::class, 'update']);
   Route::get('/laporanalat-hapus/{id}', [LaporanAlatController::class, 'hapus']);

});

Route::group(['middleware' => 'auth', 'checkRole:admin,mahasiswa'], function(){

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/homeadmin', [DashboardController::class, 'homeadmin']);
    Route::get('/piketpagiads', [LandingController::class, 'piketpagiads']);
    Route::get('/piketsiangads', [LandingController::class, 'piketsiangads']);
    Route::get('/piketmalamads', [LandingController::class, 'piketmalamads']);
    Route::get('/maintenanceads', [LandingController::class, 'maintenanceads']);
    Route::get('/absenperbulan', [MahasiswaController::class, 'absenFilter'])->name('absen.filter');
    Route::get('/absenperbulanadmin/{id}', [MahasiswaController::class, 'absenFilteradmin'])->name('absen.filteradmin');

});