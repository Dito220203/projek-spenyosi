<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswaList = Siswa::orderBy('kelas')->paginate(7); // Bisa pakai pagination
        return view('admin.Datasiswa', compact('siswaList'));



        // Jika ada input search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('nis', 'like', "%{$search}%")
                ->orWhere('kelas', 'like', "%{$search}%")
                ->orWhere('agama', 'like', "%{$search}%");
        }

        // Urutkan berdasarkan NIS
        $siswas = $query->orderBy('nis', 'asc')->get();

        return view('Datasiswa', compact('siswas'));
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        // Buka file Excel
        $spreadsheet = IOFactory::load($file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        $errors = [];

        // Asumsikan baris pertama adalah header, mulai dari baris kedua
        for ($i = 1; $i < count($rows); $i++) {
            $row = $rows[$i];
            $kelas = isset($row[2]) ? trim($row[2]) : ''; // Asumsikan kolom 'kelas' di kolom C (index 2)

            if (!preg_match('/^[A-Z]+$/', $kelas)) {
                $errors[] = "Baris " . ($i + 1) . " kolom 'kelas' tidak valid: hanya huruf besar tanpa spasi dan angka.";
            }

              // Validasi agama (misalnya kolom D - index 3)
        $agama = isset($row[3]) ? trim($row[3]) : '';
        if ($agama !== '' && !preg_match('/^[A-Z][a-zA-Z ]*$/', $agama)) {
            $errors[] = "Baris " . ($i + 1) . " kolom 'agama' tidak valid: huruf pertama harus huruf besar.";
        }

            // Tambahkan validasi lain di sini jika perlu...
        }

        // Jika ada error, kembalikan ke halaman dengan pesan
        if (!empty($errors)) {
            return back()->withErrors($errors)->withInput();
        }

        // Jika tidak ada error, lakukan proses import menggunakan Laravel Excel
        Excel::import(new \App\Imports\SiswaImport, $file->store('temp'));

        return redirect('/Datasiswa')->with('success', 'Data siswa berhasil di Import!');
    }


    // public function import(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:xls,xlsx'
    //     ]);

    //     Excel::import(new SiswaImport, $request->file('file')->store('temp'));


    //     return redirect('/Datasiswa')->with('success', 'Data siswa berhasil di Import!');
    // }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required',
            'kelas' => 'required',
            'agama' => 'required',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'agama' => $request->agama,
            'password' => Hash::make($request->nis), // Password otomatis sama dengan NIS
        ]);

        return redirect('/Datasiswa')->with('success', 'Siswa baru berhasil ditambahkan.');
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
    // Update data siswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'agama' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->only('nis', 'nama', 'kelas', 'agama'));

        return redirect('/Datasiswa')->with('success', 'Data siswa berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        $query = $request->q;

        $siswaList = Siswa::where('nama', 'like', "%$query%")
            ->orWhere('kelas', 'like', "%$query%")
            ->orWhere('nis', 'like', "%$query%")
            ->orWhere('agama', 'like', "%$query%")
            ->get();

        $html = '';
        foreach ($siswaList as $index => $siswa) {
            $html .= '<tr>';
            $html .= '<td class="text-center">' . ($index + 1) . '</td>';
            $html .= '<td>' . $siswa->nis . '</td>';
            $html .= '<td>' . $siswa->nama . '</td>';
            $html .= '<td>' . $siswa->kelas . '</td>';
            $html .= '<td>' . $siswa->agama . '</td>';
            $html .= '<td class="text-center">
                    <button class="btn btn-warning btn-sm edit-btn"
                        data-id="' . $siswa->id . '"
                        data-nis="' . $siswa->nis . '"
                        data-nama="' . $siswa->nama . '"
                        data-kelas="' . $siswa->kelas . '"
                        data-agama="' . $siswa->agama . '"
                        data-toggle="modal" data-target="#editModal">
                        ✏️ Update
                    </button>
                  </td>';
            $html .= '</tr>';
        }

        return response()->json(['html' => $html]);
    }



    // public function promote(Request $request)
    // {
    //     // Naikkan semua siswa dari kelas VII ke VIII
    //     Siswa::where('kelas', 'VII')->update(['kelas' => 'VIII']);

    //     return redirect()->back()->with('success', 'Semua siswa kelas VII telah dinaikkan ke kelas VIII.');
    // }

}
