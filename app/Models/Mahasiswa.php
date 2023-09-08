<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\MahasiswaController;
use App\Models\Jurusan;
use App\Models\Shift;


class Mahasiswa extends Model
{
    protected $table ="mahasiswa";

    protected $fillable=['nim', 'nm_mahasiswa', 'alamat', 'no_hp', 'id_jurusan', 'id_shift', 'dibuat_sejak', 'berakhir', 'avatar', 'user_id'];
    protected $dates = ['dibuat_sejak', 'berakhir'];

    public function getAvatar(){

        if(!$this->avatar){
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->avatar);
    }

    public function jurusan(){

        return $this->belongsTo(Jurusan::class, 'id_jurusan');

    }

    public function shift(){

        return $this->belongsTo(Shift::class, 'id_shift');
    }
    // use HasFactory;


    public function laporanmahasiswa(){

        return $this->hasMany(LaporanMahasiswa::class);
    }

    public function absen(){
        return $this->hasMany(Absen::class);
    }

    // public function laporan_alat(){

    //     return $this->hasMany(LaporanAlat::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
