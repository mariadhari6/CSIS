<?php


use App\Http\Controllers\UsernameController;
use App\Http\Controllers\DetailCustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChangePasswordController;
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
use App\Http\Controllers\DashboardCustomerController;
use App\Http\Controllers\DashboardVisitAssignmentController;

use App\Http\Controllers\RequestComplaintController;
use App\Http\Controllers\MasterPoController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\MaintenanceGpsController;
use App\Http\Controllers\MerkGpsController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SensorNameController;
use App\Http\Controllers\StatusLayananController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleTypeController;
use App\Models\DetailCustomer;
use App\Models\PemasanganMutasiGps;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(
    ['middleware' => ['role:superAdmin']],
    function () {
        Route::get('/super_admin', [AdminController::class, 'index'])->name('admin.homepage');


        // Edit Password

        // User
        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::get('/item_data_user', [UserController::class, 'item_data']);
        Route::get('/add_form_user', [UserController::class, 'add_form']);
        Route::get('/store_user', [UserController::class, 'store']);
        Route::get('/destroy_user/{id}', [UserController::class, 'destroy']);
        Route::get('/edit_form_user/{id}', [UserController::class, 'edit_form']);
        Route::get('/update_user/{id}', [UserController::class, 'update']);

        //merk gps

        Route::get('/merk_gps', [MerkGpsController::class, 'index'])->name('merkgps');
        Route::get('/item_data_merkGps', [MerkGpsController::class, 'item_data']);
        Route::get('/add_form_merkGps', [MerkGpsController::class, 'add_form']);
        Route::get('/store_merkGps', [MerkGpsController::class, 'store']);
        Route::get('/destroy_merkGps/{id}', [MerkGpsController::class, 'destroy']);
        Route::get('/edit_form_merkGps/{id}', [MerkGpsController::class, 'show']);
        Route::get('/update_merkGps/{id}', [MerkGpsController::class, 'update']);

        //merk gps

        Route::get('/sales', [SalesController::class, 'index'])->name('sales');
        Route::get('/item_data_sales', [SalesController::class, 'item_data']);
        Route::get('/add_form_sales', [SalesController::class, 'add_form']);
        Route::get('/store_sales', [SalesController::class, 'store']);
        Route::get('/destroy_sales/{id}', [SalesController::class, 'destroy']);
        Route::get('/edit_form_sales/{id}', [SalesController::class, 'show']);
        Route::get('/update_sales/{id}', [SalesController::class, 'update']);
        //merk gps

        Route::get('/sensor_name', [SensorNameController::class, 'index'])->name('sensor_name');
        Route::get('/item_data_sensor_name', [SensorNameController::class, 'item_data']);
        Route::get('/add_form_sensor_name', [SensorNameController::class, 'add_form']);
        Route::get('/store_sensor_name', [SensorNameController::class, 'store']);
        Route::get('/destroy_sensor_name/{id}', [SensorNameController::class, 'destroy']);
        Route::get('/edit_form_sensor_name/{id}', [SensorNameController::class, 'show']);
        Route::get('/update_sensor_name/{id}', [SensorNameController::class, 'update']);

        //Status Layanan

        Route::get('/status_layanan', [StatusLayananController::class, 'index'])->name('status_layanan');
        Route::get('/item_data_status_layanan', [StatusLayananController::class, 'item_data']);
        Route::get('/add_form_status_layanan', [StatusLayananController::class, 'add_form']);
        Route::get('/store_status_layanan', [StatusLayananController::class, 'store']);
        Route::get('/destroy_status_layanan/{id}', [StatusLayananController::class, 'destroy']);
        Route::get('/edit_form_status_layanan/{id}', [StatusLayananController::class, 'show']);
        Route::get('/update_status_layanan/{id}', [StatusLayananController::class, 'update']);
        //task
        Route::get('/task', [TaskController::class, 'index'])->name('task');
        Route::get('/item_data_task', [TaskController::class, 'item_data']);
        Route::get('/add_form_task', [TaskController::class, 'add_form']);
        Route::get('/store_task', [TaskController::class, 'store']);
        Route::get('/destroy_task/{id}', [TaskController::class, 'destroy']);
        Route::get('/edit_form_task/{id}', [TaskController::class, 'show']);
        Route::get('/update_task/{id}', [TaskController::class, 'update']);

        //teknisi
        Route::get('/teknisi_data', [TeknisiController::class, 'index_data'])->name('teknisi');
        Route::get('/item_data_teknisi', [TeknisiController::class, 'item_data']);
        Route::get('/add_form_teknisi', [TeknisiController::class, 'add_form']);
        Route::get('/store_teknisi', [TeknisiController::class, 'store']);
        Route::get('/destroy_teknisi/{id}', [TeknisiController::class, 'destroy']);
        Route::get('/edit_form_teknisi/{id}', [TeknisiController::class, 'show']);
        Route::get('/update_teknisi/{id}', [TeknisiController::class, 'update']);

        //vehicle_type
        Route::get('/vehicle_type', [VehicleTypeController::class, 'index'])->name('vehicle_type');
        Route::get('/item_data_vehicle_type', [VehicleTypeController::class, 'item_data']);
        Route::get('/add_form_vehicle_type', [VehicleTypeController::class, 'add_form']);
        Route::get('/store_vehicle_type', [VehicleTypeController::class, 'store']);
        Route::get('/destroy_vehicle_type/{id}', [VehicleTypeController::class, 'destroy']);
        Route::get('/edit_form_vehicle_type/{id}', [VehicleTypeController::class, 'show']);
        Route::get('/update_vehicle_type/{id}', [VehicleTypeController::class, 'update']);
    }
);

