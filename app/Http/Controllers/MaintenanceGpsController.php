<?php

namespace App\Http\Controllers;

use App\Models\RequestComplaintCustomer;
use Illuminate\Http\Request;

class MaintenanceGpsController extends Controller
{
    public function index()
    {
        return view('VisitAssignment.MaintenanceGPS.index');
    }

    public function add_form()
    {
        $requestComplaint = RequestComplaintCustomer::orderBy('id', 'DESC')->first();
        // return view('VisitAssignment.MaintenanceGPS.add_form')->with([
        //     'requestComplaint' => $requestComplaint,
        // ]);
        echo $requestComplaint->company->company_name;
    }
}
