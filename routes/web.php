<?php


use App\Http\Controllers\UsernameController;
use App\Http\Controllers\DetailCustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GpsController;
use App\Http\Controllers\GsmActiveController;
use App\Http\Controllers\GsmPreActiveController;
use App\Http\Controllers\GsmTerminateController;
use App\Http\Controllers\PemasanganMutasiGpsController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SensorController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

// Route::get('/login', function () {
//     return view('partials.v_landingpage');
// });


// Route::get('/livetable/datatable', [UsernameController::class, 'datatable'])->name('livetable.list');

// Route::post('/selected-username', [UsernameController::class, 'deleteall'])->name('livetable.delete_all');
// Route::get('/selectedDelete', 'UsernameController@deleteAll')->name('livetable.delete_all');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin', 'auth'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.homepage');
});

Route::group(['middleware' => 'isCs', 'auth'], function () {
    Route::get('/customer_service', [CustomerServiceController::class, 'index'])->name('cs.homepage');
    Route::get('/livetable', [UsernameController::class, 'index']);
    // Route::get('/livetable/fetch_data', [UsernameController::class, 'fetch_data']);
    // Route::post('/livetable/add_data', [UsernameController::class, 'add_data'])->name('livetable.add_data');
    // Route::post('/livetable/update_data', [UsernameController::class, 'update_data'])->name('livetable.update_data');
    // Route::post('/livetable/delete_data', [UsernameController::class, 'delete_data'])->name('livetable.delete_data');
    // Route::post('/livetable/detail_data', [UsernameController::class, 'detail_data'])->name('livetable.detail_data');
    //
    Route::get('/selectedDelete', [UsernameController::class, 'deleteAll'])->name('livetable.delete_all');
    Route::get('/item_data', [UsernameController::class, 'item_data']);
    Route::get('/add_form', [UsernameController::class, 'add_form']);
    Route::get('/store', [UsernameController::class, 'store']);
    Route::get('/destroy/{id}', [UsernameController::class, 'destroy']);
    Route::get('/show/{id}', [UsernameController::class, 'show']);
    Route::get('/update/{id}', [UsernameController::class, 'update']);
    Route::get('/selected', [UsernameController::class, 'selected']);
    Route::get('/update_all/{id}', [UsernameController::class, 'updateall']);
    Route::get('export', [UsernameController::class, 'export'])->name('export');

    // Company
    Route::get('/Company', [CompanyController::class, 'index'])->name('company');
    Route::get('/item_data_company', [CompanyController::class, 'item_data']);
    Route::get('/add_form_company', [CompanyController::class, 'add_form']);
    Route::get('/store_company', [CompanyController::class, 'store']);
    Route::get('/destroy_company/{id}', [CompanyController::class, 'destroy']);
    Route::get('/edit_form_company/{id}', [CompanyController::class, 'edit_form']);
    Route::get('/update_company/{id}', [CompanyController::class, 'update']);
    Route::get('/selectedDelete_company', [CompanyController::class, 'deleteAll']);
    Route::get('/selected_company', [CompanyController::class, 'selected']);
    Route::get('/update_all/{id}', [CompanyController::class, 'updateall']);
    Route::get('/dependent_company/{id}', [CompanyController::class, 'dependentCompany']);
    Route::get('/show_no_agreement/{id}', [CompanyController::class, 'showAgreement']);

    // pic
    Route::get('/pic', [PicController::class, 'index'])->name('pic');
    Route::get('/item_data_pic', [PicController::class, 'item_data']);
    Route::get('/add_form_pic', [PicController::class, 'add_form']);
    Route::get('/store_pic', [PicController::class, 'store']);
    Route::get('/destroy_pic/{id}', [PicController::class, 'destroy']);
    Route::get('/show_pic/{id}', [PicController::class, 'edit_form']);
    Route::get('/update_pic/{id}', [PicController::class, 'update']);
    Route::get('/selectedDelete_pic', [PicController::class, 'deleteAll']);
    Route::get('/selected_pic', [PicController::class, 'selected']);
    Route::get('/update_all/{id}', [PicController::class, 'updateall']);
    
    // seller
    Route::get('/seller', [SellerController::class, 'index'])->name('seller');
    Route::get('/item_data_seller', [SellerController::class, 'item_data']);
    Route::get('/add_form_seller', [SellerController::class, 'add_form']);
    Route::get('/store_seller', [SellerController::class, 'store']);
    Route::get('/destroy_seller/{id}', [SellerController::class, 'destroy']);
    Route::get('/show_seller/{id}', [SellerController::class, 'edit_form']);
    Route::get('/update_seller/{id}', [SellerController::class, 'update']);
    Route::get('/selectedDelete_seller', [SellerController::class, 'deleteAll']);
    Route::get('/selected_seller', [SellerController::class, 'selected']);
    Route::get('/update_all/{id}', [SellerController::class, 'updateall']);

    Route::get('/GsmActive', [GsmActiveController::class, 'index'])->name('GsmActive');
    Route::get('/item_data_GsmActive', [GsmActiveController::class, 'item_data']);
    Route::get('/add_form_GsmActive', [GsmActiveController::class, 'add_form']);
    Route::get('/store_GsmActive', [GsmActiveController::class, 'store']);
    Route::get('/destroy_GsmActive/{id}', [GsmActiveController::class, 'destroy']);
    Route::get('/show_GsmActive/{id}', [GsmActiveController::class, 'edit_form']);
    Route::get('/update_GsmActive/{id}', [GsmActiveController::class, 'update']);
    Route::get('/selectedDelete_GsmActive', [GsmActiveController::class, 'deleteAll']);
    Route::get('/selected', [GsmActiveController::class, 'selected']);
    Route::get('/update_all/{id}', [GsmActiveController::class, 'updateall']);

    //Gsm Terminate
    Route::get('/GsmTerminate', [GsmTerminateController::class, 'index'])->name('GsmTerminate');
    Route::get('/item_data_GsmTerminate', [GsmTerminateController::class, 'item_data']);
    Route::get('/add_form_GsmTerminate', [GsmTerminateController::class, 'add_form']);
    Route::get('/store_GsmTerminate', [GsmTerminateController::class, 'store']);
    Route::get('/destroy_GsmTerminate/{id}', [GsmTerminateController::class, 'destroy']);
    Route::get('/show_GsmTerminate/{id}', [GsmTerminateController::class, 'edit_form']);
    Route::get('/update_GsmTerminate/{id}', [GsmTerminateController::class, 'update']);
    Route::get('/selectedDelete_GsmTerminate', [GsmTerminateController::class, 'deleteAll']);
    Route::get('/selected', [GsmTerminateController::class, 'selected']);
    Route::get('/update_all/{id}', [GsmTerminateController::class, 'updateall']);
    Route::get('/dependent_terminate/{id}', [GsmTerminateController::class, 'dependentTerminate']);
    Route::get('/show_company/{id}', [GsmTerminateController::class, 'showCompany']);

    //sensor
    Route::get('/sensor', [SensorController::class, 'index'])->name('sensor');
    Route::get('/item_data_sensor', [SensorController::class, 'item_data']);
    Route::get('/add_form_sensor', [SensorController::class, 'add_form']);
    Route::get('/store_sensor', [SensorController::class, 'store']);
    Route::get('/destroy_sensor/{id}', [SensorController::class, 'destroy']);
    Route::get('/show_sensor/{id}', [SensorController::class, 'edit_form']);
    Route::get('/update_sensor/{id}', [SensorController::class, 'update']);
    Route::get('/selectedDelete_sensor', [SensorController::class, 'deleteAll']);
    Route::get('/selected', [SensorController::class, 'selected']);
    Route::get('/update_all/{id}', [SensorController::class, 'updateall']);

    //Gps
    Route::get('/gps', [GpsController::class, 'index'])->name('gps');
    Route::get('/item_data_gps', [GpsController::class, 'item_data']);
    Route::get('/add_form_gps', [GpsController::class, 'add_form']);
    Route::get('/store_gps', [GpsController::class, 'store']);
    Route::get('/destroy_gps/{id}', [GpsController::class, 'destroy']);
    Route::get('/show_gps/{id}', [GpsController::class, 'edit_form']);
    Route::get('/update_gps/{id}', [GpsController::class, 'update']);
    Route::get('/selectedDelete_gps', [GpsController::class, 'deleteAll']);
    Route::get('/selected_gps', [GpsController::class, 'selected']);
    Route::get('/update_all/{id}', [GpsController::class, 'updateall']);

    //gsm pre active
    Route::get('/GsmPreActive', [GsmPreActiveController::class, 'index'])->name('GsmPreActive');
    Route::get('/item_data_GsmPreActive', [GsmPreActiveController::class, 'item_data']);
    Route::get('/add_form_GsmPreActive', [GsmPreActiveController::class, 'add_form']);
    Route::get('/store_GsmPreActive', [GsmPreActiveController::class, 'store']);
    Route::get('/destroy_GsmPreActive/{id}', [GsmPreActiveController::class, 'destroy']);
    Route::get('/show_GsmPreActive/{id}', [GsmPreActiveController::class, 'edit_form']);
    Route::get('/update_GsmPreActive/{id}', [GsmPreActiveController::class, 'update']);
    Route::get('/selectedDelete_GsmPreActive', [GsmPreActiveController::class, 'deleteAll']);
    Route::get('/selected', [GsmPreActiveController::class, 'selected']);
    Route::get('/update_all/{id}', [GsmPreActiveController::class, 'updateall']);

    //Request and Complent Customer
    Route::get('/request_complent_customer', [RequestComplentCustomerController::class, 'index'])->name('request_complent_customer');
    Route::get('/item_data_reqcomp_cust', [RequestComplentCustomerController::class, 'item_data'])->name('item_data_reqcomp_cust');

    //detail customer
    Route::get('/detail_customer', [DetailCustomerController::class, 'index'])->name('Detail customer');
    Route::get('/item_data_detail', [DetailCustomerController::class, 'item_data']);
    Route::get('/add_form_detail', [DetailCustomerController::class, 'add_form']);
    Route::get('/store_detail', [DetailCustomerController::class, 'store']);
    Route::get('/destroy_detail/{id}', [DetailCustomerController::class, 'destroy']);
    Route::get('/show_detail/{id}', [DetailCustomerController::class, 'edit_form']);
    Route::get('/update_detail/{id}', [DetailCustomerController::class, 'update']);
    Route::get('/selectedDelete_detail', [DetailCustomerController::class, 'deleteAll']);
    Route::get('/selected', [DetailCustomerController::class, 'selected']);
    Route::get('/update_all/{id}', [DetailCustomerController::class, 'updateall']);
    // Pemasangan Mutasi GPS

    Route::get('/PemasanganMutasi', [PemasanganMutasiGpsController::class, 'index'])->name('PesanganMutasi');
    Route::get('/item_data_PemasanganMutasi', [PemasanganMutasiGpsController::class, 'item_data']);
    Route::get('/add_form_PemasanganMutasi', [PemasanganMutasiGpsController::class, 'add_form']);
    Route::get('/store_PemasanganMutasi', [PemasanganMutasiGpsController::class, 'store']);
    Route::get('/destroy_PemasanganMutasi/{id}', [PemasanganMutasiGpsController::class, 'destroy']);
    Route::get('/show_PemasanganMutasi/{id}', [PemasanganMutasiGpsController::class, 'edit_form']);
    Route::get('/update_PemasanganMutasi/{id}', [PemasanganMutasiGpsController::class, 'update']);
    Route::get('/selectedDelete_PemasanganMutasi', [PemasanganMutasiGpsController::class, 'deleteAll']);
    Route::get('/selected', [PemasanganMutasiGpsController::class, 'selected']);
    Route::get('/update_all/{id}', [PemasanganMutasiGpsController::class, 'updateall']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
