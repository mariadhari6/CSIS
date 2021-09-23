<?php

namespace App\Http\Controllers;

use App\Models\PemasanganMutasiGps;
use Illuminate\Http\Request;

class DashboardVisitAssignmentController extends Controller
{
    public function dashboard()
    {
        // $pemasangan_mutasi_GPS = PemasanganMutasiGps::all();

        return view('VisitAssignment.Dashboard.dashboard_visitAssignment');
    }
}
