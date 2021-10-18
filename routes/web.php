<?php


use App\Http\Controllers\UsernameController;
use App\Http\Controllers\DetailCustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GpsController;
use App\Http\Controllers\GsmActiveController;
use App\Http\Controllers\GsmMasterController;
use App\Http\Controllers\GsmTerminateController;
use App\Http\Controllers\PemasanganMutasiGpsController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\DashboardVisitAssignmentController;
use App\Http\Controllers\MaintenanceGpsController;
use App\Http\Controllers\RequestComplaintController;
use App\Http\Controllers\RequestComplaintCustomerController;
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

    // GSM Aktiv
    Route::get('/GsmActive', [GsmActiveController::class, 'index'])->name('GsmActive');
    Route::get('/item_data_GsmActive', [GsmActiveController::class, 'item_data']);
    Route::get('/add_form_GsmActive', [GsmActiveController::class, 'add_form']);
    Route::get('/store_GsmActive', [GsmActiveController::class, 'store']);
    Route::get('/destroy_GsmActive/{id}', [GsmActiveController::class, 'destroy']);
    Route::get('/show_GsmActive/{id}', [GsmActiveController::class, 'edit_form']);
    Route::get('/update_GsmActive/{id}', [GsmActiveController::class, 'update']);
    Route::get('/selectedDelete_GsmActive', [GsmActiveController::class, 'deleteAll']);
    Route::get('/selected_GsmActive', [GsmActiveController::class, 'selected']);
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
    Route::get('/selected_GsmTerminate', [GsmTerminateController::class, 'selected']);
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
    Route::get('/selected_sensor', [SensorController::class, 'selected']);
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

    //gsm Master
    Route::get('/GsmMaster', [GsmMasterController::class, 'index'])->name('GsmMaster');
    Route::get('/item_data_GsmMaster', [GsmMasterController::class, 'item_data']);
    Route::get('/item_data_temporary_GsmMaster', [GsmMasterController::class, 'item_data_temporary']);
    Route::get('/item_data_all_GsmMaster', [GsmMasterController::class, 'item_data']);
    Route::get('/item_data_ready_GsmMaster', [GsmMasterController::class, 'item_data_ready']);
    Route::get('/item_data_active_GsmMaster', [GsmMasterController::class, 'item_data_active']);
    Route::get('/item_data_terminate_GsmMaster', [GsmMasterController::class, 'item_data_terminate']);
    Route::get('/add_form_GsmMaster', [GsmMasterController::class, 'add_form']);
    Route::get('/store_GsmMaster', [GsmMasterController::class, 'store']);
    Route::get('/destroy_GsmMaster/{id}', [GsmMasterController::class, 'destroy']);
    Route::get('/show_GsmMaster/{id}', [GsmMasterController::class, 'edit_form']);
    Route::get('/update_GsmMaster/{id}', [GsmMasterController::class, 'update']);
    Route::get('/selectedDelete_GsmMaster', [GsmMasterController::class, 'deleteAll']);
    Route::get('/selected_GsmMaster', [GsmMasterController::class, 'selected']);
    Route::get('/update_all/{id}', [GsmMasterController::class, 'updateall']);
    Route::post('/importExcel_GsmMaster', [GsmMasterController::class, 'importExcel'])->name('importExcel_GsmMaster');
    Route::get('/delete_temporary', [GsmMasterController::class, 'deleteTemporary']);
    Route::get('/download_template_gsm', [GsmMasterController::class, 'export']);
        // try
        Route::get('/try', [GsmMasterController::class, 'try']);



     // Request Complain
     Route::get('/requestcomplaint', [RequestComplaintController::class, 'index'])->name('request.complain');
     Route::get('/item_data_RequestComplain', [RequestComplaintController::class, 'item_data']);
     Route::get('/item_data_MY_RequestComplain', [RequestComplaintController::class, 'item_data_MY']);
     Route::get('/add_form_RequestComplain', [RequestComplaintController::class, 'add_form']);
     Route::get('/store_RequestComplain', [RequestComplaintController::class, 'store']);
     Route::get('/destroy_RequestComplain/{id}', [RequestComplaintController::class, 'destroy']);
     Route::get('/show_RequestComplain/{id}', [RequestComplaintController::class, 'edit_form']);
     Route::get('/update_RequestComplain/{id}', [RequestComplaintController::class, 'update']);
     Route::get('/selectedDelete_RequestComplain', [RequestComplaintController::class, 'deleteAll']);
     Route::get('/selected_detail', [RequestComplaintController::class, 'selected']);
     Route::get('/update_all/{id}', [RequestComplaintController::class, 'updateall']);

    //detail customer
    Route::get('/detail_customer', [DetailCustomerController::class, 'index'])->name('detail_customer');
    Route::get('/item_data_detail', [DetailCustomerController::class, 'item_data'])->name('item_detail');
    Route::get('/add_form_detail', [DetailCustomerController::class, 'add_form'])->name('add_detail');
    Route::get('/store_detail', [DetailCustomerController::class, 'store']);
    Route::get('/destroy_detail/{id}', [DetailCustomerController::class, 'destroy']);
    Route::get('/show_detail/{id}', [DetailCustomerController::class, 'edit_form']);
    Route::get('/update_detail/{id}', [DetailCustomerController::class, 'update']);
    Route::get('/selectedDelete_detail', [DetailCustomerController::class, 'deleteAll']);
    Route::get('/selected_detail', [DetailCustomerController::class, 'selected']);
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
    Route::get('/selected_PemasanganMutasi', [PemasanganMutasiGpsController::class, 'selected']);
    Route::get('/update_all/{id}', [PemasanganMutasiGpsController::class, 'updateall']);
    Route::get('/dependent_pemasanganmutasi/{id}', [PemasanganMutasiGpsController::class, 'dependentPemasangan']);
    Route::get('/dependent_JenisPekerjaan/{id}', [PemasanganMutasiGpsController::class, 'dependentJenisPekerjaan']);
    // Route::get('/dependent_KendaraanPasang/{id}', [PemasanganMutasiGpsController::class, 'dependentKendaraanPasang']);

    // Maintenance GPS
    Route::get('/MaintenanceGps', [MaintenanceGpsController::class, 'index']);
    Route::get('/item_data_maintenanace_gps', [MaintenanceGpsController::class, 'item_data']);
    Route::get('/add_form_maintenanace_gps', [MaintenanceGpsController::class, 'add_form']);
    Route::get('/store_maintenanceGps', [MaintenanceGpsController::class, 'store']);
    Route::get('/destroy_maintenanceGps/{id}', [MaintenanceGpsController::class, 'destroy']);
    Route::get('/edit_form_maintenanceGps/{id}', [MaintenanceGpsController::class, 'edit_form']);
    Route::get('/dependentMaintenanceGpsCompany/{id}', [MaintenanceGpsController::class, 'dependentCompany']);
    Route::get('/dependentMaintenanceGpsTanggal/{id}', [MaintenanceGpsController::class, 'dependentTanggal']);
    Route::get('/dependentMaintenanceGpsPermasalahan/{id}', [MaintenanceGpsController::class, 'dependentPermasalahan']);
    Route::get('/dependentMaintenanceGpsEquipmentGps/{id}', [MaintenanceGpsController::class, 'dependentEquipmentGps']);
    Route::get('/update_maintenanceGps/{id}', [MaintenanceGpsController::class, 'update']);
    Route::get('/selectedDelete_maintenanceGps', [MaintenanceGpsController::class, 'deleteAll']);
    Route::get('/selected_maintenanceGps', [MaintenanceGpsController::class, 'selected']);

     //Dashboar Visit Assignment
     Route::get('/dashboard_visit_assignment', [DashboardVisitAssignmentController::class, 'index']);


});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

