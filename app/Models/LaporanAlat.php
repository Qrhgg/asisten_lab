<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanAlat extends Model
{
    // use HasFactory;

    protected $table="laporan_alat_asisten";
    protected $fillable = ['id', 'tanggal', 'peralatan', 'ruangan', 'nama_dosen', 'jam_mulai', 'jam_habis', 'mahasiswa_pemberi', 'status', 'jam_diambil'];
    protected $dates = ['jam_mulai', 'jam_habis', 'jam_diambil'];


    public function mahasiswaPemberi()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_pemberi');
    }

    public function mahasiswaPengambil()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_pengambil');
    }



}

