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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.index');
    }


    public function VIIA(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIA')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIA', compact('siswaList'));
    }

    public function VIIB(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIB')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIB', compact('siswaList'));
    }

    public function VIIC(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIC')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIC', compact('siswaList'));
    }
    public function VIID(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIID')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIID', compact('siswaList'));
    }
    public function VIIE(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIE')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIE', compact('siswaList'));
    }
    public function VIIF(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIF')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIF', compact('siswaList'));
    }
    public function VIIG(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIG')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIG', compact('siswaList'));
    }
    public function VIIH(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIH')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIH', compact('siswaList'));
    }
    public function VIII(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIII')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIII', compact('siswaList'));
    }

    // kelas vIII
    public function VIIIA(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIIA')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIIA', compact('siswaList'));
    }

    public function VIIIB(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIIB')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIIB', compact('siswaList'));
    }

    public function VIIIC(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIIC')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIIC', compact('siswaList'));
    }
    public function VIIID(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIID')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIID', compact('siswaList'));
    }
    public function VIIIE(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIIE')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIIE', compact('siswaList'));
    }
    public function VIIIF(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIIF')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIIF', compact('siswaList'));
    }
    public function VIIIG(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIIG')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIIG', compact('siswaList'));
    }
    public function VIIIH(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIIH')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIIH', compact('siswaList'));
    }
    public function VIIII(Request $request)
    {
        $tanggal = Carbon::createFromDate(
            $request->tahun ?? now()->year,
            $request->bulan ?? now()->month,
            $request->tanggal ?? now()->day
        )->toDateString();

        $siswaList = Siswa::where('kelas', 'VIIII')->get()->map(function ($siswa) use ($tanggal) {
            return [
                'id' => $siswa->id,
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

        return view('admin.VIIII', compact('siswaList'));
    }


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
