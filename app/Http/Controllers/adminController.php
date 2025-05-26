<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\RekapAbsensi;
use Illuminate\Http\Request;
use App\Exports\RekapAbsensiExport;
use Maatwebsite\Excel\Facades\Excel;

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

       $kelasList = Siswa::select('kelas')->distinct()->get();
    $dataPerKelas = [];

    foreach ($kelasList as $kelasItem) {
        $siswaKelas = Siswa::where('kelas', $kelasItem->kelas)->get();
        $jumlahSiswa = $siswaKelas->count();

        $rekapTerisi = RekapAbsensi::whereHas('siswa', function ($query) use ($kelasItem) {
            $query->where('kelas', $kelasItem->kelas);
        })->where(function ($query) {
            $query->whereNotNull('id_bangun_pagi')
                  ->orWhereNotNull('id_belajar')
                  ->orWhereNotNull('id_beribadah')
                  ->orWhereNotNull('id_istirahat')
                  ->orWhereNotNull('id_makan')
                  ->orWhereNotNull('id_masyarakat')
                  ->orWhereNotNull('id_olahraga');
        })->with('siswa')->get();

        $jumlahTerisi = $rekapTerisi->count();
        $siswaYangIsi = $rekapTerisi->pluck('siswa.nama')->toArray(); // ambil nama siswa

        $persen = $jumlahSiswa > 0 ? round(($jumlahTerisi / $jumlahSiswa) * 100, 1) : 0;

        $dataPerKelas[] = [
            'kelas' => $kelasItem->kelas,
            'jumlah_siswa' => $jumlahSiswa,
            'sudah_isi' => $jumlahTerisi,
            'persen' => $persen,
            'siswa' => $siswaYangIsi,
        ];
    }

    return view('admin.index', compact('dataPerKelas'));

    }


    public function getAbsensi(Request $request, $kelas)
    {
        if ($this->bulan) {
            $rekapAbsensi = RekapAbsensi::with(['siswa','bangunpagi','belajar','beribadah','istirahat','makan','masyarakat','olahraga'])->byKelas($kelas)->whereMonth('created_at',$this->bulan)->get();
        }else{
            $rekapAbsensi = RekapAbsensi::with(['siswa','bangunpagi','belajar','beribadah','istirahat','makan','masyarakat','olahraga'])->byKelas($kelas)->get();
        }

        return view('admin.rekapAbsen', compact('rekapAbsensi','kelas'));
    }


  public function export(Request $request, $kelas)
{
  $bulan = $request->input('bulan'); // misalnya dikirim dari form/select
    return Excel::download(new RekapAbsensiExport($kelas, $bulan), "rekap-absensi-{$kelas}-bulan{$bulan}.xlsx");
}

}





