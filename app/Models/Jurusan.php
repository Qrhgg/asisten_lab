<?php

namespace App\Models;
use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    // use HasFactory;

protected $table="jurusan";
protected $fillable=['kode_jurusan', 'nama_jurusan'];

    public function mahasiswa(){

        return $this->hasMany(Mahasiswa::class);

    }

}
