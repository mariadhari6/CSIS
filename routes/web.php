<?php

use App\Http\Controllers\Username;
use App\Http\Controllers\UsernameController;
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
    return view('livetable.home');
});

Route::get('/tes', function () {
    return view('tes');
});

Route::get('/login', function () {
    return view('partials.v_login');
});

Route::get('/livetable', [UsernameController::class, 'index']);
Route::get('/livetable/fetch_data', [UsernameController::class, 'fetch_data']);
Route::post('/livetable/add_data', [UsernameController::class, 'add_data'])->name('livetable.add_data');
Route::post('/livetable/update_data', [UsernameController::class, 'update_data'])->name('livetable.update_data');
Route::post('/livetable/delete_data', [UsernameController::class, 'delete_data'])->name('livetable.delete_data');
Route::post('/livetable/detail_data', [UsernameController::class, 'detail_data'])->name('livetable.detail_data');
// Route::get('/livetable/datatable', [UsernameController::class, 'datatable'])->name('livetable.list');
