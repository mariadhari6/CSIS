<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Pic;
use App\Models\DetailCustomer;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class DashboardCustomerController extends Controller
{
    public function index(){

        $company = DetailCustomer::groupBy('company_id')->select('company_id')->get();

        for ($i=0; $i < count($company) ; $i++) { 
            $a = $company[$i]->company_id;
            $cari_pic            = Pic::where('company_id', $a)->get();
            $total_gps_installed = DetailCustomer::where('company_id', $a)->select(DB::raw('count(gps_id) as total_gps_installed'))->get();
            $company[$i]["pic"]  = $cari_pic;
            $company[$i]["total_gps_installed"] = $total_gps_installed;
            
        }

        // return $company;
        return view('customer.dashboard.index')->with([
            'company'   => $company
        ]);

        // return view('customer.dashboard.index');
    }
}
