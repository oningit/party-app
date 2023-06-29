<?php

use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PubController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionServiceProvider;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PubController::class, 'index']);

Route::post('/watch', [PubController::class, 'watch']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/pub', [PubController::class, 'list'])->name('pub');
    Route::get('/pub/pubcreator', [PubController::class, 'show'])->name('pubcreator');
    Route::delete('/pub/pubcreator/{id}', [PubController::class, 'destroy'])->name('pubcreator.destroy');
    Route::post('/pub/pubcreator', [PubController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
