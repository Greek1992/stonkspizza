<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function ()
{
    return view('home');
});

Route::get('/pizzastore',[\App\Http\Controllers\CustomController::class, 'index']);
Route::get('/addfood',[\App\Http\Controllers\CustomController::class, 'addfood']);
Route::post('/deletefood',[\App\Http\Controllers\CustomController::class, 'deletefood']);

Route::get('/ingredients',[\App\Http\Controllers\CustomController::class, 'inspectpizza']);

Route::get('/bestel',[\App\Http\Controllers\CustomController::class, 'bestelpizza'])->middleware('auth');
Route::get('/bestelfinal',[\App\Http\Controllers\CustomController::class, 'bestelfinal'])->middleware('auth');
Route::get('/deleteorder',[\App\Http\Controllers\CustomController::class, 'deleteorder'])->middleware('auth');

Route::get('/dashboard', function ()
{
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function ()
{
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
