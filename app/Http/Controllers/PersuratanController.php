<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuratMasuk;
// use App\Http\Controllers\storage;
use Illuminate\Support\Facades\Storage;


class PersuratanController extends Controller
{

    public function dashboard()
    {
        $jumlahSurat=SuratMasuk::all()->count();
        return view('index', compact('jumlahSurat'));
    }

    public function index()
    {
        $data = SuratMasuk::all();  //mengambil semua data dari tabel guest

        return view('persuratan.index', compact('data'));
    }

    public function form()
    {
        return view('persuratan.forms');
    }

    public function store(Request $request)
    {
        // validasi data
        $request->validate([
            'nomorSurat' => 'required|string',
            'tanggalMasuk' => 'required|date',
            'asalSurat' => 'required|string',
            'perihal' => 'required|string',
            'fileSurat' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        //simpan file ke storage
        if ($request->hasFile('fileSurat')) {
            $file = $request->file('fileSurat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('suratmasuk', $fileName, 'public');
        }

        // simpan ke database
        SuratMasuk::create([
            'nomorSurat' => $request->nomorSurat,
            'tanggalMasuk' => $request->tanggalMasuk,
            'asalSurat' => $request->asalSurat,
            'perihal' => $request->perihal,
            'fileSurat' => $filePath,

        ]);

        return redirect()->route('indexSuratMasuk')->with('success', 'Persuratan berhasil disimpan');
    }

    public function edit($id)
    {
        // dd($id);
        $data = SuratMasuk::find($id);
        return view('persuratan.edit', compact('data'));
        // return view('persuratan.edit');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nomorSurat' => 'required|string',
            'tanggalMasuk' => 'required|date',
            'asalSurat' => 'required|string',
            'perihal' => 'required|string',
            'fileSurat' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        //ambil data
        $surat = SuratMasuk::find($id);

        // Jika ada file baru, simpan file
        if ($request->hasFile('fileSurat')) {

            // Hapus file lama jika ada
            Storage::disk('public')->delete($surat->fileSurat);

            $file = $request->file('fileSurat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('suratmasuk', $fileName, 'public');
        } else {
            $filePath = $surat->fileSurat; // Tetap menggunakan file lama jika tidak ada file baru
        }

        // Update data
        $surat->update([
            'nomorSurat' => $request->nomorSurat,
            'tanggalMasuk' => $request->tanggalMasuk,
            'asalSurat' => $request->asalSurat,
            'perihal' => $request->perihal,
            'fileSurat' => $filePath,
        ]);

        return redirect()->route('persuratan.index')->with('success', 'Persuratan berhasil diperbarui');
    }


    public function delete($id)
    {
        $surat = SuratMasuk::find($id);

        // Hapus file dari storage
        Storage::disk('public')->delete($surat->fileSurat);

        // Hapus data dari database
        $surat->delete();

        return redirect()->route('indexSuratMasuk')->with('success', 'Persuratan berhasil dihapus');
    }
}
