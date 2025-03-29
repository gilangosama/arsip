<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BeritaController extends Controller
{
    protected $auth, $database;
    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(storage_path(config('firebase.credentials')))
            ->withDatabaseUri(config('firebase.database_url'));

        $this->auth = $factory->createAuth();
        $this->database = $factory->createDatabase();
    }

    public function index(Request $request)
    {
        $query = $this->database->getReference('news')->getValue();

        // Filter by search
        if ($request->has('search')) {
            $query = array_filter($query, function ($item) use ($request) {
                return stripos($item['title'], $request->input('search')) !== false;
            });
        }

        // Filter by category
        if ($request->has('category') && $request->input('category') != '') {
            $query = array_filter($query, function ($item) use ($request) {
                return $item['category'] == $request->input('category');
            });
        }

        // Filter by status
        if ($request->has('status') && $request->input('status') != '') {
            $query = array_filter($query, function ($item) use ($request) {
                return $item['status'] == $request->input('status');
            });
        }

        // Pagination
        $perPage = 10;
        $page = $request->input('page', 1);
        $total = is_countable($query) ? count($query) : 0;
        $news = array_slice($query, ($page - 1) * $perPage, $perPage);

        return view('admin.news.index', compact('news', 'total', 'perPage', 'page'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
            'status' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'category.required' => 'Kategori harus diisi',
            'image.required' => 'Gambar harus diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau svg',
            'image.max' => 'Ukuran gambar maksimal 2MB',
            'content.required' => 'Konten harus diisi',
            'status.required' => 'Status harus diisi',
        ]);

        // Upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
        }

        // Save data to Firebase
        $data = [
            'title' => $request->input('title'),
            'category' => $request->input('category'),
            'image' => $imagePath ?? null,
            'content' => $request->input('content'),
            'status' => $request->input('status'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $this->database->getReference('news')->push($data);
        Alert::success('Success Title', 'Berita berhasil disimpan');
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil disimpan');
    }

    public function show($id)
    {
        try {
            $news = $this->database->getReference('news/' . $id)->getValue();
            
            if (!$news) {
                Alert::error('Error', 'Berita tidak ditemukan');
                return redirect()->route('admin.news.index');
            }
            
            $news['id'] = $id; // Tambahkan ID ke array berita
            return view('admin.news.show', compact('news'));
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat memuat berita');
            return redirect()->route('admin.news.index');
        }
    }

    public function edit($id)
    {
        $news = $this->database->getReference('news/' . $id)->getValue();
        $news['id'] = $id; // Add id to the news array
        return view('admin.news.create', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
            'status' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'category.required' => 'Kategori harus diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau svg',
            'image.max' => 'Ukuran gambar maksimal 2MB',
            'content.required' => 'Konten harus diisi',
            'status.required' => 'Status harus diisi',
        ]);

        // Upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
        }

        // Update data in Firebase
        $data = [
            'title' => $request->input('title'),
            'category' => $request->input('category'),
            'image' => $imagePath ?? $request->input('existing_image'),
            'content' => $request->input('content'),
            'status' => $request->input('status'),
            'updated_at' => now(),
        ];

        $this->database->getReference('news/' . $id)->update($data);
        Alert::success('Success Title', 'Berita berhasil diperbarui');
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy($id)
    {
        $image = $this->database->getReference('news/' . $id . '/image')->getValue();
        if ($image) {
            Storage::disk('public')->delete($image);
        }
        $this->database->getReference('news/' . $id)->remove();
        Alert::success('Success Title', 'Berita berhasil dihapus');
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus');
    }
}
