<?php

namespace App\Http\Controllers;
use App\Models\KebiasaanAnak;
use App\Models\Beribadah;
use Illuminate\Http\Request;


class KebiasaananakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KebiasaanAnak::all(); // Ambil semua data dari model Absensi
        return view('siswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'waktu_bangun' => 'nullable|string',
            'beribadah' => 'nullable|string',
            'subuh' => 'nullable|string',
            'subuh_image' => 'nullable|string',
            'subuh_time' => 'nullable|string',
            'waktu_olahraga' => 'nullable|string',
            'jenis_olahraga' => 'nullable|string',
            'makan' => 'nullable|string',
            'keterangan_makan_sehat' => 'nullable|string'
        ]);

        $data = KebiasaanAnak::updateOrCreate(
            ['created_at' => now()->format('Y-m-d')], // Update data berdasarkan tanggal
            $validated
        );

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
