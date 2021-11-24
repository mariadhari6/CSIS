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
use App\Models\VehicleType;
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
        // $company = Company::groupBy('seller_id')->select('seller_id')->get();

        // for ($i = 0; $i < count($company); $i++) {
        //     $a = $company[$i]->seller_id;
        //     $cari_company = Company::where('seller_id', $a)->get();
        //     // dd($cari_company);
        //     $total_company_installed = Company::where('seller_id', $a)->select(DB::raw('count(company_name) as total_company'))->get();
        //     // dd($total_company_installed);
        //     $company[$i]["company"] = $cari_company;
        //     $company[$i]["total_company"] = $total_company_installed;
        // }

        // $company = DetailCustomer::groupBy('company_id')->select('company_id')->get();
        // for ($i = 0; $i < count($company); $i++) {
        //     $a = $company[$i]->company_id;
        //     $cari_seller = Company::groupBy('seller_id')->where('id', $a)->select('seller_id')->get();

        //     // dd($cari_seller);
        //     $total_company_installed = DetailCustomer::where('company_id', $a)->select(DB::raw('count(company_id) as total_company'))->get();
        //     // dd($total_company_installed);
        //     // $gps     = DetailCustomer::where('company_id', $a)->pluck('type');
        //     // $company[$i]["gps_type"] =   $gps;
        //     $company[$i]["seller"] = $cari_seller;
        //     $company[$i]["total_company"] = $total_company_installed;
        // }

        $company = DetailCustomer::groupBy('company_id')->select('company_id')->get();


        for ($i = 0; $i < count($company); $i++) {
            $a = $company[$i]->company_id;
            $cari_seller = Company::groupBy('seller_id')->where('id', $a)->select('seller_id')->get();

            // return $cari_seller;
            // $cari_vehicle_type = Vehicle::groupBy('vehicle_id')->where('company_id', $a)->select('vehicle_id')->get();
            $total_company_installed = DetailCustomer::where('company_id', $a)->select(DB::raw('count(company_id) as total_company'))->get();
            // $total_vehicleperType_installed = DetailCustomer::groupBy('')->where('company_id', $a)->select(DB::raw('count(vehicle_id) as total_pervehicle_type,vehicle_id'))->get();

            $cari_gps = DetailCustomer::where('company_id', $a)->pluck('type');
            // return $company;
            $company[$i]["seller"] = $cari_seller;

            $company[$i]["gps"] = $cari_gps;

            $company[$i]["total_company"] = $total_company_installed;
        }

        for ($j = 0; $j < count($company); $j++) {
            $gps_ = array();
            foreach ($company[$j]["gps"] as $value) {
                if ($value != null) {
                    if (str_contains($value, ' ')) {
                        $exploded = explode(" ", $value);
                        for ($i = 0; $i < count($exploded); $i++) {
                            array_push($gps_, $exploded[$i]);
                        }
                    } else {
                        array_push($gps_, $value);
                    }
                }
            }

            // PROSES MENCARI Gps name
            $unique_gps = array_unique($gps_);

            $company[$j]["unique_gps"] = array_map(function ($gpsId) {
                $gps_name = Gps::where('id', $gpsId)->pluck('type');
                return $gps_name[0];
            }, $unique_gps);

            $sens = $company[$j]["unique_gps"];

            $array_count_values = array_count_values($sens);
            $gpsFinal = array();

            foreach ($array_count_values as $gpsName => $gpsTotal) {
                array_push($gpsFinal, array(
                    "type_gps" => $gpsName,
                    "type_total" => $gpsTotal
                ));
            }

            $company[$j]["gps"] = $gpsFinal;

            unset($company[$j]["unique_gps"]);
            //
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
        $request = RequestComplaint::groupBy('status')->where('internal_eksternal', 'Request Eksternal',  'Request Internal')->orWhere('internal_eksternal', 'Request Internal')->selectRaw('count(internal_eksternal) as jumlah_status_request , status')->get();
        // return $request;
        $complain = RequestComplaint::groupBy('status')->where('internal_eksternal', 'Complain Internal', 'Complain Internal')->selectRaw('count(internal_eksternal) as jumlah_status_complaint, status')->get();
        // return $complain;

        //request
        $jumlah_done_request = RequestComplaint::whereIn('internal_eksternal', ['Request Internal', 'Request Eksternal'])->where('status', 'Done')->count();
        $jumlah_total_request = RequestComplaint::whereIn('internal_eksternal', ['Request Internal', 'Request Eksternal'])->count();
        $presentase_request = ($jumlah_done_request / $jumlah_total_request) * 100;
        // return $presentase;

        //complain
        $jumlah_done_complain = RequestComplaint::whereIn('internal_eksternal', ['Complain Internal', 'Complain Eksternal'])->where('status', 'Done')->count();
        $jumlah_total_complain = RequestComplaint::whereIn('internal_eksternal', ['Complain Internal', 'Complain Eksternal'])->count();
        $presentase_complain = ($jumlah_done_complain / $jumlah_total_complain) * 100;

        return view('home.request', compact('complain', 'request', 'presentase_request', 'presentase_complain', 'jumlah_total_request', 'jumlah_total_complain'));
    }

    public function vehicle_home()
    {
        $vehicle = DetailCustomer::groupBy('company_id')->select('company_id')->get();


        for ($i = 0; $i < count($vehicle); $i++) {
            $a = $vehicle[$i]->company_id;

            // $cari_vehicle_type = Vehicle::groupBy('vehicle_id')->where('company_id', $a)->select('vehicle_id')->get();
            $total_vehicle_type_installed = DetailCustomer::where('company_id', $a)->select(DB::raw('count(vehicle_id) as total_vehicletype'))->get();
            // $total_vehicleperType_installed = DetailCustomer::groupBy('')->where('company_id', $a)->select(DB::raw('count(vehicle_id) as total_pervehicle_type,vehicle_id'))->get();

            $cari_vehicle_type = DetailCustomer::where('company_id', $a)->pluck('vehicle_id');
            // return $vehicle;

            $vehicle[$i]["vehicle_type"] = $cari_vehicle_type;

            $vehicle[$i]["total_vehicletype"] = $total_vehicle_type_installed;
        }

        for ($i = 0; $i < count($vehicle); $i++) {
            $vehicle_ = array();
            foreach ($vehicle[$i]['vehicle_type'] as $value) {
                array_push($vehicle_, $value);
            }
            // print_r($vehicle_);
            // PROSES CARI VEHICLE TYPE
            $vehicle[$i]["unique_vehicle"] = array_map(function ($vehicleId) {
                $vehicle_id_type = Vehicle::where('id', $vehicleId)->pluck('vehicle_id');
                return $vehicle_id_type[0];
            }, $vehicle_);


            $vehicle_type = array();
            foreach ($vehicle[$i]['unique_vehicle'] as $value) {
                array_push($vehicle_type, $value);
            }

            $vehicle[$i]["vehicle_name"] = array_map(function ($vehicleId) {
                $vehicle_name = VehicleType::where('id', $vehicleId)->pluck('name');
                return $vehicle_name[0];
            }, $vehicle_type);


            $name_vehicle = $vehicle[$i]["vehicle_name"];
            $array_count_values = array_count_values($name_vehicle);
            $vehicleFinal = array();

            foreach ($array_count_values as $vehicleName => $vehicleTotal) {
                array_push($vehicleFinal, array(
                    "vehicle_name" => $vehicleName,
                    "vehicle_total" => $vehicleTotal
                ));
            }

            $vehicle[$i]['vehicle_type'] = $vehicleFinal;
            unset($vehicle[$i]["vehicle_name"]);
        }

        // return $vehicle;
        return view('home.vehicle', compact('vehicle'));
    }


    public function visit_home()
    {
        $pemasangan = RequestComplaint::groupBy('status')->where('task', 1)->selectRaw('count(task) as jumlah_status_pemasangan, status')->get();
        // return $pemasangan;
        $mutasi = RequestComplaint::groupBy('status')->where('task', 3, 2)->selectRaw('count(task) as jumlah_status_mutasi, status')->get();
        // return $mutasi;
        $maintenance_gps = RequestComplaint::groupBy('status')->where('task', 4)->selectRaw('count(task) as jumlah_status_maintenance_gps, status')->get();
        $maintenance_sensor = RequestComplaint::groupBy('status')->where('task', 5)->selectRaw('count(task) as jumlah_status_maintenance_sensor, status')->get();
        // return $maintenance_sensor;
        // presentase pemasangan
        $jumlah_done_pemasangan = RequestComplaint::where('task', 1)->where('status', 'Done')->count();
        $jumlah_total_pemasangan = RequestComplaint::where('task', 1)->count();
        $presentase_pemasangan = ($jumlah_done_pemasangan / $jumlah_total_pemasangan) * 100;

        // presentase mutasi
        $jumlah_done_mutasi = RequestComplaint::where('task', 3, 2)->where('status', 'Done')->count();
        $jumlah_total_mutasi = RequestComplaint::where('task', 3, 2)->count();
        $presentase_mutasi = ($jumlah_done_mutasi / $jumlah_total_mutasi) * 100;

        // presentase maintenance gps
        $jumlah_done_maintenance_gps = RequestComplaint::where('task', 4)->where('status', 'Done')->count();
        $jumlah_total_maintenance_gps = RequestComplaint::where('task', 4)->count();
        $presentase_maintenance_gps = ($jumlah_done_maintenance_gps / $jumlah_total_maintenance_gps) * 100;

        // presentase maintenance gps
        $jumlah_done_maintenance_sensor = RequestComplaint::where('task', 5)->where('status', 'Done')->count();
        $jumlah_total_maintenance_sensor = RequestComplaint::where('task', 5)->count();
        $presentase_maintenance_sensor = ($jumlah_done_maintenance_sensor / $jumlah_total_maintenance_sensor) * 100;




        return view('home.visit', compact(
            'mutasi',
            'pemasangan',
            'maintenance_sensor',
            'maintenance_gps',
            'presentase_pemasangan',
            'presentase_mutasi',
            'presentase_maintenance_sensor',
            'presentase_maintenance_gps',
            'jumlah_total_pemasangan',
            'jumlah_total_mutasi',
            'jumlah_total_maintenance_gps',
            'jumlah_total_maintenance_sensor'

        ));
    }
}
