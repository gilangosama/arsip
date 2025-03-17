<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class PublicController extends Controller
{
    protected $database;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(storage_path(config('firebase.credentials')))
            ->withDatabaseUri(config('firebase.database_url'));

        $this->database = $factory->createDatabase();
    }

    public function news()
    {
        $news = $this->database->getReference('news')->getValue();
        $perPage = 10; // Ensure $perPage is defined
        $total = count($news);
        $page = 1;
        return view('news', compact('news', 'total', 'perPage', 'page'));
    }

    public function filterNews(Request $request)
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

        // Pagination
        $perPage = 10;
        $page = $request->input('page', 1);
        $total = count($query);
        if ($perPage > 0) {
            $news = array_slice($query, ($page - 1) * $perPage, $perPage);
        } else {
            $news = $query;
        }

        return view('news', compact('news', 'total', 'perPage', 'page'));
    }

    public function about()
    {
        return view('public.about');
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function showNews($id)
    {
        $news = $this->database->getReference('news/' . $id)->getValue();
        
        if (!$news) {
            abort(404);
        }

        return view('news-detail', compact('news'));
    }

    public function index()
    {
        $news = $this->database->getReference('news')->getValue() ?? [];
        return view('welcome', compact('news'));
    }

    public function welcome()
    {
        try {
            // Ambil data berita dari Firebase
            $news = $this->database->getReference('news')->getValue() ?? [];
            
            // Urutkan berita berdasarkan created_at terbaru
            if (!empty($news)) {
                uasort($news, function($a, $b) {
                    return strtotime($b['created_at']) - strtotime($a['created_at']);
                });
            }
            
            return view('welcome', compact('news'));
        } catch (\Exception $e) {
            // Jika terjadi error, tampilkan array kosong
            $news = [];
            return view('welcome', compact('news'));
        }
    }
}
