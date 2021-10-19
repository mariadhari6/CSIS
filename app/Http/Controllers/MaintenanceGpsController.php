<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
        $maintenanceGps = RequestComplaint::with(['sensor'])->where('task', 4)->orWhere('task', 5)->get();
        return view('VisitAssignment.MaintenanceGPS.item_data')->with([
            'maintenanceGps' => $maintenanceGps
        ]);
        // dd($maintenanceGps);
        // echo $maintenanceGps->requestComplaint->company->company_name;
    }
    public function item_data_onProgress()
    {
        $maintenanceGps = RequestComplaint::where('status_maintenance', 'On Progress')->get();
        return view('VisitAssignment.MaintenanceGPS.item_data')->with([
            'maintenanceGps' => $maintenanceGps
        ]);
    }

    public function item_data_done()
    {
        $maintenanceGps = RequestComplaint::where('status_maintenance', 'Done')->get();
        return view('VisitAssignment.MaintenanceGPS.item_data')->with([
            'maintenanceGps' => $maintenanceGps
        ]);
    }

    public function edit_form($id)
    {
        $maintenanceGps = RequestComplaint::findOrfail($id);
        $gps = Gps::orderBy('id', 'DESC')->get();
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
            'vehicle' => $vehicle

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
        $data->status_maintenance = $request->status_maintenance;

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
        $data->status_maintenance = $request->status_maintenance;

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
}
