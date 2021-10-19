<?php

namespace App\Http\Controllers;

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
        $pemasangan_mutasi_GPS = RequestComplaint::where('status_pemasangan', 'On Progress')->get();
        return view('VisitAssignment.PemasanganMutasiGPS.item_data')->with([
            'pemasangan_mutasi_GPS' => $pemasangan_mutasi_GPS
        ]);
    }

    public function item_data_done()
    {
        $pemasangan_mutasi_GPS = RequestComplaint::where('status_pemasangan', 'Done')->get();
        return view('VisitAssignment.PemasanganMutasiGPS.item_data')->with([
            'pemasangan_mutasi_GPS' => $pemasangan_mutasi_GPS
        ]);
    }

    public function item_data()
    {


        $pemasangan_mutasi_GPS = RequestComplaint::with(['sensor'])->where('task', 1)->orWhere('task', 2)->orWhere('task', 3)->get();

        return view('VisitAssignment.PemasanganMutasiGPS.item_data', compact('pemasangan_mutasi_GPS'));
        // dd($pemasangan_mutasi_GPS);
    }

    public function item_data_MY(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $pemasangan_mutasi_GPS = RequestComplaint::where('task', [1, 2, 3])->whereMonth('waktu_kesepakatan',  $month)->whereYear('waktu_kesepakatan', $year)->get();
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
        $details = DetailCustomer::orderBy('id', 'DESC')->get();
        $pemasangan_mutasi_GPS = RequestComplaint::findOrfail($id);
        $sensor = Sensor::orderBy('id', 'DESC')->get();
        $gps = Gps::orderBy('id', 'DESC')->get();
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
        $data->status_pemasangan = $request->status_pemasangan;

        $data->save();
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
        $data->status_pemasangan = $request->status_pemasangan;



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
