<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $table ="absen";
    protected $fillable =['id', 'user_id', 'mahasiswa_id', 'tgl', 'jam_masuk', 'jam_keluar', 'keterangan'];
    protected $dates = ['tgl'];


    public function user(){
        return $this->belongsTo(User::class);

    }

    public function siswa(){
        return $this->belongsTo(Mahasiswa::class);
    }
}
