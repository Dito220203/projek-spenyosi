<?php

namespace App\Http\Controllers;

use App\Models\BangunPagi;
use App\Models\Belajar;
use App\Models\Beribadah;
use App\Models\Istirahat;
use App\Models\Makan;
use App\Models\Masyarakat;
use App\Models\Olahraga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $siswa;
    public function __construct()
    {
        $this->siswa = Auth::guard('siswa')->user();
    }


    public function index()
    {
        return view('siswa.index', ['siswa' => $this->siswa]);
    }



    public function bgnPagi(Request $request)
    {
        $waktuSekarang = Carbon::now();

        $bgnPagi = BangunPagi::where('id_siswa', $this->siswa->id)
            ->whereDate('created_at', $waktuSekarang->toDateString())
            ->first();

        if ($bgnPagi) {
            $bgnPagi->update([
                'waktu' => $request->waktu
            ]);
        } else {
            BangunPagi::create([
                'id_siswa' => $this->siswa->id,
                'waktu' => $request->waktu
            ]);
        }

        return response()->json(["success" => true]);
    }

    public function Beribadah(Request $request)
    {
        $waktuSekarang = Carbon::now();

        $data = [
            'subuh' => $request->subuh,
            'duhur' => $request->duhur,
            'asar' => $request->asar,
            'magrib' => $request->magrib,
            'isyak' => $request->isyak
        ];


        $existing = Beribadah::where('id_siswa', $this->siswa->id)
            ->whereDate('created_at', $waktuSekarang->toDateString())
            ->first();

        if ($existing) {
            // Update hanya field yang tidak null
            foreach ($data as $key => $value) {
                if (!empty($value)) {
                    $existing->$key = $value;
                }
            }
            $existing->save();
        } else {
            $data['id_siswa'] = $this->siswa->id;
            Beribadah::create($data);
        }

        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan!');
    }

    public function Olahraga(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'waktu' => 'required|string|max:255'
        ]);

        $idSiswa = $this->siswa->id;
        $tanggalHariIni = Carbon::now()->toDateString();
        $path = $request->file('image')->store('olahraga', 'public');


        $olahraga = Olahraga::where('id_siswa', $idSiswa)
            ->whereDate('created_at', $tanggalHariIni)
            ->first();

        if ($olahraga) {
            $olahraga->update([
                'image' => $path,
                'waktu' => $request->waktu
            ]);
        } else {
            Olahraga::create([
                'id_siswa' => $idSiswa,
                'image' => $path,
                'waktu' => $request->waktu
            ]);
        }
        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan!');
    }


    public function Belajar(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $idSiswa = $this->siswa->id;
        $tanggalHariIni = Carbon::now()->toDateString();
        $path = $request->file('image')->store('belajar', 'public');


        $belajar = Belajar::where('id_siswa', $idSiswa)
            ->whereDate('created_at', $tanggalHariIni)
            ->first();

        if ($belajar) {
            $belajar->update([
                'image' => $path,
            ]);
        } else {
            Belajar::create([
                'id_siswa' => $idSiswa,
                'image' => $path,
            ]);
        }
        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan!');
    }

    public function Makan(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'required|string|max:255',
        ]);

        $idSiswa = $this->siswa->id;
        $tanggalHariIni = Carbon::now()->toDateString();
        $path = $request->file('image')->store('makan', 'public');


        $makan = Makan::where('id_siswa', $idSiswa)
            ->whereDate('created_at', $tanggalHariIni)
            ->first();

        if ($makan) {
            $makan->update([
                'image' => $path,
                'keterangan' => $request->keterangan,
            ]);
        } else {
            Makan::create([
                'id_siswa' => $idSiswa,
                'image' => $path,
                'keterangan' => $request->keterangan,
            ]);
        }
        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan!');
    }

    public function Masyarakat(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $idSiswa = $this->siswa->id;
        $tanggalHariIni = Carbon::now()->toDateString();
        $path = $request->file('image')->store('bermasyarakat', 'public');


        $masyarakat = Masyarakat::where('id_siswa', $idSiswa)
            ->whereDate('created_at', $tanggalHariIni)
            ->first();

        if ($masyarakat) {
            $masyarakat->update([
                'keterangan' => $request->keterangan,
                'foto' => $path,
            ]);
        } else {
            Masyarakat::create([
                'id_siswa' => $idSiswa,
                'keterangan' => $request->keterangan,
                'image' => $path,
            ]);
        }
        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan!');
    }

    public function Istirahat(Request $request)
    {
        $waktuSekarang = Carbon::now();

        $istirahat = Istirahat::where('id_siswa', $this->siswa->id)
            ->whereDate('created_at', $waktuSekarang->toDateString())
            ->first();

        if ($istirahat) {
            $istirahat->update([
                'waktu' => $request->waktu
            ]);
        } else {
            Istirahat::create([
                'id_siswa' => $this->siswa->id,
                'waktu' => $request->waktu
            ]);
        }
        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan!');
    }


    public function cekStatusKebiasaan()
    {
        $tanggal = Carbon::now()->toDateString();
        $id = $this->siswa->id;

        $status = [
            'Bangun Pagi' => BangunPagi::where('id_siswa', $id)->whereDate('created_at', $tanggal)->exists(),
            'Beribadah' => Beribadah::where('id_siswa', $id)->whereDate('created_at', $tanggal)->exists(),
            'Berolahraga' => Olahraga::where('id_siswa', $id)->whereDate('created_at', $tanggal)->exists(),
            'Gemar Belajar' => Belajar::where('id_siswa', $id)->whereDate('created_at', $tanggal)->exists(),
            'Makan Sehat & Bergizi' => Makan::where('id_siswa', $id)->whereDate('created_at', $tanggal)->exists(),
            'Bermasyarakat' => Masyarakat::where('id_siswa', $id)->whereDate('created_at', $tanggal)->exists(),
            'Istirahat Cukup' => Istirahat::where('id_siswa', $id)->whereDate('created_at', $tanggal)->exists(),
        ];

        return response()->json($status);
    }
}
