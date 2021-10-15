<?php

namespace App\Http\Controllers;

use App\Models\Gps;
use App\Models\MaintenanceGps;
use App\Models\Pic;
use App\Models\RequestComplaint;
use App\Models\RequestComplaintCustomer;
use Illuminate\Support\Facades\DB;
use App\Models\Sensor;
use Illuminate\Http\Request;

class MaintenanceGpsController extends Controller
{
    public function index()
    {
        return view('VisitAssignment.MaintenanceGPS.index');
    }

    public function item_data()
    {
        $maintenanceGps = RequestComplaint::where('task', '1')->orWhere('task', '2')->get();
        return view('VisitAssignment.MaintenanceGPS.item_data')->with([
            'maintenanceGps' => $maintenanceGps
        ]);
        // echo $maintenanceGps->requestComplaint->company->company_name;
    }

    public function edit_form($id)
    {
        $requestComplaint = RequestComplaintCustomer::orderBy('id', 'DESC')->get();
        $maintenanceGps = MaintenanceGps::findOrfail($id);
        $gps = Gps::orderBy('id', 'DESC')->get();
        $pic = Pic::orderBy('id', 'DESC')->get();
        $sensor = Sensor::orderBy('id', 'DESC')->get();
        return view('VisitAssignment.MaintenanceGPS.edit_form')->with([
            'maintenanceGps' => $maintenanceGps,
            'requestComplaint' => $requestComplaint,
            'gps' => $gps,
            'pic' => $pic,
            'sensor' => $sensor,
        ]);
    }

    public function destroy($id)
    {
        $data = MaintenanceGps::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = MaintenanceGps::findOrfail($id);
        $data->company_id = $request->company;
        $data->vehicle_id = $request->vehicle;
        $data->tanggal_id = $request->tanggal;
        $data->type_gps_id = $request->type_gps;
        $data->equipment_gps_id = $request->equipment_gps;
        $data->equipment_sensor_id = $request->equipment_sensor;
        $data->equipment_gsm = $request->equipment_gsm;
        $data->permasalahan_id = $request->permasalahan;
        $data->ketersediaan_kendaraan = $request->ketersediaan_kendaraan;
        $data->keterangan = $request->keterangan;
        $data->hasil = $request->hasil;
        $data->biaya_transportasi = $request->biaya_transportasi;
        $data->teknisi = $request->teknisi;
        $data->req_by = $request->req_by;
        $data->note = $request->note;

        $data->save();
    }

    public function dependentCompany($id)
    {
        $data = DB::table("request_complaint_customers")
                    ->where("id", $id)
                    ->pluck('vehicle', 'id');
        return json_encode($data);
    }

    public function dependentTanggal($id)
    {
        $data = DB::table("request_complaint_customers")
                    ->where("id", $id)
                    ->pluck('waktu_kesepakatan', 'id');
        return json_encode($data);
    }

    public function dependentPermasalahan($id)
    {
        $data = DB::table("request_complaint_customers")
                    ->where("id", $id)
                    ->pluck('detail_task', 'id');
        return json_encode($data);
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('maintenance_gps')->whereIn('id', $ids)->delete();
        }
    }

    public function selected()
    {
        return view('VisitAssignment.MaintenanceGPS.selected');
    }

}
