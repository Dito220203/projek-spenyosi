<?php

namespace App\Http\Controllers;

use App\Models\BangunPagi;
use App\Models\Belajar;
use App\Models\Beribadah;
use App\Models\BeribadahKristen;
use App\Models\Istirahat;
use App\Models\Makan;
use App\Models\Masyarakat;
use App\Models\Olahraga;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SiswaBulananExport;
use App\Models\RekapAbsensi;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $siswa;
    protected $waktuSekarang;
    protected $rekap;
    public function __construct()
    {
        $this->siswa = Auth::guard('siswa')->user();
        $this->waktuSekarang = Carbon::now();
        $this->rekap = RekapAbsensi::where('id_siswa', $this->siswa->id)
            ->whereDate('created_at', $this->waktuSekarang->toDateString())
            ->first();
    }


    public function index()
    {
        $rekapHari = RekapAbsensi::whereHas('siswa', function ($q) {
            $q->where('id_siswa', $this->siswa->id);
        })->whereDate('created_at', $this->waktuSekarang)->first();

        if ($rekapHari && $rekapHari->id_siswa) {
            return view('siswa.index', ['siswa' => $this->siswa, 'rekaps' => $rekapHari]);
        } else {
            return view('siswa.index', ['siswa' => $this->siswa, 'rekaps' => '']);
        }
    }

    public function bgnPagi(Request $request)
    {

        if ($this->rekap && $this->rekap->id_bangun_pagi) {
            $bgnPagi = BangunPagi::where('id', $this->rekap->id_bangun_pagi)->update([
                'waktu' => $request->waktu
            ]);
        } else {
            $bgnPagi =  BangunPagi::create([
                'waktu' => $request->waktu
            ]);
            $this->simpanKebiasaan('id_bangun_pagi', $bgnPagi->id);
        }

        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan!');
        // return response()->json(["success" => true]);
    }

    public function Beribadah(Request $request)
    {
        $data = [
            'subuh' => $request->subuh,
            'duhur' => $request->duhur,
            'asar' => $request->asar,
            'magrib' => $request->magrib,
            'isyak' => $request->isyak
        ];


        if ($this->rekap && $this->rekap->id_beribadah) {
            // Update hanya field yang tidak null

            if ($this->siswa->agama == 'Islam') {
                $beribadah = Beribadah::where('id', $this->rekap->id_beribadah)->update($data);
            } else {
                $beribadah = Beribadah::where('id', $this->rekap->id_beribadah)->update([
                    'subuh' => $request->subuh,
                    'asar' => $request->asar,
                    'isyak' => $request->isyak
                ]);
            }
        } else {
            $data['id_siswa'] = $this->siswa->id;
            $beribadah =  Beribadah::create($data);
            $this->simpanKebiasaan('id_beribadah', $beribadah->id);
        }



        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan!');
    }


    public function Olahraga(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'waktu' => 'required|string|max:255',
            'ket_olahraga' => 'required|string|max:255'
        ]);

        $path = $request->file('image')->store('olahraga', 'public');

        if ($this->rekap && $this->rekap->id_olahraga) {
            $olahraga = Olahraga::where('id', $this->rekap->id_olahraga)->update([
                'image' => $path,
                'waktu' => $request->waktu,
                'ket_olahraga' => $request->ket_olahraga
            ]);
        } else {
            $olahraga =   Olahraga::create([
                'image' => $path,
                'waktu' => $request->waktu,
                'ket_olahraga' => $request->ket_olahraga
            ]);
            $this->simpanKebiasaan('id_olahraga', $olahraga->id);
        }


        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan!');
    }


    public function Belajar(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ket_belajar' => 'required|string|max:255'
        ]);
        $path = $request->file('image')->store('belajar', 'public');



        if ($this->rekap && $this->rekap->id_belajar) {
            $belajar = Belajar::where('id', $this->rekap->id_belajar)->update([
                'image' => $path,
                'ket_belajar' => $request->ket_belajar
            ]);
        } else {
            $belajar =  Belajar::create([
                'image' => $path,
                'ket_belajar' => $request->ket_belajar
            ]);
            $this->simpanKebiasaan('id_belajar', $belajar->id);
        }

        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan!');
    }

    public function Makan(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'karbohidrat' => 'required|string|max:255',
            'serat' => 'required|string|max:255',
            'protein' => 'required|string|max:255',
        ]);

        $path = $request->file('image')->store('makan', 'public');;

        if ($this->rekap && $this->rekap->id_makan) {
            $makan = Makan::where('id', $this->rekap->id_belajar)->update([
                'image' => $path,
                'karbohidrat' => $request->karbohidrat,
                'serat' => $request->serat,
                'protein' => $request->protein
            ]);
        } else {
            $makan =  Makan::create([
                'image' => $path,
                'karbohidrat' => $request->karbohidrat,
                'serat' => $request->serat,
                'protein' => $request->protein
            ]);
            $this->simpanKebiasaan('id_makan', $makan->id);
        }

        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan!');
    }

    public function Masyarakat(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('image')->store('bermasyarakat', 'public');



        if ($this->rekap && $this->rekap->id_masyarakat) {
            $masyarakat = Masyarakat::where('id', $this->rekap->id_masyarakat)->update([
                'keterangan' => $request->keterangan,
                'foto' => $path,
            ]);
        } else {
            $masyarakat = Masyarakat::create([
                'keterangan' => $request->keterangan,
                'image' => $path,
            ]);
            $this->simpanKebiasaan('id_masyarakat', $masyarakat->id);
        }

        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan!');
    }

    public function istirahat(Request $request)
    {
        if ($this->rekap && $this->rekap->id_istirahat) {
            $istirahat = Istirahat::where('id', $this->rekap->id_istirahat)->update([
                'waktu' => $request->waktu
            ]);
        } else {
            $istirahat  = istirahat::create([
                'waktu' => $request->waktu
            ]);
            $this->simpanKebiasaan('id_istirahat', $istirahat->id);
        }

        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan!');
    }


    public function cekStatusKebiasaan()
    {
        $rekap = RekapAbsensi::where('id_siswa', $this->siswa->id)
            ->whereDate('created_at', $this->waktuSekarang)
            ->with([
                'bangunpagi',
                'beribadah',
                'olahraga',
                'belajar',
                'makan',
                'masyarakat',
                'istirahat'
            ])
            ->first();

        $status = [
            'Bangun Pagi' => (bool) optional($rekap->bangunpagi)->id,
            'Beribadah' => (bool) optional($rekap->beribadah)->id,
            'Berolahraga' => (bool) optional($rekap->olahraga)->id,
            'Gemar Belajar' => (bool) optional($rekap->belajar)->id,
            'Makan Sehat & Bergizi' => (bool) optional($rekap->makan)->id,
            'Bermasyarakat' => (bool) optional($rekap->masyarakat)->id,
            'Istirahat Cukup' => (bool) optional($rekap->istirahat)->id,
        ];

        return response()->json($status);
    }

    // rekap
    //     public function exportExcel(Request $request)
    // {
    //        $kelas = $request->kelas;
    //     $bulan = $request->bulan;
    //     $tahun = $request->tahun;

    //     return Excel::download(
    //         new SiswaBulananExport($kelas, $bulan, $tahun),
    //         'rekap_kelas_'.$kelas.'_bulan_'.$bulan.'.xlsx'
    //     );
    // }


    private function simpanKebiasaan($fieldName, $kebiasaanId)
    {
        $idSiswa = $this->siswa->id;
        $tanggalHariIni = Carbon::today();

        // 1. Cari rekap hari ini berdasarkan siswa dan tanggal
        $rekap = RekapAbsensi::where('id_siswa', $idSiswa)
            ->whereDate('created_at', $tanggalHariIni)
            ->first();

        if ($rekap) {
            // 2. Kalau ada, update kolom kebiasaan sesuai parameter
            $rekap->update([
                $fieldName => $kebiasaanId
            ]);
        } else {
            // 3. Kalau belum ada, create rekap baru dengan hanya kolom kebiasaan itu
            RekapAbsensi::create([
                'id_siswa' => $idSiswa,
                $fieldName => $kebiasaanId
            ]);
        }
    }
}
