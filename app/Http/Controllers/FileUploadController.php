<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use RealRashid\SweetAlert\Facades\Alert;

class FileUploadController extends Controller
{
    protected $database;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(storage_path(config('firebase.credentials')))
            ->withDatabaseUri(config('firebase.database_url'));

        $this->database = $factory->createDatabase();
    }

    public function index()
    {
        // Ambil semua file dari Firebase
        $files = $this->database->getReference('uploads')->getValue() ?? [];
        return view('file.index', compact('files'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,jpg,jpeg,png,gif,ppt,pptx|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('uploads/files', 'public');

            // Simpan informasi file ke Firebase
            $fileData = [
                'title' => $file->getClientOriginalName(),
                'path' => $path,
                'size' => round($file->getSize() / 1024, 2) . ' KB',
                'type' => $file->extension(),
                'category' => 'General', // Bisa dikustomisasi sesuai kebutuhan
                'created_at' => now(),
            ];

            $this->database->getReference('uploads')->push($fileData);

            Alert::success('Success', 'File berhasil diunggah!');
            return redirect()->route('file.index');
        }

        Alert::error('Error', 'Gagal mengunggah file!');
        return redirect()->route('file.index');
    }

    public function destroy($id)
    {
        // Ambil referensi file berdasarkan ID
        $fileRef = $this->database->getReference("uploads/{$id}");
        $fileData = $fileRef->getValue();

        if ($fileData) {
            // Hapus file dari storage lokal/public
            $filePath = public_path("storage/{$fileData['path']}");
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Hapus data file dari Firebase
            $fileRef->remove();

            Alert::success('Deleted', 'File berhasil dihapus!');
        } else {
            Alert::error('Error', 'File tidak ditemukan!');
        }

        return redirect()->route('file.index');
    }

}