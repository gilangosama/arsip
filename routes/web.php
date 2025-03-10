<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KritikSaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/kritik-saran', [KritikSaranController::class, 'store'])->name('kritik-saran.store');

Route::get('/berita', function () {
    return view('news');
})->name('news.index');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/news', function () {
        return view('admin.news.index');
    })->name('news.index');
    
    Route::get('/news/create', function () {
        return view('admin.news.create');
    })->name('news.create');
    
    Route::post('/news', function () {
        // Logic untuk menyimpan berita
        return redirect()->route('admin.news.index');
    })->name('news.store');

    // Route untuk halaman kritik & saran admin
    Route::get('/feedback', function () {
        return view('admin.feedback');
    })->name('feedback');

    // Route untuk menangani aksi-aksi pada kritik & saran (opsional, bisa ditambahkan nanti)
    Route::get('/feedback/{id}', function ($id) {
        // Logic untuk menampilkan detail
        return response()->json(['id' => $id]);
    })->name('feedback.show');

    Route::put('/feedback/{id}/mark-as-read', function ($id) {
        // Logic untuk menandai sudah dibaca
        return response()->json(['message' => 'Marked as read']);
    })->name('feedback.mark-read');

    Route::put('/feedback/{id}/archive', function ($id) {
        // Logic untuk mengarsipkan
        return response()->json(['message' => 'Archived']);
    })->name('feedback.archive');

    Route::delete('/feedback/{id}', function ($id) {
        // Logic untuk menghapus
        return response()->json(['message' => 'Deleted']);
    })->name('feedback.delete');
});

require __DIR__.'/auth.php';
