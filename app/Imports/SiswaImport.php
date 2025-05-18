<?php

namespace App\Imports;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nis'   => $row[0],
            'nama'  => $row[1],
            'kelas' => $row[2],
            'agama' => $row[3],
            'password' => Hash::make($row[0]), // password = NIS
        ]);
    }
}
