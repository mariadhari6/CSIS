<?php

namespace App\Http\Controllers;

use App\Exports\PemasanganMutasiGpsExport;
use App\Models\Company;
use App\Models\DetailCustomer;
use App\Models\Gps;
use App\Models\Gsm;
use App\Models\PemasanganMutasiGps;
use App\Models\Pic;
use App\Models\RequestComplaint;
use App\Models\RequestComplaintCustomer;
use App\Models\Sensor;
use App\Models\Task;
use App\Models\Teknisi;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class PemasanganMutasiGpsController extends Controller
{
    public function index()
    {
        // $pemasangan_mutasi_GPS = PemasanganMutasiGps::with('requestComplain')->get();
        return view('VisitAssignment.PemasanganMutasiGPS.index');
    }
    public function item_data_onProgress()
    {
        $pemasangan_mutasi_GPS = RequestComplaint::whereIn('task', [1, 2, 3])->where('status', 'On Progress')->get();
        return view('VisitAssignment.PemasanganMutasiGPS.item_data')->with([
            'pemasangan_mutasi_GPS' => $pemasangan_mutasi_GPS
        ]);
    }

    public function item_data_done()
    {
        $pemasangan_mutasi_GPS = RequestComplaint::whereIn('task', [1, 2, 3])->where('status', 'Done')->get();
        return view('VisitAssignment.PemasanganMutasiGPS.item_data')->with([
            'pemasangan_mutasi_GPS' => $pemasangan_mutasi_GPS
        ]);
    }

    public function item_data()
    {
        $pemasangan_mutasi_GPS = RequestComplaint::orderBy('id', 'DESC')->where('task', 1)->orWhere('task', 2)->orWhere('task', 3)->get();
        for ($i = 0; $i <= count($pemasangan_mutasi_GPS) - 1; $i++) {

            $loop_row   = $pemasangan_mutasi_GPS[$i]->equipment_terpakai_sensor;
            if ($loop_row != "") {

                $data_equipment_terpakai_sensor = explode(" ", $loop_row);

                $temp_sensor = "";
                foreach ($data_equipment_terpakai_sensor as $item) {
                    $cari_sensor = Sensor::where('id', $item)->get();

                    if ($temp_sensor == "") {
                        $temp_sensor = $cari_sensor[0]->sensor_name . "(" . $cari_sensor[0]->serial_number . "," . $cari_sensor[0]->merk_sensor . ")";
                    } else {
                        $temp_sensor .= "; " . $cari_sensor[0]->sensor_name . "(" . $cari_sensor[0]->serial_number . "," . $cari_sensor[0]->merk_sensor . ")";
                    }
                }

                $pemasangan_mutasi_GPS[$i]["equipment_terpakai_sensor_all_name"] = $temp_sensor;
            } else {
                $empty = "";
                $pemasangan_mutasi_GPS[$i]["equipment_terpakai_sensor_all_name"] = $empty;
            }
        }
        return view('VisitAssignment.PemasanganMutasiGPS.item_data', compact('pemasangan_mutasi_GPS'));
        // dd($pemasangan_mutasi_GPS);
    }

    public function item_data_MY(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $pemasangan_mutasi_GPS = RequestComplaint::whereIn('task', [1, 2, 3])->whereMonth('waktu_kesepakatan',  $month)->whereYear('waktu_kesepakatan', $year)->get();
        // dd($pemasangan_mutasi_GPS);
        return view('VisitAssignment.PemasanganMutasiGPS.item_data', compact('pemasangan_mutasi_GPS'));
    }

    public function destroy($id)
    {
        $data = RequestComplaint::findOrfail($id);
        $data->delete();
    }

    public function edit_form($id)
    {

        $company = Company::orderBy('id', 'DESC')->get();
        $details = DetailCustomer::groupBy('company_id')
            ->selectRaw('count(*) as jumlah, company_id')
            ->get();
        $pemasangan_mutasi_GPS = RequestComplaint::findOrfail($id);

        $sensor         = Sensor::orderBy('serial_number', 'DESC')->where('status', 'Ready')->get();

        $gps = Gps::where('status', 'Ready')->get();
        $vehicle = Vehicle::orderBy('id', 'DESC')->get();
        $teknisi = Teknisi::orderBy('id', 'DESC')->get();
        $task = Task::where('task', 'Pemasangan GPS')->orWhere('task', 'Pelepasan GPS')->orWhere('task', 'Mutasi')->get();
        $gsm_master = Gsm::where('status_gsm', 'Ready')->get();

        return view('VisitAssignment.PemasanganMutasiGPS.edit_form')->with([
            'pemasangan_mutasi_GPS' => $pemasangan_mutasi_GPS,
            'company' => $company,
            'details' => $details,
            'sensor' => $sensor,
            'gps' => $gps,
            'teknisi' => $teknisi,
            'task' => $task,
            'gsm_master' => $gsm_master,
            'vehicle' => $vehicle
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = RequestComplaint::findOrfail($id);
        $data->company_id = $request->company_id;
        $data->task = $request->task;
        $data->waktu_kesepakatan = $request->waktu_kesepakatan;
        $data->vehicle = $request->vehicle;
        $data->imei = $request->imei;
        $data->gsm_pemasangan = $request->gsm_pemasangan;
        $data->equipment_terpakai_gps = $request->equipment_terpakai_gps;
        $data->equipment_terpakai_sensor = $request->equipment_terpakai_sensor;
        $data->teknisi_pemasangan = $request->teknisi_pemasangan;
        $data->uang_transportasi = $request->uang_transportasi;
        $data->type_visit = $request->type_visit;
        $data->note_pemasangan = $request->note_pemasangan;
        $data->kendaraan_pasang = $request->kendaraan_pasang;
        $data->status = $request->status;
        $equipment_terpakai_sensor     = $request->equipment_terpakai_sensor;
        // $gsm_id = $request->gsm_pemasangan;
        // $gps_terpakai = $request->equipment_terpakai_gps;

        // $a      = $batas[0] - 1;
        // $x      = "not";


        if ($equipment_terpakai_sensor != "") {

            $arr            = explode(" ", $equipment_terpakai_sensor);
            $lengthArr      = count($arr) - 1;
            for ($i = 0; $i <= $lengthArr; $i++) {
                Sensor::where('id', $arr[$i])->update(array('status' => 'Used'));
            }
            $data->save();

            // Gsm::where('id', $gsm_id)->update(array('status_gsm' => 'Active'));
            // Gps::where('id', $gps_terpakai)->update(array('status' => 'Used'));
        } else {
            $data->save();
        }
    }

    public function selected()
    {
        $pemasangan_mutasi_GPS = RequestComplaint::all();
        return view('VisitAssignment.PemasanganMutasiGPS.selected')->with([
            'pemasangan_mutasi_GPS' => $pemasangan_mutasi_GPS
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = RequestComplaint::findOrfail($id);
        $data->company_id = $request->company_id;
        $data->task = $request->task;
        $data->waktu_kesepakatan = $request->waktu_kesepakatan;
        $data->vehicle = $request->vehicle;
        $data->imei = $request->imei;
        $data->gsm_pemasangan = $request->gsm_pemasangan;
        $data->equipment_terpakai_gps = $request->equipment_terpakai_gps;
        $data->equipment_terpakai_sensor = $request->equipment_terpakai_sensor;
        $data->teknisi_pemasangan = $request->teknisi_pemasangan;
        $data->uang_transportasi = $request->uang_transportasi;
        $data->type_visit = $request->type_visit;
        $data->note_pemasangan = $request->note_pemasangan;
        $data->kendaraan_pasang = $request->kendaraan_pasang;
        $data->status = $request->status;



        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('request_complaint')->whereIn('id', $ids)->delete();
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(RequestComplaint::all())->make(true);
        }
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
        for ($i = 0; $i < count($data); $i++) {
            $loop = $data[$i]->vehicle_id;
            $cari_vehicle = Vehicle::where('id', $loop)->get();
            $data[$i]['vehicle_license_plate'] = $cari_vehicle[0]->license_plate;
        }
        return $data;
    }

    public function basedImei($id)
    {
        $key = DetailCustomer::all()->where('id', $id)->mapWithKeys(function ($item, $key) {
            return [
                $item['id'] => $item->only(['gsm_id', 'type', 'imei'])
            ];
        });
        $data = $key->all();
        $complete = array();

        foreach ($data as $a) {

            $i = $a['gsm_id'];
            $j = $a['type'];
            $j = $a['imei'];


            $cari_Gsm = Gsm::where('id', $i)->get();
            $a['number_gsm'] = $cari_Gsm[0]->gsm_number;
            $cari_gpsType = Gps::where('id', $j)->get();
            $a['type_gps'] = $cari_gpsType[0]->type;
            $a['imei_gps'] = $cari_gpsType[0]->imei;

            $a['id'] = $id;


            array_push($complete, $a);
        }

        return $complete;
    }

    public function basedKendaraanPasang($id)
    {



        $data = Vehicle::where('company_id', $id)->get();

        return $data;
    }

    public function export_pemasangan()
    {
        return Excel::download(new PemasanganMutasiGpsExport, 'Pemasangan_Mutasi_GPS.xlsx');
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

    // public function dependentPemasangan($id)
    // {
    //     $data = DB::table("request_complaint_customers")
    //         ->where("id", $id)
    //         ->pluck('waktu_kesepakatan', 'id');
    //     return json_encode($data);
    // }
    // public function dependentJenisPekerjaan($id)
    // {
    //     $data = DB::table("request_complaint_customers")
    //         ->where("id", $id)
    //         ->pluck('task', 'id');
    //     return json_encode($data);
    // }
    // public function dependentKendaraanPasang($id)
    // {
    //     $data = DB::table("request_complaint_customers")
    //         ->where("id", $id)
    //         ->pluck('vehicle', 'id');
    //     return json_encode($data);
    // }
}
