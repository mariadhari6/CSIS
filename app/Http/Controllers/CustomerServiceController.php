<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Auth;
use App\Models\Company;
use App\Models\Gps;
use App\Models\Gsm;
use App\Models\Sensor;
use App\Models\Username;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;

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
        $username = Username::where('id', 3)->count();
        return view('home.tes')->with([
            'company' => $company,
            'gps' => $gps,
            'vehicle' => $vehicle,
            'sensor' => $sensor,
            'username' => $username,
            'gsm' => $gsm,



        ]);
    }
    public function utama()
    {
        return view('partials.v_login');
    }

    public function company_home()
    {
        $data = Company::groupBy('seller_id')->selectRaw('count(company_name) as jumlah_company, seller_id')->get();
        return view('home.company', compact('data'));
    }
    public function gps_home()
    {
        $data_total_merk = Gps::groupBy('merk')->selectRaw('count(merk) as jumlah_merk, merk')->get();
        $data_total_type = Gps::groupBy('type')->selectRaw('count(type) as jumlah_type, type')->get();
        $data_total_status = Gps::groupBy('status')->selectRaw('count(status) as jumlah_status, status')->get();


        return view('home.gps', compact('data_total_merk', 'data_total_type', 'data_total_status'));
    }

    public function sensor_home()
    {
        $data_total_name = Sensor::groupBy('sensor_name')->selectRaw('count(sensor_name) as jumlah_sensor, sensor_name')->get();
        $data_total_merk = Sensor::groupBy('merk_sensor')->selectRaw('count(merk_sensor) as jumlah_merk_sensor, merk_sensor')->get();
        $data_total_status = Sensor::groupBy('status')->selectRaw('count(status) as jumlah_status, status')->get();


        return view('home.sensor', compact('data_total_name', 'data_total_merk', 'data_total_status'));
    }

    public function gsm_home()
    {
        $data = Gsm::groupBy('company_id')->selectRaw('count(gsm_number) as jumlah_gsm, company_id')->get();
        $status = Gsm::groupBy('status_gsm')->selectRaw('count(status_gsm) as jumlah_status_gsm, status_gsm')->get();

        return view('home.gsm', compact('data', 'status'));
    }
}
