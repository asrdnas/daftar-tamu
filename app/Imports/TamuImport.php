<?php

namespace App\Imports;

use App\Models\Tamu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TamuImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Tamu([
            'nama_tamu'   => $row['nama_tamu'],   // Kolom A - Nama Tamu
            'nomor_meja'  => $row['nomor_meja'],      // Dibuat null agar bisa diedit manual
            'alamat'      => $row['alamat'],   // Kolom B - Alamat
            'status'      => $row['status'],   // Kolom C - Status
            'kehadiran'   => $row['kehadiran'],   // default
            'status_tamu' => $row['status_tamu'],    // default
        ]);
    }
}
