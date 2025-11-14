<?php

namespace App\Exports;

use App\Models\Tamu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TamuExport implements FromCollection, WithHeadings
{
    /**
     * Ambil data tamu yang akan diekspor.
     */
    public function collection()
    {
        return Tamu::select(
            'nama_tamu',
            'alamat',
            'nomor_meja',
            'status',
            'kehadiran',
            'status_tamu',
        )->get();
    }

    /**
     * Tambahkan header kolom di Excel.
     */
    public function headings(): array
    {
        return [
             'nama_tamu',
            'alamat',
            'nomor_meja',
            'status',
            'kehadiran',
            'status_tamu',
        ];
    }
}
