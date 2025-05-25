<?php

namespace App\Imports;
use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SiswaImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        return new Siswa([
            'nis'      => $row[0],
            'nama'     => $row[1],
            'kelas'    => $row[2],
            'agama'    => $row[3],
            'password' => bcrypt($row[0]) // default password = NIS
        ]);
    }
    public function startRow(): int
    {
        return 2; // Mulai dari baris ke-2 (skip header)
    }
}
