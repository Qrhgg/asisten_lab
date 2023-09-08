<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lab_komputer extends Model
{

    protected $table= "lab_komputer";
    protected $fillable =['Nm_lab', 'Jmlh_komputer'];    
    // use HasFactory;
}
