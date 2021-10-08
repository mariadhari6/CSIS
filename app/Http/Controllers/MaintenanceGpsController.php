<?php

namespace App\Http\Controllers;

use App\Models\Gps;
use App\Models\MaintenanceGps;
use App\Models\Pic;
use App\Models\RequestComplaintCustomer;
use Illuminate\Support\Facades\DB;
use App\Models\Sensor;
use App\Models\Teknisi;
use Illuminate\Http\Request;

class MaintenanceGpsController extends Controller
{
    public function index()
    {
        return view('VisitAssignment.MaintenanceGPS.index');
    }

    public function add_form()
    {
        $requestComplaint = RequestComplaintCustomer::orderBy('id', 'DESC')->get();
        $gps = Gps::orderBy('id', 'DESC')->get();
        $pic = Pic::orderBy('id', 'DESC')->get();
        $sensor = Sensor::orderBy('id', 'DESC')->get();
        $teknisi_maintenance = Teknisi::orderBy('id', 'DESC')->get();
        return view('VisitAssignment.MaintenanceGPS.add_form')->with([
            'requestComplaint' => $requestComplaint,
            'pic' => $pic,
            'gps' => $gps,
            'sensor' => $sensor,
            'teknisi_maintenance' => $teknisi_maintenance
        ]);
        // echo $requestComplaint->company;
    }

    public function item_data()
    {
        $maintenanceGps = MaintenanceGps::orderBy('id', 'DESC')->get();
        return view('VisitAssignment.MaintenanceGPS.item_data')->with([
            'maintenanceGps' => $maintenanceGps
        ]);
        // echo $maintenanceGps->requestComplaint->company->company_name;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'company' => 'required',
            'vehicle' => 'required',
            'tanggal' => 'required',
            'type_gps' => 'required',
            'equipment_gps' => 'required',
            'equipment_sensor' => 'required',
            'equipment_gsm' => 'required',
            'permasalahan' => 'required',
            'ketersediaan_kendaraan' => 'required',
            'keterangan' => 'required',
            'hasil' => 'required',
            'biaya_transportasi' => 'required',
            'teknisi' => 'required',
            'req_by' => 'required',
            'note' => 'required',
        ]);

        $data = array(
            'company_id'     =>  $request->company,
            'vehicle_id'    =>  $request->vehicle,
            'tanggal_id'     =>  $request->tanggal,
            'type_gps_id'     =>  $request->type_gps,
            'equipment_gps_id'     =>  $request->equipment_gps,
            'equipment_sensor_id' => $request->equipment_sensor,
            'equipment_gsm'     =>  $request->equipment_gsm,
            'permasalahan_id'     =>  $request->permasalahan,
            'ketersediaan_kendaraan'     =>  $request->ketersediaan_kendaraan,
            'keterangan'     =>  $request->keterangan,
            'hasil'     =>  $request->hasil,
            'biaya_transportasi'     =>  $request->biaya_transportasi,
            'teknisi_id'     =>  $request->teknisi,
            'req_by'     =>  $request->req_by,
            'note'     =>  $request->note,
        );

        MaintenanceGps::insert($data);
    }

    public function edit_form($id)
    {
        $requestComplaint = RequestComplaintCustomer::orderBy('id', 'DESC')->get();
        $maintenanceGps = MaintenanceGps::findOrfail($id);
        $gps = Gps::orderBy('id', 'DESC')->get();
        $pic = Pic::orderBy('id', 'DESC')->get();
        $sensor = Sensor::orderBy('id', 'DESC')->get();
        $teknisi_maintenance = Teknisi::orderBy('id', 'DESC')->get();

        return view('VisitAssignment.MaintenanceGPS.edit_form')->with([
            'maintenanceGps' => $maintenanceGps,
            'requestComplaint' => $requestComplaint,
            'gps' => $gps,
            'pic' => $pic,
            'sensor' => $sensor,
            'teknisi_maintenance' => $teknisi_maintenance

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
        $data->teknisi_id = $request->teknisi;
        $data->req_by = $request->req_by;
        $data->note = $request->note;

        $data->save();
    }

    public function updateall(Request $request, $id)
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
        $data->teknisi_id = $request->teknisi;
        $data->req_by = $request->req_by;
        $data->note = $request->note;
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
