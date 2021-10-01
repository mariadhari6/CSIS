<?php

namespace App\Http\Controllers;

use App\Models\PemasanganMutasiGps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardVisitAssignmentController extends Controller
{
    public function dashboard()
    {
        $pemasangan_mutasi_GPS = PemasanganMutasiGps::all();

        return view('VisitAssignment.Dashboard.dashboard_visitAssignment', compact('pemasangan_mutasi_GPS'));
    }
    public function item_data()
    {



        $data = PemasanganMutasiGps::groupBy('company_id')
            ->selectRaw('company_id, count(kendaraan_awal) as vehicle, count(tanggal) as time, sum(uang_transportasi) as cost')->get();

        return view('VisitAssignment.Dashboard.cost_percompany')->with([
            'data' => $data
        ]);
    }
}
