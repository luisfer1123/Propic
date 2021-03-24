<?php
use App\Models\Ciudade;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/anuncios', App\Http\Controllers\AnuncioController::class);
Route::get('/ciudades',[App\Http\Controllers\ManunciosController::class,'ciudades']);

Route::resource('/MisAnuncios',App\Http\Controllers\ManunciosController::class);



