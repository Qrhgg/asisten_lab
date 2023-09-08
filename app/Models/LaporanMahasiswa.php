<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanMahasiswa extends Model
{
    use HasFactory;

    protected $table ='laporan_mahasiswa';
    protected $fillable=['tanggal', 'id_mahasiswa', 'id_user', 'id_shift', 'kegiatan', 'ruangan_id', 'status', 'keterangan'];
    protected $dates = ['tanggal'];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');

    }
   
    public function siswa(){
        return $this->belongsTo(Mahasiswa::class);
    }

    public function ruangan(){

        return $this->belongsTo(ruangan::class, 'ruangan_id');

    }


}
