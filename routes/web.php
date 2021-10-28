<?php


use App\Http\Controllers\UsernameController;
use App\Http\Controllers\DetailCustomerController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\DashboardCustomerController;
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
use App\Http\Controllers\RequestComplaintController;
use App\Http\Controllers\MasterPoController;
use App\Models\DetailCustomer;
use App\Http\Controllers\GsmMasterController;
use App\Http\Controllers\VehicleController;
use App\Models\Username;
use Faker\Guesser\Name;
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
    return view('welcome');
    //auth.login
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Auth::routes();

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


    Route::get('/summary', [SummaryController::class, 'index'])->name('summary');
    Route::get('/item_summary', [SummaryController::class, 'item_data'])->name('item_summary');
    Route::get('/add_summary', [DetailCustomerController::class, 'add_form'])->name('add_summary');

    Route::get('/apioslog', [UsernameController::class, 'getApi']);
    
    Route::get('/api', [UsernameController::class, 'Api']);

    Route::get('/dashboard_customer', [DashboardCustomerController::class, 'index'])->name('dashboard_customer');


    // Company
    Route::get('/Company', [CompanyController::class, 'index'])->name('company');
    Route::get('/item_data_company', [CompanyController::class, 'item_data']);
    Route::get('/add_form_company', [CompanyController::class, 'add_form']);
    Route::get('/store_company', [CompanyController::class, 'store']);
    Route::get('/destroy_company/{id}', [CompanyController::class, 'destroy']);
    Route::get('/show_company/{id}', [CompanyController::class, 'show']);
    Route::get('/update_company/{id}', [CompanyController::class, 'update']);
    Route::get('/selectedDelete_company', [CompanyController::class, 'deleteAll']);
    Route::get('/selected', [CompanyController::class, 'selected']);
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

    //gsm pre active
    Route::get('/GsmPreActive', [GsmPreActiveController::class, 'index'])->name('GsmPreActive');
    Route::get('/item_data_GsmPreActive', [GsmPreActiveController::class, 'item_data']);
    Route::get('/add_form_GsmPreActive', [GsmPreActiveController::class, 'add_form']);
    Route::get('/store_GsmPreActive', [GsmPreActiveController::class, 'store']);
    Route::get('/destroy_GsmPreActive/{id}', [GsmPreActiveController::class, 'destroy']);
    Route::get('/show_GsmPreActive/{id}', [GsmPreActiveController::class, 'edit_form']);
    Route::get('/update_GsmPreActive/{id}', [GsmPreActiveController::class, 'update']);
    Route::get('/selectedDelete_GsmPreActive', [GsmPreActiveController::class, 'deleteAll']);
    Route::get('/selected_gps_pre_active', [GsmPreActiveController::class, 'selected']);
    Route::get('/update_all/{id}', [GsmPreActiveController::class, 'updateall']);

    // detail customer
    Route::get('/detail_customer', [DetailCustomerController::class, 'index'])->name('detail_customer');
    Route::get('/item_detail/{id}', [DetailCustomerController::class, 'item_data'])->name('item_detail');
    Route::get('/add_form_detail/{id}', [DetailCustomerController::class, 'add_form'])->name('add_detail');
    Route::get('/store_detail', [DetailCustomerController::class, 'store']);
    Route::get('/destroy_detail/{id}', [DetailCustomerController::class, 'destroy']);
    Route::get('/show_detail/{id}', [DetailCustomerController::class, 'edit_form']);
    Route::get('/update_detail/{id}', [DetailCustomerController::class, 'update']);
    Route::get('/selectedDelete_detail', [DetailCustomerController::class, 'deleteAll']);
    Route::get('/selected_detail', [DetailCustomerController::class, 'selected']);
    Route::get('/update_all/{id}', [DetailCustomerController::class, 'updateall']);
    Route::get('/coba', [DetailCustomerController::class, 'coba']);
    Route::get('/based_company/{id}', [DetailCustomerController::class, 'basedCompany']);
    Route::get('/based_imei/{id}', [DetailCustomerController::class, 'basedImei']);
    Route::get('/based_gsm/{id}', [DetailCustomerController::class, 'basedGsm']);
    Route::get('/based_sensor/{id}', [DetailCustomerController::class, 'basedSensor']);
    Route::get('/based_license/{id}', [DetailCustomerController::class, 'basedLicense']);
    Route::get('/based_po/{id}', [DetailCustomerController::class, 'basedPO']);
    Route::get('/based_ponumber/{id}', [DetailCustomerController::class, 'basedPonumber']);
    // Route::get('/based_sensor/{id}', [DetailCustomerController::class, 'basedSensorName']);
    Route::get('/based_serialnumber/{id}', [DetailCustomerController::class, 'basedSerialNumber']);

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

    // Request Complain
    Route::get('/RequestComplain', [RequestComplaintController::class, 'index'])->name('request.complain');
    Route::get('/item_data_RequestComplain', [RequestComplaintController::class, 'item_data']);
    Route::get('/add_form_RequestComplain', [RequestComplaintController::class, 'add_form']);
    Route::get('/store_RequestComplain', [RequestComplaintController::class, 'store']);
    Route::get('/destroy_RequestComplain/{id}', [RequestComplaintController::class, 'destroy']);
    Route::get('/show_RequestComplain/{id}', [RequestComplaintController::class, 'edit_form']);
    Route::get('/update_RequestComplain/{id}', [RequestComplaintController::class, 'update']);
    Route::get('/selectedDelete_RequestComplain', [RequestComplaintController::class, 'deleteAll']);
    Route::get('/selected', [RequestComplaintController::class, 'selected']);
    Route::get('/update_all/{id}', [RequestComplaintController::class, 'updateall']);

    Route::get('/count', [SummaryController::class, 'countPo']);
    Route::get('/filter', [SummaryController::class, 'filter']); 
    Route::get('/data-po', [SummaryController::class, 'DataPo']); 
    Route::get('/item_summary', [SummaryController::class, 'item_summary']);

    Route::get('/detail/{id}', [DetailCustomerController::class, 'Test'])->name('detail');

     //Master PO
     Route::get('/master_po', [MasterPoController::class, 'index'])->name('master_po');
     Route::get('/item_data_master_po', [MasterPoController::class, 'item_data'])->name('item_master_po');
     Route::get('/add_form_master_po', [MasterPoController::class, 'add_form'])->name('add_master_po');
     Route::get('/store_master_po', [MasterPoController::class, 'store']);
     Route::get('/destroy_master_po/{id}', [MasterPoController::class, 'destroy']);
     Route::get('/show_master_po/{id}', [MasterPoController::class, 'edit_form']);
     Route::get('/update_master_po/{id}', [MasterPoController::class, 'update']);
     Route::get('/selectedDelete_master_po', [MasterPoController::class, 'deleteAll']);
     Route::get('/selected_master_po', [MasterPoController::class, 'selected']);
     Route::get('/update_all/{id}', [MasterPoController::class, 'updateall']);
     Route::get('/item_data_All_master_po', [MasterPoController::class, 'item_data']);
     Route::get('/item_data_beli_master_po', [MasterPoController::class, 'item_data_Beli']);
     Route::get('/item_data_sewa_master_po', [MasterPoController::class, 'item_data_Sewa']);
     Route::get('/item_data_sewa_beli_master_po', [MasterPoController::class, 'item_data_Sewa_Beli']);
     Route::get('/item_data_trial_master_po', [MasterPoController::class, 'item_data_Trial']);
     Route::get('/filter_company/{id}', [MasterPoController::class, 'filter_company']);

     Route::get('/Vehicle', [VehicleController::class, 'index'])->name('company');
     Route::get('/item_data_vehicle', [VehicleController::class, 'item_data']);
     Route::get('/add_form_vehicle', [VehicleController::class, 'add_form']);
     Route::get('/store_vehicle', [VehicleController::class, 'store']);
     Route::get('/destroy_vehicle/{id}', [VehicleController::class, 'destroy']);
     Route::get('/show_vehicle/{id}', [VehicleController::class, 'show']);
     Route::get('/update_vehicle/{id}', [VehicleController::class, 'update']);
     Route::get('/selectedDelete_vehicle', [VehicleController::class, 'deleteAll']);
     Route::get('/selected_vehicle', [VehicleController::class, 'selected']);
     Route::get('/update_all/{id}', [VehicleController::class, 'updateall']);
     Route::get('/dependent_company/{id}', [CompanyController::class, 'dependentCompany']);
     Route::get('/show_no_agreement/{id}', [CompanyController::class, 'showAgreement']);

     Route::get('/cek', [MasterPoController::class, 'check']);
   
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
