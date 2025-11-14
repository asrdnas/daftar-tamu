<?php

namespace App\Imports;

use App\Models\Tamu;
use Maatwebsite\Excel\Concerns\ToModel;

class TamuImport implements ToModel
{
    public function model(array $row)
    {
        return new Tamu([
            'nama_tamu'   => $row[0],   // Kolom A - Nama Tamu
            'nomor_meja'  => null,      // Dibuat null agar bisa diedit manual
            'alamat'      => $row[1],   // Kolom B - Alamat
            'status'      => $row[2],   // Kolom C - Status
            'kehadiran'   => 'tidak',   // default
            'status_tamu' => 'stay',    // default
        ]);
    }
}
