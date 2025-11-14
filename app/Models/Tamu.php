<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $fillable = [
        'nama_tamu',
        'alamat',
        'status',
        'kehadiran',
        'status_tamu',
        'nomor_meja',

    ];
}
