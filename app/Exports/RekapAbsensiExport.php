<?php



namespace App\Exports;

use App\Models\RekapAbsensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;

class RekapAbsensiExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    protected $kelas;
    protected $bulan;

    public function __construct($kelas, $bulan)
    {
        $this->kelas = $kelas;
        $this->bulan = $bulan;
    }

    public function collection()
    {
        $query = RekapAbsensi::with([
            'siswa',
            'bangunpagi',
            'belajar',
            'beribadah',
            'istirahat',
            'makan',
            'masyarakat',
            'olahraga'
        ])->byKelas($this->kelas);

        if ($this->bulan) {
            $query->whereMonth('created_at', $this->bulan);
        }

        return $query->get();
    }

    public function map($rekap): array
    {
        return [
            $rekap->siswa->nama ?? '-',
            $rekap->bangunpagi->waktu ?? '-',
            $rekap->siswa->agama ?? '-',
            $rekap->beribadah->subuh ?? '-',
            $rekap->beribadah->duhur ?? '-',
            $rekap->beribadah->asar ?? '-',
            $rekap->beribadah->magrib ?? '-',
            $rekap->beribadah->isyak ?? '-',
            $rekap->olahraga->image ?? '-',
            $rekap->olahraga->waktu ?? '-',
            $rekap->olahraga->ket_olahraga ?? '-',
            $rekap->belajar->image ?? '-',
            $rekap->belajar->ket_belajar ?? '-',
            $rekap->makan->image ?? '-',
            $rekap->makan->karbohidrat ?? '-',
            $rekap->makan->serat ?? '-',
            $rekap->makan->protein ?? '-',
            $rekap->masyarakat->image ?? '-',
            $rekap->masyarakat->keterangan ?? '-',
            $rekap->istirahat->waktu ?? '-',
        ];
    }

    public function headings(): array
    {
        return [
            // Headings akan ditaruh di baris ke-3 (karena baris 1 untuk judul, baris 2 kosong)
            'Nama Siswa',
            'Bangun Pagi',
            'Beribadah',
            'Subuh',
            'Duhur',
            'Ashar',
            'Magrib',
            'Isyak',
            'Olahraga',
            'Waktu Olahraga',
            'Ket Olahraga',
            'Belajar',
            'Ket Bel',
            'Makan',
            'Karbo',
            'Serat',
            'Protein',
            'Masyarakat',
            'Ket Mas',
            'Istirahat',
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $judul = "Rekap Absensi Kelas {$this->kelas}" . ($this->bulan ? " - Bulan " . $this->bulan : '');
                $sheet = $event->sheet->getDelegate();
                $sheet->insertNewRowBefore(1, 1); // Geser semuanya 2 baris ke bawah
                $sheet->setCellValue('A1', $judul);
                $sheet->mergeCells('A1:T1');
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
                $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
}
