<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tamu_Akad extends Model
{
    protected $fillable = [
        'nama_tamu_akad',
        'alamat',
        'kehadiran',
    ];
}
