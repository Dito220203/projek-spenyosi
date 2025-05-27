<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\RekapAbsensi;
use Illuminate\Http\Request;
use App\Exports\RekapAbsensiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\BangunPagi; // <--- TAMBAHKAN INI
use App\Models\Belajar;    // <--- TAMBAHKAN INI (dan model kebiasaan lainnya)
use App\Models\Beribadah;
use App\Models\Makan;
use App\Models\Olahraga;
use App\Models\Istirahat;
use App\Models\Masyarakat;
use Carbon\Carbon;

class adminController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    protected $bulan;
    public function __construct(Request $request)
    {
        $this->bulan = $request->bulan;
    }


    public function index()
    {
        $totalSiswa = Siswa::count();

        // --- Perhitungan untuk chart kedua (status per kebiasaan) ---
        $kebiasaanLabels = [
            'Bangun Pagi',
            'Belajar',
            'Beribadah',
            'Makan',
            'Olahraga',
            'Istirahat',
            'Masyarakat'
        ];
        $kebiasaanModels = [ // Mapping nama kebiasaan ke Modelnya
            'Bangun Pagi' => BangunPagi::class,
            'Belajar' => Belajar::class,
            'Beribadah' => Beribadah::class,
            'Makan' => Makan::class,
            'Olahraga' => Olahraga::class,
            'Istirahat' => Istirahat::class,
            'Masyarakat' => Masyarakat::class,
        ];

        $chartValuesKebiasaan = [];
        foreach ($kebiasaanLabels as $label) {
            $modelClass = $kebiasaanModels[$label];
            $count = $modelClass::whereDate('created_at', Carbon::today())
                ->distinct('id')
                ->count('id');
            $chartValuesKebiasaan[] = $count;
        }

        // --- Perhitungan untuk chart pertama (umum) ---
        // Untuk performansi, Anda bisa mengambil semua siswa_id unik dari SEMUA kebiasaan hari ini
        // dan kemudian menghitung total siswa yang sudah mengisi dari sana.

        // Contoh: Jika definisi "sudah mengisi" adalah minimal satu kebiasaan dari 7 kebiasaan hari ini
        $allSiswaIdsFilledToday = collect(); // Menggunakan Laravel Collection

        foreach ($kebiasaanModels as $modelClass) {
            $ids = $modelClass::whereDate('created_at', Carbon::today())->pluck('id');
            $allSiswaIdsFilledToday = $allSiswaIdsFilledToday->merge($ids);
        }

        $siswaSudahMengisiKebiasaanUmum = $allSiswaIdsFilledToday->unique()->count();
        $siswaBelumMengisiKebiasaanUmum = $totalSiswa - $siswaSudahMengisiKebiasaanUmum;


        $chartDataUmum = [
            'labels' => ['Siswa Sudah Mengisi', 'Siswa Belum Mengisi'],
            'data' => [$siswaSudahMengisiKebiasaanUmum, $siswaBelumMengisiKebiasaanUmum],
            'backgroundColor' => ['#28a745', '#dc3545'],
        ];

        $chartDataKebiasaan = [
            'labels' => $kebiasaanLabels,
            'data' => $chartValuesKebiasaan,
            'backgroundColor' => [
                '#FF6384',
                '#36A2EB',
                '#FFCE56',
                '#4BC0C0',
                '#9966FF',
                '#FF9F40',
                '#808080'
            ],
            'borderColor' => [
                '#FF6384',
                '#36A2EB',
                '#FFCE56',
                '#4BC0C0',
                '#9966FF',
                '#FF9F40',
                '#808080'
            ],
            'borderWidth' => 1
        ];

        return view('admin.index', compact(
            'totalSiswa',
            'siswaSudahMengisiKebiasaanUmum',
            'siswaBelumMengisiKebiasaanUmum',
            'chartDataUmum',
            'chartDataKebiasaan'
        ));
    }


    public function getAbsensi(Request $request, $kelas)
    {
        if ($this->bulan) {
            $rekapAbsensi = RekapAbsensi::with(['siswa', 'bangunpagi', 'belajar', 'beribadah', 'istirahat', 'makan', 'masyarakat', 'olahraga'])->byKelas($kelas)->whereMonth('created_at', $this->bulan)->get();
        } else {
            $rekapAbsensi = RekapAbsensi::with(['siswa', 'bangunpagi', 'belajar', 'beribadah', 'istirahat', 'makan', 'masyarakat', 'olahraga'])->byKelas($kelas)->get();
        }

        return view('admin.rekapAbsen', compact('rekapAbsensi', 'kelas'));
    }


    public function export(Request $request, $kelas)
    {
        $bulan = $request->input('bulan'); // misalnya dikirim dari form/select
        return Excel::download(new RekapAbsensiExport($kelas, $bulan), "rekap-absensi-{$kelas}-bulan{$bulan}.xlsx");
    }

    public function delete(string $id){
         Siswa::where('id', $id)->delete();
        return redirect('/Datasiswa')->with('success', 'Data berhasil dihapus');
    }
}
