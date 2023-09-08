<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanLab extends Model
{
    protected $table="laporan_lab";
    protected $fillable =['id_labkomputer', 'tanggal', 'catatan', 'keterangan'];

    // use HasFactory;
}
