<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KritikSaranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\FirebaseAuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\PublicController;
use App\Http\Middleware\FirebaseAuthMiddleware;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([FirebaseAuthMiddleware::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
Route::post('/kritik-saran', [PublicController::class, 'kritik'])->name('kritik');
Route::get('/berita', [PublicController::class, 'news'])->name('news.index');
Route::get('/berita/search', [PublicController::class, 'filterNews'])->name('news.filter');

Route::middleware([FirebaseAuthMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/news', [BeritaController::class, 'index'])->name('news.index');
    Route::get('/news/show/{id}', [BeritaController::class, 'show'])->name('news.show');
    Route::get('/news/create', [BeritaController::class, 'create'])->name('news.create');
    Route::post('/news/store', [BeritaController::class, 'store'])->name('news.store');
    Route::put('/news/update/{id}', [BeritaController::class, 'update'])->name('news.update');
    Route::get('/news/edit/{id}', [BeritaController::class, 'edit'])->name('news.edit');
    Route::delete('/news/destroy/{id}', [BeritaController::class, 'destroy'])->name('news.destroy');

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

// firebase crud
Route::get('/firebase', [FirebaseController::class, 'index'])->name('firebase.index');
Route::get('/signup', [FirebaseController::class, 'signUp'])->name('firebase.signup');
Route::get('/signin', [FirebaseController::class, 'signIn'])->name('firebase.signin');
Route::get('/set', [FirebaseController::class, 'set'])->name('firebase.set');
Route::get('/read', [FirebaseController::class, 'read'])->name('firebase.read');
Route::get('/check', [FirebaseController::class, 'userCheck'])->name('firebase.checkuser');


require __DIR__ . '/auth.php';
