<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\BangunPagi;
use App\Models\Beribadah;
use App\Models\Olahraga;
use App\Models\Belajar;
use App\Models\Makan;
use App\Models\Masyarakat;
use App\Models\Istirahat;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RekapExport;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');
        $kelasFilter = $request->kelas;

        $siswaQuery = Siswa::query();
        if ($kelasFilter) {
            $siswaQuery->where('kelas', $kelasFilter);
        }

        $siswas = $siswaQuery->get();
        $kelasList = Siswa::select('kelas')->distinct()->pluck('kelas');

        $rekap = [];

        foreach ($siswas as $siswa) {
            for ($hari = 1; $hari <= 31; $hari++) {
                $tanggal = Carbon::createFromDate($tahun, $bulan, $hari);
                if ($tanggal->month != $bulan) break; // skip tanggal tidak valid

                $rekap[] = [
                    'nama' => $siswa->nama,
                    'kelas' => $siswa->kelas,
                    'tanggal' => $tanggal->format('Y-m-d'),
                    'bangun_pagi' => BangunPagi::where('id_siswa', $siswa->id)->whereDate('created_at', $tanggal)->exists(),
                    'beribadah' => Beribadah::where('id_siswa', $siswa->id)->whereDate('created_at', $tanggal)->exists(),
                    'olahraga' => Olahraga::where('id_siswa', $siswa->id)->whereDate('created_at', $tanggal)->exists(),
                    'belajar' => Belajar::where('id_siswa', $siswa->id)->whereDate('created_at', $tanggal)->exists(),
                    'makan' => Makan::where('id_siswa', $siswa->id)->whereDate('created_at', $tanggal)->exists(),
                    'masyarakat' => Masyarakat::where('id_siswa', $siswa->id)->whereDate('created_at', $tanggal)->exists(),
                    'istirahat' => Istirahat::where('id_siswa', $siswa->id)->whereDate('created_at', $tanggal)->exists(),
                ];
            }
        }

        return view('rekap.index', compact('rekap', 'kelasList'));
    }

//     public function exportExcel(Request $request)
// {
//     return Excel::download(new RekapExport($request), 'rekap_siswa.xlsx');
// }

// public function exportPdf(Request $request)
// {
//     $rekap = $this->getRekapData($request); // ambil data sesuai filter
//     $pdf = PDF::loadView('rekap.pdf', compact('rekap'));
//     return $pdf->download('rekap_siswa.pdf');
// }
}
