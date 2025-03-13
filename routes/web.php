<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KritikSaranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\FirebaseAuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/register', [FirebaseAuthController::class, 'register']);
Route::post('/login', [FirebaseAuthController::class, 'login']);


// Route::get('/register-firebase', function () {
//     $factory = (new \Kreait\Firebase\Factory)->withServiceAccount(storage_path('app/firebase/arsip-6a1c0-firebase-adminsdk-fbsvc-317a0f9d1f.json'));
//     $auth = $factory->createAuth();

//     $user = $auth->createUser([
//         'email' => 'user@example.com',
//         'password' => 'password123',
//     ]);

//     return "User berhasil dibuat: " . $user->uid;
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// Route::middleware('guest')->group(function () {
//     Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
//     Route::post('/login', [AuthenticatedSessionController::class, 'store']);
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
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

require __DIR__ . '/auth.php';
