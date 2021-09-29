<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Mahasiswa\Create;
use App\Http\Livewire\Mahasiswa\Edit;
use App\Http\Livewire\Tentang;
use App\Http\Livewire\Mahasiswa\Show;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', Home::class);
Route::get('/mahasiswa', Show::class);
Route::get('/mahasiswa/create', Create::class);
Route::get('/mahasiswa/edit/{id}', Edit::class)->name('mahasiswa.edit');
Route::get('/tentang', Tentang::class);
