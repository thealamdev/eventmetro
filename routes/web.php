<?php

use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $iterator = json_decode(file_get_contents(database_path('backups/modules.json')))[2]->data;
    foreach($iterator as $item){
        dd($item);
    }
     dd(array_values($iterator));
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'locale'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/sajal.php';
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    require __DIR__ . '/thealamdev.php';
});


Route::get('locale/{lang}', [LocalizationController::class, 'locale'])->name('local');
