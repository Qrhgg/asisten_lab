<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    use HasFactory;

    protected $table= "ruangan";
    
    protected $fillable = ['nama_ruangan', 'jumlah_komputer'];



public function laporan(){

    return $this->hasMany(LaporanMahasiswa::class);

}

}