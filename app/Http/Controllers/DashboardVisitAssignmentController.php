<?php

namespace App\Http\Controllers;
use App\Models\PemasanganMutasiGps;
use App\Models\MaintenanceGps;
use App\Models\RequestComplaint;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class DashboardVisitAssignmentController extends Controller
{
    public function index()
    {
        $data = PemasanganMutasiGps::orderBy('id', 'DESC')->get();
        $maintenanceGps = MaintenanceGps::orderBy('id', 'DESC')->get();
        $request_complain = RequestComplaint::orderBy('id', 'DESC')->get();
        $company = [];
        $vehicle = [];
        $count_vehicle = array();
        
        foreach ($request_complain as $item) {
            $company['company'][] = $item->company->company_name;
            $vehicle['vehicle'][] = $item->vehicle;
        }

        $count_data_vehicle = array_count_values($vehicle['vehicle']);

        for ($i=0; $i <= count($vehicle['vehicle']) - 1 ; $i++) { 
            $count_vehicle[$i] = $count_data_vehicle[$vehicle['vehicle'][$i]];
        }

        $company['chart_company'] = json_encode($company);
        $vehicle['chart_vehicle'] = json_encode($count_vehicle);

        return view('VisitAssignment.Dashboard.dashboard_visitAssignment', $company, $vehicle);
    }
}
