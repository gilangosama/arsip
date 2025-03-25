<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KritikSaranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\FirebaseAuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\KritikController;
use App\Http\Middleware\FirebaseAuthMiddleware;

// Hapus route ini karena duplikat
// Route::get('/', function () {
//     return view('welcome');
// });

// Gunakan hanya route ini
Route::get('/', [PublicController::class, 'welcome'])->name('welcome');

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
Route::post('/kritik-saran', [PublicController::class, 'store'])->name('kritik-saran.store');

Route::get('/berita', [PublicController::class, 'news'])->name('news.index');
Route::get('/berita/search', [PublicController::class, 'filterNews'])->name('news.filter');
Route::get('/berita/{id}', [PublicController::class, 'showNews'])->name('news.show');

Route::middleware([FirebaseAuthMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/news', [BeritaController::class, 'index'])->name('news.index');
    Route::get('/news/{id}', [BeritaController::class, 'show'])->name('news.show');
    Route::get('/news/create', [BeritaController::class, 'create'])->name('news.create');
    Route::post('/news/store', [BeritaController::class, 'store'])->name('news.store');
    Route::put('/news/update/{id}', [BeritaController::class, 'update'])->name('news.update');
    Route::get('/news/edit/{id}', [BeritaController::class, 'edit'])->name('news.edit');
    Route::delete('/news/destroy/{id}', [BeritaController::class, 'destroy'])->name('news.destroy');

    // Route untuk halaman kritik & saran admin
    Route::get('/feedback', [KritikController::class, 'index'])->name('feedback');
    Route::get('/feedback/{id}', [KritikController::class, 'show'])->name('feedback.show');
    Route::put('/feedback/{id}/mark-as-read', [KritikController::class, 'markAsRead'])->name('feedback.mark-read');
    Route::put('/feedback/{id}/archive', [KritikController::class, 'archive'])->name('feedback.archive');
    Route::delete('/feedback/{id}', [KritikController::class, 'destroy'])->name('feedback.delete');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// firebase crud
Route::get('/firebase', [FirebaseController::class, 'index'])->name('firebase.index');
Route::get('/signup', [FirebaseController::class, 'signUp'])->name('firebase.signup');
Route::get('/signin', [FirebaseController::class, 'signIn'])->name('firebase.signin');
Route::get('/set', [FirebaseController::class, 'set'])->name('firebase.set');
Route::get('/read', [FirebaseController::class, 'read'])->name('firebase.read');
Route::get('/check', [FirebaseController::class, 'userCheck'])->name('firebase.checkuser');


require __DIR__ . '/auth.php';
