<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswaList = Siswa::orderBy('nis')->paginate(7); // Bisa pakai pagination
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

    Excel::import(new SiswaImport, $request->file('file')->store('temp'));


    return redirect('/Datasiswa')->with('success', 'Data siswa berhasil di Import!');
}

    

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
            'nis' => 'required',
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
}
