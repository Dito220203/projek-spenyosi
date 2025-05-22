<?php

namespace App\Exports;

use App\Models\RekapAbsensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// ExportExcel.php
class ExportExcel implements FromView
{
    protected $rekapAbsensi;

    public function __construct($rekapAbsensi)
    {
        $this->rekapAbsensi = $rekapAbsensi;
    }

    public function view(): View
    {
        return view('admin.excel-template', [
            'rekapAbsensi' => $this->rekapAbsensi
        ]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RekapAbsensi::all();
    }
}