Route::group(['middleware' => ['role:superAdmin|cs|teknisi']], function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout_odm');

    Route::get('change-password', [ChangePasswordController::class, 'index']);
    Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');
    // Edit Profile
    Route::get('profile',  [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');

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
    Route::post('/save_import_Company', [CompanyController::class, 'save_import']);
    Route::post('/importExcel_Company', [CompanyController::class, 'importExcel'])->name('importExcel_Company');
    Route::get('/download_template_Company', [CompanyController::class, 'export']);
    Route::get('/export_company', [CompanyController::class, 'export_company']);




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
    Route::post('/save_import_pic', [PicController::class, 'save_import']);
    Route::post('/importExcel_pic', [PicController::class, 'importExcel'])->name('importExcel_pic');
    Route::get('/download_template_pic', [PicController::class, 'export']);
    Route::get('/export_Pic', [PicController::class, 'export_pic']);


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
    Route::post('/save_import_seller', [SellerController::class, 'save_import']);
    Route::post('/importExcel_seller', [SellerController::class, 'importExcel'])->name('importExcel_seller');
    Route::get('/download_template_seller', [SellerController::class, 'export']);
    Route::get('/export_seller', [SellerController::class, 'export_seller']);
    Route::get('/item_data_search_Seller', [SellerController::class, 'item_data_search']);
    Route::get('/item_data_page_length_Seller', [SellerController::class, 'item_data_page_length']);



    // GSM Aktiv
    Route::get('/GsmActive', [GsmActiveController::class, 'index'])->name('GsmActive');
    Route::get('/item_data_GsmActive', [GsmActiveController::class, 'item_data']);
    Route::get('/item_data_MY_GsmActive', [GsmActiveController::class, 'item_data_MY']);
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
    Route::get('/item_data_MY_GsmTerminate', [GsmTerminateController::class, 'item_data_MY']);
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
    Route::post('/save_import_sensor', [SensorController::class, 'save_import']);
    Route::post('/importExcel_sensor', [SensorController::class, 'importExcel'])->name('importExcel_sensor');
    Route::get('/download_template_sensor', [SensorController::class, 'export']);
    Route::get('/item_data_search_Sensor', [SensorController::class, 'item_data_search']);
    Route::get('/item_data_page_length_Sensor', [SensorController::class, 'item_data_page_length']);



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
    // Route::put('/import_gps', [GpsController::class, 'ImportGps']);
    Route::post('/importExcel_gps', [GpsController::class, 'importExcel'])->name('importExcel_gps');
    Route::get('/item_data_temporary_GpsMaster', [GpsController::class, 'item_data_temporary']);
    Route::get('/delete_temporary_gps', [GpsController::class, 'deleteTemporary']);
    Route::get('/download_template_gps', [GpsController::class, 'export']);
    // Route::get('/try', [GpsController::class, 'try']);
    Route::post('/save_import_gps', [GpsController::class, 'save_import']);
    Route::get('/based_merksensor/{id}', [GpsController::class, 'basedType']);
    Route::get('/export_gps', [GpsController::class, 'export_gps']);






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
    Route::post('/save_import_GsmMaster', [GsmMasterController::class, 'save_import']);
    Route::get('/destroy_GsmMaster/{id}', [GsmMasterController::class, 'destroy']);
    Route::get('/show_GsmMaster/{id}', [GsmMasterController::class, 'edit_form']);
    Route::get('/update_GsmMaster/{id}', [GsmMasterController::class, 'update']);
    Route::get('/selectedDelete_GsmMaster', [GsmMasterController::class, 'deleteAll']);
    Route::get('/selected_GsmMaster', [GsmMasterController::class, 'selected']);
    Route::get('/update_all/{id}', [GsmMasterController::class, 'updateall']);
    Route::post('/importExcel_GsmMaster', [GsmMasterController::class, 'importExcel'])->name('importExcel_GsmMaster');
    Route::get('/delete_temporary', [GsmMasterController::class, 'deleteTemporary']);
    Route::get('/download_template_gsm', [GsmMasterController::class, 'export']);
    Route::get('/export_gsm_master', [GsmMasterController::class, 'export_gsm']);
    Route::get('/item_data_search_GsmMaster', [GsmMasterController::class, 'item_data_search']);
    Route::get('/item_data_page_length_GsmMaster', [GsmMasterController::class, 'item_data_page_length']);

    // try
    Route::get('/try', [GsmMasterController::class, 'try']);

    // //Request and Complent Customer
    // Route::get('/request_complent_customer', [RequestComplentCustomerController::class, 'index'])->name('request_complent_customer');
    // Route::get('/item_data_reqcomp_cust', [RequestComplentCustomerController::class, 'item_data'])->name('item_data_reqcomp_cust');

    //detail customer
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
    Route::get('/based_imeiDetail/{id}', [DetailCustomerController::class, 'basedImei']);
    Route::get('/based_gsm/{id}', [DetailCustomerController::class, 'basedGsm']);
    Route::get('/based_sensor/{id}', [DetailCustomerController::class, 'basedSensor']);
    Route::get('/based_license/{id}', [DetailCustomerController::class, 'basedLicense']);
    Route::get('/based_po/{id}', [DetailCustomerController::class, 'basedPO']);
    Route::get('/based_ponumber/{id}', [DetailCustomerController::class, 'basedPonumber']);
    // Route::get('/based_sensor/{id}', [DetailCustomerController::class, 'basedSensorName']);
    Route::get('/based_serialnumber/{id}', [DetailCustomerController::class, 'basedSerialNumber']);
    Route::get('/detail/{id}', [DetailCustomerController::class, 'Test'])->name('detail');
    Route::get('/export_detail_customer', [DetailCustomerController::class, 'export_detail']);
    Route::get('/export_detail_cust_company/{id}', [DetailCustomerController::class, 'export']);
    Route::get('/item_data_all_status/{id}', [DetailCustomerController::class, 'item_data']);
    Route::get('/item_data_active/{id}', [DetailCustomerController::class, 'Active']);
    Route::get('/item_data_inactive/{id}', [DetailCustomerController::class, 'InActive']);



    // Pemasangan Mutasi GPS
    Route::get('/PemasanganMutasi', [PemasanganMutasiGpsController::class, 'index'])->name('PesanganMutasi');
    Route::get('/item_data_PemasanganMutasi', [PemasanganMutasiGpsController::class, 'item_data']);
    Route::get('/item_data_MY_PemasanganMutasi', [PemasanganMutasiGpsController::class, 'item_data_MY']);
    Route::get('/add_form_PemasanganMutasi', [PemasanganMutasiGpsController::class, 'add_form']);
    Route::get('/store_PemasanganMutasi', [PemasanganMutasiGpsController::class, 'store']);
    Route::get('/destroy_PemasanganMutasi/{id}', [PemasanganMutasiGpsController::class, 'destroy']);
    Route::get('/show_PemasanganMutasi/{id}', [PemasanganMutasiGpsController::class, 'edit_form']);
    Route::get('/update_PemasanganMutasi/{id}', [PemasanganMutasiGpsController::class, 'update']);
    Route::get('/selectedDelete_PemasanganMutasi', [PemasanganMutasiGpsController::class, 'deleteAll']);
    Route::get('/selected_PemasanganMutasi', [PemasanganMutasiGpsController::class, 'selected']);
    Route::get('/update_all/{id}', [PemasanganMutasiGpsController::class, 'updateall']);
    Route::get('/item_data_onProgress_pemasangan', [PemasanganMutasiGpsController::class, 'item_data_onProgress'])->name('item_data_onprogress');
    Route::get('/item_data_done_pemasangan', [PemasanganMutasiGpsController::class, 'item_data_done'])->name('item_data_done');
    Route::get('/item_data_all_pemasangan', [PemasanganMutasiGpsController::class, 'item_data']);
    Route::get('/based_sensor/{id}', [PemasanganMutasiGpsController::class, 'basedSensor']);
    // Route::get('/based_sensor/{id}', [PemasanganMutasiGpsController::class, 'basedSensorName']);
    Route::get('/based_serialnumber/{id}', [PemasanganMutasiGpsController::class, 'basedSerialNumber']);
    Route::get('/based_vehiclePemasangan/{id}', [PemasanganMutasiGpsController::class, 'basedVehicle']);
    Route::get('/based_imei/{id}', [PemasanganMutasiGpsController::class, 'basedImei']);
    Route::get('/based_kendaraanPasang/{id}', [PemasanganMutasiGpsController::class, 'basedKendaraanPasang']);
    Route::get('/export_pemasangan_mutasi_GPS', [PemasanganMutasiGpsController::class, 'export_pemasangan']);



    // Route::get('/dependent_pemasanganmutasi/{id}', [PemasanganMutasiGpsController::class, 'dependentPemasangan']);
    // Route::get('/dependent_JenisPekerjaan/{id}', [PemasanganMutasiGpsController::class, 'dependentJenisPekerjaan']);
    // Route::get('/dependent_KendaraanPasang/{id}', [PemasanganMutasiGpsController::class, 'dependentKendaraanPasang']);

    Route::get('/dependent_pemasanganmutasi/{id}', [PemasanganMutasiGpsController::class, 'dependentPemasangan']);
    Route::get('/dependent_JenisPekerjaan/{id}', [PemasanganMutasiGpsController::class, 'dependentJenisPekerjaan']);
    // Route::get('/dependent_KendaraanPasang/{id}', [PemasanganMutasiGpsController::class, 'dependentKendaraanPasang']);
    // Request Complain
    Route::get('/RequestComplain', [RequestComplaintController::class, 'index'])->name('request.complain');
    Route::get('/item_data_RequestComplain', [RequestComplaintController::class, 'item_data']);
    Route::get('/item_data_MY_RequestComplain', [RequestComplaintController::class, 'item_data_MY']);
    Route::get('/item_data_all_RequestComplain', [RequestComplaintController::class, 'item_data']);
    Route::get('/item_data_Request_Internal_RequestComplain', [RequestComplaintController::class, 'item_data_Request_Internal']);
    Route::get('/item_data_Request_Eksternal_RequestComplain', [RequestComplaintController::class, 'item_data_Request_Eksternal']);
    Route::get('/item_data_Complain_Internal_RequestComplain', [RequestComplaintController::class, 'item_data_Complain_Internal']);
    Route::get('/item_data_Complain_Eksternal_RequestComplain', [RequestComplaintController::class, 'item_data_Complain_Eksternal']);
    Route::get('/add_form_RequestComplain', [RequestComplaintController::class, 'add_form']);
    Route::get('/store_RequestComplain', [RequestComplaintController::class, 'store']);
    Route::get('/destroy_RequestComplain/{id}', [RequestComplaintController::class, 'destroy']);
    Route::get('/show_RequestComplain/{id}', [RequestComplaintController::class, 'edit_form']);
    Route::get('/update_RequestComplain/{id}', [RequestComplaintController::class, 'update']);
    Route::get('/selectedDelete_RequestComplain', [RequestComplaintController::class, 'deleteAll']);
    Route::get('/selected_detail', [RequestComplaintController::class, 'selected']);
    Route::get('/update_all/{id}', [RequestComplaintController::class, 'updateall']);
    Route::get('/based_pic/{id}', [RequestComplaintController::class, 'basedPic']);
    Route::get('/based_vehicleRequest/{id}', [RequestComplaintController::class, 'basedVehicle']);
    Route::get('/based_internal_eksternal', [RequestComplaintController::class, 'basedInternalEksternal']);
    Route::get('/based_pemasangan/{id}', [RequestComplaintController::class, 'basedPemasangan']);
    Route::get('/Dashboard_RequestComplain', [RequestComplaintController::class, 'dashboard']);
    Route::get('/export_request_complaint', [RequestComplaintController::class, 'export_request']);

    Route::get('/Dashboard_Visit_Assignment', [DashboardVisitAssignmentController::class, 'dashboard']);

    // Maintenance GPS
    Route::get('/MaintenanceGps', [MaintenanceGpsController::class, 'index']);
    Route::get('/item_data_maintenanace_gps', [MaintenanceGpsController::class, 'item_data']);
    Route::get('/item_data_MY_Maintennace', [MaintenanceGpsController::class, 'item_data_MY']);
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
    Route::get('/item_data_onProgress_maintenance', [MaintenanceGpsController::class, 'item_data_onProgress']);
    Route::get('/item_data_done_maintenance', [MaintenanceGpsController::class, 'item_data_done']);
    Route::get('/item_data_all_maintenance', [MaintenanceGpsController::class, 'item_data']);
    // Route::get('/based_sensor/{id}', [MaintenanceGpsController::class, 'basedSensor']);
    // Route::get('/based_sensor/{id}', [MaintenanceGpsController::class, 'basedSensorName']);
    // Route::get('/based_serialnumber/{id}', [MaintenanceGpsController::class, 'basedSerialNumber']);
    Route::get('/based_vehicleMaintenance/{id}', [MaintenanceGpsController::class, 'basedVehicle']);
    Route::get('/based_typegps/{id}', [MaintenanceGpsController::class, 'basedGps']);
    Route::get('/export_maintenance', [MaintenanceGpsController::class, 'export_maintenance']);

    // Master PO
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
    Route::get('/item_data_All_company_master_po', [MasterPoController::class, 'item_data']);
    Route::post('/save_import_masterPo', [MasterPoController::class, 'save_import']);
    Route::post('/importExcel_masterPo', [MasterPoController::class, 'importExcel'])->name('importExcel_masterPo');
    Route::get('/download_template_masterPo', [MasterPoController::class, 'export']);
    Route::get('/export_MasterPO', [MasterPoController::class, 'export_masterPO']);
    Route::get('/item_data_search_MasterPo', [MasterPoController::class, 'item_data_search']);
    Route::get('/item_data_page_length_MasterPo', [MasterPoController::class, 'item_data_page_length']);


    //Dashboar Visit Assignment
    Route::get('/dashboard_visit_assignment', [DashboardVisitAssignmentController::class, 'index']);

    // Vehicle
    Route::get('/Vehicle', [VehicleController::class, 'index'])->name('vehicle');
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
    Route::post('/save_import_MasterVehicle', [VehicleController::class, 'save_import']);
    Route::post('/importExcel_MasterVehicle', [VehicleController::class, 'importExcel'])->name('importExcel_MasterVehicle');
    Route::get('/download_template_MasterVehicle', [VehicleController::class, 'export']);
    Route::get('/export_vehicle', [VehicleController::class, 'export_vehicle']);
    Route::get('/item_data_search_Vehicle', [VehicleController::class, 'item_data_search']);
    Route::get('/item_data_page_length_Vehicle', [VehicleController::class, 'item_data_page_length']);

    Route::get('/cek', [MasterPoController::class, 'check']);

    //Summary Detail Customer
    Route::get('/count', [SummaryController::class, 'countPo']);
    Route::get('/filter', [SummaryController::class, 'filter']);
    Route::get('/data-po', [SummaryController::class, 'DataPo']);
    Route::get('/item_summary', [SummaryController::class, 'item_summary']);
    Route::get('/summary', [SummaryController::class, 'index'])->name('summary');
    Route::get('/item_summary', [SummaryController::class, 'item_summary'])->name('item_summary');
    Route::get('/add_summary', [DetailCustomerController::class, 'add_form'])->name('add_summary');

    // // dashboard home
    Route::get('/item_data_Homecompany', [CustomerServiceController::class, 'company_home']);
    Route::get('/item_data_Homegps', [CustomerServiceController::class, 'gps_home']);
    Route::get('/item_data_HomeSensor', [CustomerServiceController::class, 'sensor_home']);
    Route::get('/item_data_HomeGsm', [CustomerServiceController::class, 'gsm_home']);
    Route::get('/item_data_HomeRequest', [CustomerServiceController::class, 'request_home']);
    Route::get('/item_data_HomeVehicle', [CustomerServiceController::class, 'vehicle_home']);
    Route::get('/item_data_HomeVisit', [CustomerServiceController::class, 'visit_home']);

    // Dashboard detail customer
    Route::get('/dashboard_customer', [DashboardCustomerController::class, 'index'])->name('dashboard_customer');
    Route::get('/item_data_dashboard_customer', [DashboardCustomerController::class, 'item_data']);
    Route::get('/action_dashboard_customer/{id}', [DashboardCustomerController::class, 'action']);
    Route::get('/update_dashboard_customer/{id}', [DashboardCustomerController::class, 'update']);
    Route::get('/edit_dashboard_customer/{id}', [DashboardCustomerController::class, 'edit']);

    //dashboard

    Route::get('/Dashboard_Visit_Assignment', [DashboardVisitAssignmentController::class, 'dashboard']);

    // Maintenance GPS
    Route::get('/MaintenanceGps', [MaintenanceGpsController::class, 'index']);
    Route::get('/item_data_maintenanace_gps', [MaintenanceGpsController::class, 'item_data']);
    Route::get('/item_data_MY_Maintennace', [MaintenanceGpsController::class, 'item_data_MY']);
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
    Route::get('/item_data_onProgress_maintenance', [MaintenanceGpsController::class, 'item_data_onProgress']);
    Route::get('/item_data_done_maintenance', [MaintenanceGpsController::class, 'item_data_done']);
    Route::get('/item_data_all_maintenance', [MaintenanceGpsController::class, 'item_data']);

    Route::get('/based_vehicleMaintenance/{id}', [MaintenanceGpsController::class, 'basedVehicle']);
    Route::get('/based_typegps/{id}', [MaintenanceGpsController::class, 'basedGps']);
    Route::get('/export_maintenance', [MaintenanceGpsController::class, 'export_maintenance']);

});


Route::group(['middleware' => ['role:cs']], function () {
    Route::get('/customer_service', [CustomerServiceController::class, 'index'])->name('cs.homepage');

});

Route::group(['middleware' => ['role:teknisi']], function () {

    Route::get('/teknisi', [TeknisiController::class, 'index'])->name('teknisi.homepage');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
