<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceGps;
use App\Models\RequestComplaint;
use App\Models\PemasanganMutasiGps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardVisitAssignmentController extends Controller
{

    public function dashboard()
    {
        return view('VisitAssignment.Dashboard.dashboard_visitAssignment');
        // return view('VisitAssignment.Dashboard.dashboard_visitAssignment', $company);
    }
    // public function dashboard()
    // {
    //     $pemasangan_mutasi_GPS = PemasanganMutasiGps::all();

    //     return view('VisitAssignment.Dashboard.dashboard_visitAssignment', compact('pemasangan_mutasi_GPS'));
    // }
    // public function item_data()
    // {



    //     $data = PemasanganMutasiGps::groupBy('company_id')
    //         ->selectRaw('company_id, count(kendaraan_awal) as vehicle, count(tanggal) as time, sum(uang_transportasi) as cost')->get();
    //     $maintenance = MaintenanceGps::groupBy('company_id')
    //         ->selectRaw('company_id, count(vehicle_id) as vehicle, count(tanggal_id) as time, sum(biaya_transportasi) as cost')->get();

    //     return view('VisitAssignment.Dashboard.cost_percompany')->with([
    //         'data' => $data,
    //         'maintenance' => $maintenance
    //     ]);
    // }

    // public function detailPercompany()
    // {
    //     // $data = PemasanganMutasiGps::groupBy('company_id')
    //     //     ->selectRaw('company_id, count(jenis_pekerjaan) as task')->get();
    //     // $data = DB::table('pemasangan_mutasi_gps')->groupBy('company_id')
    //     //     ->selectRaw(' count(jenis_pekerjaan) as pemasangan')
    //     //     ->join('maintenance_gps', 'maintenance_gps.company_id', '=', 'pemasangan_mutasi_gps.company_id')
    //     //     ->get();

    //     $data = PemasanganMutasiGps::groupBy('pemasangan_mutasi_gps.company_id')
    //         ->selectRaw('pemasangan_mutasi_gps.company_id, count(pemasangan_mutasi_gps.jenis_pekerjaan) as jenis_pekerjaan , count(maintenance_gps.permasalahan_id) as task')
    //         ->join('maintenance_gps', 'maintenance_gps.company_id', '=', 'pemasangan_mutasi_gps.company_id')
    //         ->get();
    //     // $data = PemasanganMutasiGps::select('pemasangan_mutasi_gps.*', DB::raw('count(jenis_pekerjaan) as task'))
    //     //     ->leftJoin('maintenance_gps', 'maintenance_gps.company_id', '=', 'pemasangan_mutasi_gps.cid')
    //     //     ->groupBy('company_id')
    //     //     ->get();
    //     // dd($data);
    //     return view('VisitAssignment.Dashboard.detail_cost_percompany')->with([
    //         'data' => $data

    //     ]);
    // }
    // public function perTypeGps()
    // {
    //     $data = MaintenanceGps::groupBy('type_gps_id')
    //         ->selectRaw('type_gps_id, count(type_gps_id) as type_count')->get();
    //     return view('VisitAssignment.Dashboard.perTypeGps')->with([
    //         'data' => $data
    //     ]);
    // }



    // public function tugasPerTeknisi()
    // {
    //     $data = MaintenanceGps::groupBy('teknisi_id')
    //         ->selectRaw('teknisi_id, count(teknisi_id) as per_teknisi ')
    //         ->get();
    //     $pemasangan_mutasi_GPS = PemasanganMutasiGps::groupBy('teknisi')
    //         ->selectRaw('teknisi, count(teknisi) as per_teknisi ')
    //         ->get();
    //     return view('VisitAssignment.Dashboard.teknisi')->with([
    //         'data' => $data,
    //         'pemasangan_mutasi_GPS' => $pemasangan_mutasi_GPS

    //     ]);
    // }
    // public function index()
    // {
    //     $data = PemasanganMutasiGpsController::orderBy('id', 'DESC')->get();
    //     $maintenanceGps = MaintenanceGps::orderBy('id', 'DESC')->get();
    //     $request_complain = RequestComplaint::orderBy('id', 'DESC')->get();
    //     $company = [];
    //     $vehicle = [];
    //     $count_vehicle = array();
        
    //     foreach ($request_complain as $item) {
    //         $company['company'][] = $item->company->company_name;
    //         $vehicle['vehicle'][] = $item->vehicle;
    //     }

    //     $count_data_vehicle = array_count_values($vehicle['vehicle']);

    //     // for ($i=0; $i <= count($vehicle['vehicle']) - 1 ; $i++) { 
    //     //     $count_vehicle[$i] = $count_data_vehicle[$vehicle['vehicle'][$i]];
    //     // }

    //     $company['chart_company'] = json_encode($company);
    //     $vehicle['chart_vehicle'] = json_encode($vehicle);

    //     // dd()

    //     return view('VisitAssignment.Dashboard.dashboard_visitAssignment', $company, $vehicle);
    //     // return view('VisitAssignment.Dashboard.dashboard_visitAssignment', $company);
    // }
}
