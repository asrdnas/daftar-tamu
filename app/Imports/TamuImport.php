<?php

namespace App\Imports;

use App\Models\Tamu;
use Maatwebsite\Excel\Concerns\ToModel;

class TamuImport implements ToModel
{
    public function model(array $row)
    {
        return new Tamu([
        'nama_tamu'   => $row[0],          // Kolom A
        'alamat'      => $row[1],          // Kolom B
        'nomor_meja'  => null,             // Excel tidak punya, isi null
        'status'      => $row[2],          // Kolom C
        'kehadiran'   => 'tidak',          // kolom D tidak dipakai
        'status_tamu' => 'stay',
        ]);
    }
}
