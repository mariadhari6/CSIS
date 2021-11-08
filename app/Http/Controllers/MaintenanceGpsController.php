<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\DetailCustomer;
use App\Models\Gps;
use App\Models\Gsm;
use App\Models\MaintenanceGps;
use App\Models\Pic;
use App\Models\RequestComplaint;
use App\Models\RequestComplaintCustomer;
use Illuminate\Support\Facades\DB;
use App\Models\Sensor;
use App\Models\Task;
use App\Models\Teknisi;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class MaintenanceGpsController extends Controller
{
    public function index()
    {
        return view('VisitAssignment.MaintenanceGPS.index');
    }



    public function item_data()
    {
        $maintenanceGps = RequestComplaint::where('task', 4)->orWhere('task', 5)->get();
        // $maintenanceGps = RequestComplaint::orderBy('id', 'DESC')->whereIn('task', [4, 5])->where('company_id', $company->id)->get();
        return view('VisitAssignment.MaintenanceGPS.item_data')->with([
            'maintenanceGps' => $maintenanceGps
        ]);

        // dd($maintenanceGps);
        // echo $maintenanceGps->requestComplaint->company->company_name;
    }
    public function item_data_onProgress()
    {
        $maintenanceGps = RequestComplaint::whereIn('task', [4, 5])->where('status', 'On Progress')->get();
        return view('VisitAssignment.MaintenanceGPS.item_data')->with([
            'maintenanceGps' => $maintenanceGps
        ]);
    }

    public function item_data_done()
    {
        $maintenanceGps = RequestComplaint::whereIn('task', [4, 5])->where('status', 'Done')->get();
        return view('VisitAssignment.MaintenanceGPS.item_data')->with([
            'maintenanceGps' => $maintenanceGps
        ]);
    }
    public function item_data_MY(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $maintenanceGps = RequestComplaint::whereIn('task', [4, 5])->whereMonth('waktu_kesepakatan',  $month)->whereYear('waktu_kesepakatan', $year)->get();
        // dd($pemasangan_mutasi_GPS);
        return view('VisitAssignment.MaintenanceGPS.item_data', compact('maintenanceGps'));
    }

    public function edit_form($id)
    {
        $details = DetailCustomer::groupBy('company_id')
            ->selectRaw('count(*) as jumlah, company_id')
            ->get();
        $maintenanceGps = RequestComplaint::findOrfail($id);
        $gps = Gps::where('status', 'Ready')->get();
        $company = Company::orderBy('id', 'DESC')->get();
        $pic = Pic::orderBy('id', 'DESC')->get();
        $sensor = Sensor::orderBy('id', 'DESC')->get();
        $teknisi_maintenance = Teknisi::orderBy('id', 'DESC')->get();
        $task = Task::where('task', 'Maintenance Sensor')->orWhere('task', 'Maintenance GPS')->get();
        $gsm_master = Gsm::where('status_gsm', 'Ready')->get();
        $vehicle = Vehicle::orderBy('id', 'DESC')->get();


        return view('VisitAssignment.MaintenanceGPS.edit_form')->with([
            'maintenanceGps' => $maintenanceGps,
            'gps' => $gps,
            'pic' => $pic,
            'sensor' => $sensor,
            'teknisi_maintenance' => $teknisi_maintenance,
            'task' => $task,
            'gsm_master' => $gsm_master,
            'company' => $company,
            'vehicle' => $vehicle,
            'details' => $details


        ]);
    }

    public function destroy($id)
    {
        $data = RequestComplaint::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = RequestComplaint::findOrfail($id);
        $data->company_id = $request->company_id;
        $data->vehicle = $request->vehicle;
        $data->waktu_kesepakatan = $request->waktu_kesepakatan;
        $data->type_gps_id = $request->type_gps_id;
        $data->equipment_gps_id = $request->equipment_gps_id;
        $data->equipment_sensor_id = $request->equipment_sensor_id;
        $data->equipment_gsm = $request->equipment_gsm;
        $data->task = $request->task;
        $data->ketersediaan_kendaraan = $request->ketersediaan_kendaraan;
        $data->keterangan = $request->keterangan;
        $data->hasil = $request->hasil;
        $data->biaya_transportasi = $request->biaya_transportasi;
        $data->teknisi_maintenance = $request->teknisi_maintenance;
        $data->req_by = $request->req_by;
        $data->note_maintenance = $request->note_maintenance;
        $data->status = $request->status;
        // $equipment_sensor_id     = $request->equipment_sensor_id;
        // $gsm_id = $request->equipment_gsm;
        // $gps_type = $request->type_gps_id;
        // $gps_type_equipment = $request->type_gps_id;


        // $a      = $batas[0] - 1;
        // $x      = "not";


        // if ($equipment_sensor_id != "") {

        //     $arr            = explode(" ", $equipment_sensor_id);
        //     $lengthArr      = count($arr) - 1;
        //     for ($i = 0; $i <= $lengthArr; $i++) {
        //         Sensor::where('id', $arr[$i])->update(array('status' => 'Used'));
        //     }
        //     $data->save();
        // }
        // Gsm::where('id', $gsm_id)->update(array('status_gsm' => 'Active'));
        // Gps::where('id', $gps_type)->update(array('status' => 'Used'));
        // Gps::where('id', $gps_type_equipment)->update(array('status' => 'Used'));




        $data->save();
    }

    public function updateall(Request $request, $id)
    {
        $data = RequestComplaint::findOrfail($id);
        $data->company_id = $request->company_id;
        $data->vehicle = $request->vehicle;
        $data->waktu_kesepakatan = $request->waktu_kesepakatan;
        $data->type_gps_id = $request->type_gps_id;
        $data->equipment_gps_id = $request->equipment_gps_id;
        $data->equipment_sensor_id = $request->equipment_sensor_id;
        $data->equipment_gsm = $request->equipment_gsm;
        $data->task = $request->task;
        $data->ketersediaan_kendaraan = $request->ketersediaan_kendaraan;
        $data->keterangan = $request->keterangan;
        $data->hasil = $request->hasil;
        $data->biaya_transportasi = $request->biaya_transportasi;
        $data->teknisi_maintenance = $request->teknisi_maintenance;
        $data->req_by = $request->req_by;
        $data->note_maintenance = $request->note_maintenance;
        $data->status = $request->status;

        echo $id;
    }


    // public function dependentCompany($id)
    // {
    //     $data = DB::table("request_complaint_customers")
    //         ->where("id", $id)
    //         ->pluck('vehicle', 'id');
    //     return json_encode($data);
    // }

    // public function dependentTanggal($id)
    // {
    //     $data = DB::table("request_complaint_customers")
    //         ->where("id", $id)
    //         ->pluck('waktu_kesepakatan', 'id');
    //     return json_encode($data);
    // }

    // public function dependentPermasalahan($id)
    // {
    //     $data = DB::table("request_complaint_customers")
    //         ->where("id", $id)
    //         ->pluck('detail_task', 'id');
    //     return json_encode($data);
    // }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('request_complaint')->whereIn('id', $ids)->delete();
        }
    }

    public function selected()
    {
        return view('VisitAssignment.MaintenanceGPS.selected');
    }
    public function updateSelected(Request $request)
    {
        RequestComplaint::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }
    public function basedSensor($id)
    {
        $key = Sensor::all()->where('id', $id)->mapWithKeys(function ($item, $key) {
            return [
                $item['id'] => $item->only(['sensor_name', 'merk_sensor'])
            ];
        });
        $data = $key->all();
        return $data;
    }
    public function basedVehicle($id)
    {



        $data = DetailCustomer::where('company_id', $id)->get();

        return $data;
    }
    public function basedImei($id)
    {



        $data = DetailCustomer::where('vehicle', $id)->get();

        return $data;
    }

    public function basedGps($id)
    {
        $key = DetailCustomer::all()->where('id', $id)->mapWithKeys(function ($item, $key) {
            return [
                $item['id'] => $item->only(['type'])
            ];
        });
        $data = $key->all();
        $complete = array();

        foreach ($data as $a) {

            $j = $a['type'];



            $cari_gpsType = Gps::where('id', $j)->get();
            $a['type_gps'] = $cari_gpsType[0]->type;
            // $a['imei_gps'] = $cari_gpsType[0]->imei;

            $a['id'] = $id;


            array_push($complete, $a);
        }

        return $complete;
    }
    // public function basedSensorName($id)
    // {



    //     $data = Sensor::where('sensor_name', $id)->get();

    //     return $data;
    // }
    // public function basedSerialNumber($id)
    // {



    //     $data = Sensor::where('serial_number', $id)->get();

    //     return $data;
    // }
}
