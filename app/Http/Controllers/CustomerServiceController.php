<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Auth;
use App\Models\Company;
use App\Models\DetailCustomer;
use App\Models\Gps;
use App\Models\Gsm;
use App\Models\RequestComplaint;
use App\Models\Sensor;
use App\Models\Username;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class CustomerServiceController extends Controller
{
    //
    public function index()
    {

        $company = Company::all();
        $gps = Gps::all();
        $vehicle = Vehicle::all();
        $sensor = Sensor::all();
        $gsm = Gsm::all();
        $request = RequestComplaint::all();
        $visit = RequestComplaint::whereIn('task', [1,  3, 4, 5])->get();


        $username = Username::where('id', 3)->count();
        return view('home.cs')->with([
            'company' => $company,
            'gps' => $gps,
            'vehicle' => $vehicle,
            'sensor' => $sensor,
            'username' => $username,
            'gsm' => $gsm,
            'request' => $request,
            'visit' => $visit

        ]);
    }
    public function utama()
    {
        return view('partials.v_login');
    }

    public function company_home()
    {
        // $data = Company::groupBy('seller_id')->selectRaw('count(company_name) as jumlah_company, seller_id')->get();
        $company = Company::groupBy('seller_id')->select('seller_id')->get();

        for ($i = 0; $i < count($company); $i++) {
            $a = $company[$i]->seller_id;
            $cari_company = Company::where('seller_id', $a)->get();
            // dd($cari_company);
            $total_company_installed = Company::where('seller_id', $a)->select(DB::raw('count(company_name) as total_company'))->get();
            // dd($total_company_installed);
            $company[$i]["company"] = $cari_company;
            $company[$i]["total_company"] = $total_company_installed;
        }

        // return $company;
        return view('home.company', compact('company'));
    }
    public function gps_home()
    {
        // $data_total_merk = Gps::groupBy('merk')->selectRaw('count(merk) as jumlah_merk, merk')->get();
        // $data_total_type = Gps::groupBy('type')->selectRaw('count(type) as jumlah_type, type')->get();
        // $data_total_status = Gps::groupBy('status')->selectRaw('count(status) as jumlah_status, status')->get();
        $gps = Gps::groupBy('status')->select('status')->get();
        // $gps = Gps::groupBy('type')->select('type')->get();


        for ($i = 0; $i < count($gps); $i++) {
            $a = $gps[$i]->status;

            $cari_type = Gps::groupBy('type')->where('status', $a)->select('type')->get();
            // dd($cari_company);
            $total_status_installed = Gps::where('status', $a)->select(DB::raw('count(status) as total_status'))->get();
            $total_type_installed = Gps::groupBy('type')->where('status', $a)->select(DB::raw('count(type) as total_pertype,type'))->get();


            $gps[$i]["type"] = $cari_type;
            // $gps[$i]["type"] = array_unique($gps[$i]["type"]);
            $gps[$i]["total_pertype"] = $total_type_installed;

            $gps[$i]["total_status"] = $total_status_installed;
        }


        // return $gps;


        return view('home.gps', compact('gps'));
    }

    public function sensor_home()
    {
        $sensor = Gps::groupBy('status')->select('status')->get();
        // $sensor = Gps::groupBy('type')->select('type')->get();


        for ($i = 0; $i < count($sensor); $i++) {
            $a = $sensor[$i]->status;

            $cari_sensor_name = Sensor::groupBy('sensor_name')->where('status', $a)->select('sensor_name')->get();
            // dd($cari_company);
            $total_status_installed = Sensor::where('status', $a)->select(DB::raw('count(status) as total_status'))->get();
            $total_sensor_name_installed = Sensor::groupBy('sensor_name')->where('status', $a)->select(DB::raw('count(sensor_name) as total_persensor_name,sensor_name'))->get();


            $sensor[$i]["sensor_name"] = $cari_sensor_name;
            // $gps[$i]["sensor_name"] = array_unique($gps[$i]["sensor_name"]);
            $sensor[$i]["total_persensor_name"] = $total_sensor_name_installed;
            $sensor[$i]["total_status"] = $total_status_installed;
        }


        return view('home.sensor', compact('sensor'));
    }

    public function gsm_home()
    {
        // $data = Gsm::groupBy('company_id')->selectRaw('count(gsm_number) as jumlah_gsm, company_id')->get();
        $status = Gsm::groupBy('status_gsm')->selectRaw('count(status_gsm) as jumlah_status_gsm, status_gsm')->get();
        $gsm_no_assign = Gsm::where('was_maintenance', '1')->get();

        $GsmMaster = Gsm::orderBy('id', 'DESC')->where('was_maintenance', '1')->get();
        return view('home.gsm', compact('GsmMaster', 'status', 'gsm_no_assign'));
    }
    public function request_home()
    {
        $request = RequestComplaint::groupBy('status')->where('internal_eksternal', 'Request Eksternal', 'Request Internal')->selectRaw('count(internal_eksternal) as jumlah_status_request, status')->get();
        // return $request;
        $complain = RequestComplaint::groupBy('status')->where('internal_eksternal', 'Complain Internal', 'Complain Internal')->selectRaw('count(internal_eksternal) as jumlah_status_complaint, status')->get();
        // return $complain;
        return view('home.request', compact('complain', 'request'));
    }

    public function vehicle_home()
    {
        $vehicle = DetailCustomer::groupBy('company_id')->select('company_id')->get();


        for ($i = 0; $i < count($vehicle); $i++) {
            $a = $vehicle[$i]->company_id;

            $cari_vehicle_type = Vehicle::groupBy('vehicle_id')->where('company_id', $a)->select('vehicle_id')->get();
            // dd($cari_company);
            $total_vehicle_type_installed = DetailCustomer::where('company_id', $a)->select(DB::raw('count(vehicle_id) as total_vehicletype'))->get();
            // $total_vehicleperType_installed = DetailCustomer::groupBy('')->where('company_id', $a)->select(DB::raw('count(vehicle_id) as total_pervehicle_type,vehicle_id'))->get();


            $vehicle[$i]["vehicle_type"] = $cari_vehicle_type;

            $vehicle[$i]["total_vehicletype"] = $total_vehicle_type_installed;
        }
        // return $vehicle;
        return view('home.vehicle', compact('vehicle'));
    }


    public function visit_home()
    {
        // $visit = RequestComplaint::groupBy('company_id')->select('company_id')->get();
        // for ($i = 0; $i < count($visit); $i++) {
        //     $a = $visit[$i]->company_id;

        //     $cari_company = RequestComplaint::groupBy('status')->where('company_id', $a)->select('status',)->get();
        //     return $cari_company;
        //     $total_vehicle_type_installed = DetailCustomer::where('company_id', $a)->select(DB::raw('count(vehicle_id) as total_vehicletype'))->get();
        //     // $total_vehicleperType_installed = DetailCustomer::groupBy('')->where('company_id', $a)->select(DB::raw('count(vehicle_id) as total_pervehicle_type,vehicle_id'))->get();


        //     $visit[$i]["vehicle_type"] = $cari_company;

        //     $visit[$i]["total_vehicletype"] = $total_vehicle_type_installed;
        // }

        $pemasangan = RequestComplaint::groupBy('status')->where('task', 1)->selectRaw('count(task) as jumlah_status_pemasangan, status')->get();
        // return $pemasangan;
        $mutasi = RequestComplaint::groupBy('status')->where('task', 3)->selectRaw('count(task) as jumlah_status_mutasi, status')->get();
        // return $mutasi;
        $maintenance_gps = RequestComplaint::groupBy('status')->where('task', 4)->selectRaw('count(task) as jumlah_status_maintenance_gps, status')->get();
        $maintenance_sensor = RequestComplaint::groupBy('status')->where('task', 5)->selectRaw('count(task) as jumlah_status_maintenance_sensor, status')->get();

        // return $maintenance_sensor;
        return view('home.visit', compact('mutasi', 'pemasangan', 'maintenance_sensor', 'maintenance_gps'));
    }
}
