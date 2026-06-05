<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CreditController;

// Page d'accueil — publique
Route::get('/', function () {
    return view('welcome');
});

// Routes protégées par auth
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/generate', [PostController::class, 'generate'])->name('posts.generate');
    Route::post('/posts/generate', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/hook', [PostController::class, 'hook'])->name('posts.hook');
    Route::post('/posts/hook', [PostController::class, 'storeHook'])->name('posts.storeHook');
    Route::get('/posts/rewrite', [PostController::class, 'rewrite'])->name('posts.rewrite');
    Route::post('/posts/rewrite', [PostController::class, 'storeRewrite'])->name('posts.storeRewrite');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Crédits
    Route::get('/credits', [CreditController::class, 'index'])->name('credits.index');

});

require __DIR__.'/auth.php';