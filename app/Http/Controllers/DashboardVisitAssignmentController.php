<?php

namespace App\Http\Controllers;
use App\Models\PemasanganMutasiGps;
use App\Models\MaintenanceGps;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class DashboardVisitAssignmentController extends Controller
{
    public function index()
    {
        $data = PemasanganMutasiGps::orderBy('id', 'DESC')->get();
        $maintenanceGps = MaintenanceGps::orderBy('id', 'DESC')->get();
        $company = [];

        foreach ($maintenanceGps as $item) {
            $company['company'][] = $item->requestComplaint->company->company_name;
        }

        foreach ($data as $item) {
            $company['company'][] = $item->requestComplain->company->company_name;
        }

        $company['chart_company'] = json_encode($company);

        return view('VisitAssignment.Dashboard.dashboard_visitAssignment', $company);

    }
}
