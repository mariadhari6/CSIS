<?php

namespace App\Http\Controllers;
use App\Models\SummaryCustomer;
use App\Models\Company;
use App\Models\DetailCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SummaryController extends Controller
{
   public function index(){

    $company = Company::orderBy('company_name', 'DESC')->get();
    return view('customer.summary.index')->with([
        'company' => $company,
    ]);
   }

   public function item_data(){

    $company = Company::orderBy('company_name', 'DESC')->get();
    $details = DetailCustomer::all();
    $data = DB::table('summary_customers')->select([
        DB::raw('count(*) as jumlah'),
        DB::raw('company_id as company')
   ])
   ->groupBy('company')
   ->get();
    return view('customer.summary.item_data')->with([
        'company' => $company,
        'detail' => $details,
        'data' => $data
    ]);
   }

   public function add_form(){
       $company = SummaryCustomer::with('company')->get();
       return view('customer.summary.add', compact('company'));
   }

   public function countPo(){
    //    $data = DB::table('summary_customers')->select([
    //         DB::raw('count(*) as jumlah'),
    //         DB::raw('company_id as company')
    //    ])
    //    ->groupBy('company')
    //    ->get();
    // //    dd($data);
    // $data = SummaryCustomer::count();

    // $data = DetailCustomer::where('po_number', 1);

        // $data = DetailCustomer::find(1, ['po_number'])->toArray();
        $h = DetailCustomer::where('company_id' , 'po_number')->first();
        // $data = $h->only('company_id', 'po_number');

        dd($h);
        //    return view('livetable.index', compact('data'));
   }
}
