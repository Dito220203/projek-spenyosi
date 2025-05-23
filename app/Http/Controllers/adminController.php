<?php

namespace App\Http\Controllers;

use App\Models\BangunPagi;
use App\Models\Belajar;
use App\Models\Beribadah;
use App\Models\Istirahat;
use App\Models\Makan;
use App\Models\Siswa;
use App\Models\Masyarakat;
use App\Models\Olahraga;
use App\Models\RekapAbsensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Auth;

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

        return view('admin.index');
    }


    public function getAbsensi(Request $request, $kelas)
    {
        if ($this->bulan) {
            $rekapAbsensi = RekapAbsensi::with(['siswa','bangunpagi','belajar','beribadah','istirahat','makan','masyarakat','olahraga'])->byKelas($kelas)->whereMonth('created_at',$this->bulan)->get();
        }else{
            $rekapAbsensi = RekapAbsensi::with(['siswa','bangunpagi','belajar','beribadah','istirahat','makan','masyarakat','olahraga'])->byKelas($kelas)->get();
        }

        return view('admin.rekapAbsen', compact('rekapAbsensi'));
    }


    // public function search(Request $request)
    // {
    //     $keyword = $request->get('q');
    //     $siswaList = Siswa::where('nama', 'like', "%$keyword%")
    //         ->orWhere('nis', 'like', "%$keyword%")
    //         ->get();

    //     $html = '';
    //     foreach ($siswaList as $index => $siswa) {
    //         $html .= '
    //         <tr>
    //             <td class="text-center">' . ($index + 1) . '</td>
    //             <td>' . $siswa->nis . '</td>
    //             <td>' . $siswa->nama . '</td>
    //             <td>' . $siswa->kelas . '</td>
    //             <td>' . $siswa->agama . '</td>
    //             <td class="text-center">
    //                 <button
    //                     class="btn btn-warning btn-sm edit-btn"
    //                     data-id="' . $siswa->id . '"
    //                     data-nis="' . $siswa->nis . '"
    //                     data-nama="' . $siswa->nama . '"
    //                     data-kelas="' . $siswa->kelas . '"
    //                     data-agama="' . $siswa->agama . '"
    //                     data-toggle="modal"
    //                     data-target="#editModal"
    //                 >
    //                     ✏️ Update
    //                 </button>
    //             </td>
    //         </tr>
    //     ';
    //     }

    //     return response()->json(['html' => $html]);
    // }

    // private function filterBulan($bulan)
    // {
    //     return [
    //         'bangunPagi' => BangunPagi::whereMonth('created_at', $bulan)->get(),
    //         'belajar' => Belajar::whereMonth('created_at', $bulan)->get(),
    //         'beribadah' => Beribadah::whereMonth('created_at', $bulan)->get(),
    //         'istirahat' => Istirahat::whereMonth('created_at', $bulan)->get(),
    //         'makan' => Makan::whereMonth('created_at', $bulan)->get(),
    //         'olahraga' => OlahRaga::whereMonth('created_at', $bulan)->get(),
    //         'masyarakat' => Masyarakat::whereMonth('created_at', $bulan)->get(),
    //     ];
    // }



    public function exportPdf(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIA')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'nama' => $siswa->nama,
                'bangun_pagi' => BangunPagi::where('id_siswa', $siswa->id)->whereDate('created_at', $tanggal)->exists(),
                'beribadah' => Beribadah::where('id_siswa', $siswa->id)->whereDate('created_at', $tanggal)->exists(),
                'olahraga' => Olahraga::where('id_siswa', $siswa->id)->whereDate('created_at', $tanggal)->exists(),
                'belajar' => Belajar::where('id_siswa', $siswa->id)->whereDate('created_at', $tanggal)->exists(),
                'makan' => Makan::where('id_siswa', $siswa->id)->whereDate('created_at', $tanggal)->exists(),
                'masyarakat' => Masyarakat::where('id_siswa', $siswa->id)->whereDate('created_at', $tanggal)->exists(),
                'istirahat' => Istirahat::where('id_siswa', $siswa->id)->whereDate('created_at', $tanggal)->exists(),
            ];
        });

        $pdf = Pdf::loadView('admin.VIIA-pdf', compact('siswaList', 'tanggal'));
        return $pdf->download("rekap-{$tanggal}.pdf");
    }
}
