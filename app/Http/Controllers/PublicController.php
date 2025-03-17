<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class PublicController extends Controller
{
    protected $auth, $database;

    public function __construct()
    {
        try {
            $factory = (new Factory)
                ->withServiceAccount(storage_path(config('firebase.credentials')))
                ->withDatabaseUri(config('firebase.database_url'));

            $this->auth = $factory->createAuth();
            $this->database = $factory->createDatabase();
        } catch (\Exception $e) {
            \Log::error('Error initializing Firebase: ' . $e->getMessage());
        }
    }

    public function news()
    {
        // Ambil semua berita
        $news = $this->database->getReference('news')->getValue() ?? [];

        // Filter hanya berita yang published
        $publishedNews = [];
        foreach ($news as $id => $item) {
            if (isset($item['status']) && strtolower($item['status']) === 'published') {
                $publishedNews[$id] = $item;
            }
        }

        // Urutkan berdasarkan created_at terbaru
        if (!empty($publishedNews)) {
            uasort($publishedNews, function($a, $b) {
                return strtotime($b['created_at'] ?? '0') - strtotime($a['created_at'] ?? '0');
            });
        }

        // Pagination
        $perPage = 10;
        $page = request()->input('page', 1);
        $total = count($publishedNews);
        $paginatedNews = array_slice($publishedNews, ($page - 1) * $perPage, $perPage);

        return view('news', [
            'news' => $paginatedNews,
            'total' => $total,
            'perPage' => $perPage,
            'page' => $page
        ]);
    }

    public function filterNews(Request $request)
    {
        $news = $this->database->getReference('news')->getValue() ?? [];
        
        // Filter published terlebih dahulu
        $publishedNews = array_filter($news, function($item) {
            return isset($item['status']) && strtolower($item['status']) === 'published';
        });

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $search = strtolower($request->input('search'));
            $publishedNews = array_filter($publishedNews, function($item) use ($search) {
                return str_contains(strtolower($item['title']), $search) ||
                       str_contains(strtolower($item['content']), $search);
            });
        }

        // Filter berdasarkan kategori
        if ($request->has('category') && $request->input('category') !== '') {
            $category = strtolower($request->input('category'));
            $publishedNews = array_filter($publishedNews, function($item) use ($category) {
                return strtolower($item['category']) === $category;
            });
        }

        // Urutkan berdasarkan created_at terbaru
        if (!empty($publishedNews)) {
            uasort($publishedNews, function($a, $b) {
                return strtotime($b['created_at'] ?? '0') - strtotime($a['created_at'] ?? '0');
            });
        }

        // Pagination
        $perPage = 10;
        $page = $request->input('page', 1);
        $total = count($publishedNews);
        $paginatedNews = array_slice($publishedNews, ($page - 1) * $perPage, $perPage);

        return view('news', [
            'news' => $paginatedNews,
            'total' => $total,
            'perPage' => $perPage,
            'page' => $page
        ]);
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
        try {
            $news = $this->database->getReference('news/' . $id)->getValue();
            
            if (!$news) {
                return redirect()->route('welcome')->with('error', 'Berita tidak ditemukan');
            }

            $news['id'] = $id;
            return view('news-detail', compact('news'));
        } catch (\Exception $e) {
            \Log::error('Error showing news: ' . $e->getMessage());
            return redirect()->route('welcome')->with('error', 'Terjadi kesalahan');
        }
    }

    public function index()
    {
        $news = $this->database->getReference('news')->getValue() ?? [];
        return view('welcome', compact('news'));
    }

    public function welcome()
    {
        try {
            // Ambil data berita
            $news = $this->database->getReference('news')->getValue() ?? [];
            
            // Filter berita published
            $published_news = [];
            foreach ($news as $id => $item) {
                if (isset($item['status']) && strtolower($item['status']) === 'published') {
                    $published_news[$id] = $item;
                }
            }
            
            // Debug
            // dd([
            //     'total_news' => count($news),
            //     'published_news' => $published_news
            // ]);

            return view('welcome', compact('published_news'));
            
        } catch (\Exception $e) {
            \Log::error('Error in welcome page: ' . $e->getMessage());
            return view('welcome', ['published_news' => []]);
        }
    }
}
