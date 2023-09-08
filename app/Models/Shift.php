<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;


class Shift extends Model
{
    // use HasFactory;

    protected $table="shift";
    protected $fillable=['nm_shift', 'jam_masuk', 'jam_keluar'];
    
    public function mahasiswa(){

        return $this->hasMany(Mahasiswa::class);
    }
}
