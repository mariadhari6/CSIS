<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
use App\Models\Company;
use App\Models\Pic;
use App\Models\DetailCustomer;
use Illuminate\Support\Facades\DB;


=======

use App\Models\Company;
use App\Models\Pic;
use App\Models\DetailCustomer;
use App\Models\Sensor;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Support\Facades\DB;



>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
use Illuminate\Http\Request;

class DashboardCustomerController extends Controller
{
<<<<<<< HEAD
    public function index(){

        $company = DetailCustomer::groupBy('company_id')->select('company_id')->get();

        for ($i=0; $i < count($company) ; $i++) { 
            $a = $company[$i]->company_id;
            $cari_pic            = Pic::where('company_id', $a)->get();
            $total_gps_installed = DetailCustomer::where('company_id', $a)->select(DB::raw('count(gps_id) as total_gps_installed'))->get();
            $company[$i]["pic"]  = $cari_pic;
            $company[$i]["total_gps_installed"] = $total_gps_installed;
            
        }

        // return $company;
        return view('customer.dashboard.index')->with([
            'company'   => $company
        ]);

        // return view('customer.dashboard.index');
=======
    public function index()
    {

        return view('customer.dashboard.index');
    }

    public function item_data()
    {

        $company = DetailCustomer::groupBy('company_id')->select('company_id')->get();

        for ($i = 0; $i < count($company); $i++) {
            $a = $company[$i]->company_id;
            $cari_company = Company::where('id', $a)->get();
            $cari_pic            = Pic::where('company_id', $a)->get();
            $total_gps_installed = DetailCustomer::where('company_id', $a)->select(DB::raw('count(gps_id) as total_gps_installed'))->get();
            $total_sensor_installed    = DetailCustomer::where('company_id', $a)->select(DB::raw('sum(jumlah_sensor) as total_sensor_installed'))->get();
            $company[$i]["pic"]  = $cari_pic;
            $company[$i]["total_gps_installed"] = $total_gps_installed;
            $company[$i]["total_sensor_installed"] = $total_sensor_installed;
            $company[$i]["note"] = $cari_company;

            $sensor     = DetailCustomer::where('company_id', $a)->pluck('sensor_all');
            $company[$i]["sensor"] =   $sensor;
            $vehicle    = DetailCustomer::where('company_id', $a)->pluck('vehicle_id');
            $company[$i]['vehicle'] = $vehicle;
        }

        for ($j = 0; $j < count($company); $j++) {
            $sensor_ = array();
            foreach ($company[$j]["sensor"] as $value) {
                if ($value != null) {
                    if (str_contains($value, ' ')) {
                        $exploded = explode(" ", $value);
                        for ($i = 0; $i < count($exploded); $i++) {
                            array_push($sensor_, $exploded[$i]);
                        }
                    } else {
                        array_push($sensor_, $value);
                    }
                }
            }

            // PROSES MENCARI SENSOR NAME
            $unique_sensor = array_unique($sensor_);

            $company[$j]["unique_sensor"] = array_map(function ($sensorId) {
                $sensor_name = Sensor::where('id', $sensorId)->pluck('sensor_name');
                return $sensor_name[0];
            }, $unique_sensor);

            $sens = $company[$j]["unique_sensor"];

            $array_count_values = array_count_values($sens);
            $sensorFinal = array();

            foreach ($array_count_values as $sensorName => $sensorTotal) {
                array_push($sensorFinal, array(
                    "sensor_name" => $sensorName,
                    "sensor_total" => $sensorTotal
                ));
            }

            $company[$j]["sensor"] = $sensorFinal;

            unset($company[$j]["unique_sensor"]);
            //
        }

        for ($i = 0; $i < count($company); $i++) {
            $vehicle_ = array();
            foreach ($company[$i]['vehicle'] as $value) {
                array_push($vehicle_, $value);
            }

            // PROSES CARI VEHICLE TYPE
            $company[$i]["unique_vehicle"] = array_map(function ($vehicleId) {
                $vehicle_id_type = Vehicle::where('id', $vehicleId)->pluck('vehicle_id');
                return $vehicle_id_type[0];
            }, $vehicle_);

            $vehicle_type = array();
            foreach ($company[$i]['unique_vehicle'] as $value) {
                array_push($vehicle_type, $value);
            }

            $company[$i]["vehicle_name"] = array_map(function ($vehicleId) {
                $vehicle_name = VehicleType::where('id', $vehicleId)->pluck('name');
                return $vehicle_name[0];
            }, $vehicle_type);


            $name_vehicle = $company[$i]["vehicle_name"];
            $array_count_values = array_count_values($name_vehicle);
            $vehicleFinal = array();

            foreach ($array_count_values as $vehicleName => $vehicleTotal) {
                array_push($vehicleFinal, array(
                    "vehicle_name" => $vehicleName,
                    "vehicle_total" => $vehicleTotal
                ));
            }

            $company[$i]['vehicle'] = $vehicleFinal;
            //


            // PROSES MENCARI POOL

            $company[$i]["unique_pool_name"] = array_map(function ($vehicleId) {
                $pool_name      = Vehicle::where('id', $vehicleId)->pluck('pool_name');
                return $pool_name[0];
            }, $vehicle_);

            $company[$i]["unique_pool_location"] = array_map(function ($vehicleId) {
                $pool_location  = Vehicle::where('id', $vehicleId)->pluck('pool_location');
                return $pool_location[0];
            }, $vehicle_);


            $pool = $company[$i]["unique_pool_name"];
            $pool_loc = $company[$i]["unique_pool_location"];
            $array_count_values_pool_loc = array_count_values($pool_loc);
            $array_count_values_pool = array_count_values($pool);
            $poolnameFinal = array();
            $poolLocFinal = array();

            foreach ($array_count_values_pool as $poolName => $poolTotal) {
                array_push($poolnameFinal, array(
                    "pool_name" => $poolName,
                    "pool_total" => $poolTotal
                ));
            }

            foreach ($array_count_values_pool_loc as $poolName => $poolTotal) {
                array_push($poolLocFinal, array(
                    "pool_loc" => $poolName,
                ));
            }

            $poolNameLoc = array();

            for ($j = 0; $j < count($poolnameFinal); $j++) {
                array_push($poolNameLoc, array(
                    "pool_name" => $poolnameFinal[$j]["pool_name"],
                    "pool_loc" => $poolLocFinal[$j]["pool_loc"],
                    "pool_total" => $poolnameFinal[$j]["pool_total"]
                ));
            }

            $company[$i]["pool"] = $poolNameLoc;

            unset($company[$i]["vehicle_name"]);
            unset($company[$i]["unique_vehicle"]);
            unset($company[$i]["unique_pool_name"]);
            unset($company[$i]["unique_pool_location"]);
            //

        }



        // return $company;
        return view('customer.dashboard.item_data')->with([
            'company'   => $company
        ]);
    }

    public function edit($id)
    {

        $company = Company::findOrfail($id);
        return $company;
    }

    public function update(Request $request, $id)
    {

        $data = Company::findOrfail($id);
        $data->fitur_yang_digunakan         = $request->fitur;
        $data->business_type                = $request->business;
        $data->description_business_type    = $request->description;
        $data->address                      = $request->address;
        $data->coordinate_address           = $request->coordinate;
        $data->customer                     = $request->customer;
        $data->save();
    }

    public function action($id)
    {
        $company = Company::findOrFail($id);

        return view('customer.dashboard.action')->with([
            'company' => $company
        ]);
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
    }
}
