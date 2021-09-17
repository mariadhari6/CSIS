<?php


use App\Http\Controllers\UsernameController;
use App\Http\Controllers\DetailCustomerController;
use App\Http\Controllers\SummaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerServiceController;
use App\Models\DetailCustomer;
use App\Models\Username;
use Illuminate\Support\Facades\Auth;



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

// Route::get('/', function () {
//     return view('livetable.home');
// });

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/login', function () {
    return view('partials.v_landingpage');
});


// Route::get('/livetable/datatable', [UsernameController::class, 'datatable'])->name('livetable.list');

// Route::post('/selected-username', [UsernameController::class, 'deleteall'])->name('livetable.delete_all');
Route::get('/selectedDelete', 'UsernameController@deleteAll')->name('livetable.delete_all');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin', 'auth'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.homepage');
});

Route::group(['middleware' => 'isCs', 'auth'], function () {
    Route::get('/customer_service', [CustomerServiceController::class, 'index'])->name('cs.homepage');
    Route::get('/livetable', [UsernameController::class, 'index']);
    Route::get('/livetable/fetch_data', [UsernameController::class, 'fetch_data']);
    Route::post('/livetable/add_data', [UsernameController::class, 'add_data'])->name('livetable.add_data');
    Route::post('/livetable/update_data', [UsernameController::class, 'update_data'])->name('livetable.update_data');
    Route::post('/livetable/delete_data', [UsernameController::class, 'delete_data'])->name('livetable.delete_data');
    Route::post('/livetable/detail_data', [UsernameController::class, 'detail_data'])->name('livetable.detail_data');
    //
    Route::get('/item_data', [UsernameController::class, 'item_data']);
    Route::get('/add_form', [UsernameController::class, 'add_form']);
    Route::get('/store', [UsernameController::class, 'store']);
    Route::get('/destroy/{id}', [UsernameController::class, 'destroy']);
    Route::get('/show/{id}', [UsernameController::class, 'show']);
    Route::get('/update/{id}', [UsernameController::class, 'update']);
    Route::get('/selected', [UsernameController::class, 'selected']);
    Route::get('/update_all/{id}', [UsernameController::class, 'updateall']);
    Route::get('export', [UsernameController::class, 'export'])->name('export');

    Route::get('/detail_customer', [DetailCustomerController::class, 'index'])->name('detail_customer');
    Route::get('/item_detail', [DetailCustomerController::class, 'item_data'])->name('item_detail');
    Route::get('/add_detail', [DetailCustomerController::class, 'add_form'])->name('add_detail');
    Route::get('/store_detail', [DetailCustomerController::class, 'store'])->name('save_detail');
    Route::get('/delete_detail/{id}', [DetailCustomerController::class, 'destroy']);
    Route::get('/show_detail/{id}', [DetailCustomerController::class, 'show']);
    Route::get('/update_detail/{id}', [DetailCustomerController::class, 'update']);
    Route::get('/delete_all', [DetailCustomerController::class, 'deleteAll'])->name('deleteAll_detail');
    Route::get('/selected_detail', [DetailCustomerController::class, 'selected']);


    Route::get('/summary', [SummaryController::class, 'index'])->name('summary');
    Route::get('/item_summary', [SummaryController::class, 'item_data'])->name('item_summary');
    Route::get('/add_summary', [DetailCustomerController::class, 'add_form'])->name('add_summary');


});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
