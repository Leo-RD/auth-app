<?php

use App\Http\Controllers\ProfileController;
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

require __DIR__.'/auth.php';


Route::get('/ma-page', function () {
    return view('mapage');
})->middleware('role:admin'); // Seuls les admins y ont accès


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

Route::get('/setup-permissions', function () {
    // On récupère votre compte actuellement connecté
    $user = auth()->user(); 

    if (!$user) {
        return "Erreur : Vous devez vous connecter sur le site d'abord !";
    }

    $roleAdmin = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin']);
    $user->assignRole($roleAdmin);

    return "C'est tout bon ! Le rôle admin a été donné à : " . $user->email;
});


use App\Http\Controllers\ArticleController;

Route::get('/creer-article', [ArticleController::class, 'create']);
Route::post('/articles', [ArticleController::class, 'store']);
Route::get('/articles', [ArticleController::class, 'index']);