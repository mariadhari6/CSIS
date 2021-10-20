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
    $details = DetailCustomer::orderBy('company_id', 'DESC')->get();
    $data = DetailCustomer::with('company')->groupBy('company_id')
    ->selectRaw('count(*) as jumlah, company_id')
    ->get();
    return view('customer.summary.index')->with([
        'company' => $company,
        'data' => $data
    ]);

   }

   public function filter(Request $request){
       
       $company = $request->Company;
       $month   = $request->Month;
       $year    = $request->Year;

        $data = DetailCustomer::where('company_id', $company)->whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)
        ->groupBy('company_id')
        ->selectRaw('count(*) as jumlah, company_id')
        ->get();
        return view('customer.summary.item_data')->with([
            'data' => $data
        ]);


   }

   public function item_data(){    
    $data = DetailCustomer::with('company')->groupBy('company_id')
    ->selectRaw('count(*) as jumlah, company_id')
    ->get();
    return view('customer.summary.item_data')->with([
        'data' => $data
    ]);


}

































//    public function item_data(){

   


//     $data = DetailCustomer::with('company')->select([
//         DB::raw('count(*) as jumlah'),
//         DB::raw('company_id as company'),
//         DB::raw('status_po as status'),
//         DB::raw('merk as merk_gps'),
//         DB::raw('type as type_gps'),
//         DB::raw('po_number as po')
//    ])
//    ->groupBy('company')
//    ->groupBy('status')
//    ->groupBy('merk_gps')
//    ->groupBy('type_gps')
//    ->groupBy('po')
//    ->get();

//    $data = DetailCustomer::with('company')->groupBy('company_id')
//    ->selectRaw('count(*) as jumlah, company_id')
//    ->get();

//     return view('customer.summary.item_data', compact('data'));

//    }

//    public function add_form(){
//        $company = SummaryCustomer::with('company')->get();
//        return view('customer.summary.add', compact('company'));
//    }

//    public function countPo(){
    //    $data = DB::table('detail_customers')->select([
    //         DB::raw('count(*) as jumlah'),
    //         DB::raw('company_id as company'),
    //         DB::raw('status_po as status'),
    //         DB::raw('merk as merk_gps'),
    //         DB::raw('type as type_gps'),
    //         DB::raw('po_number as po')
    //    ])
    //    ->groupBy('company')
    //    ->groupBy('status')
    //    ->groupBy('merk_gps')
    //    ->groupBy('type_gps')
    //    ->groupBy('po')
    //    ->get();


        // dd(json_decode($data));

        // $i = 0;
       
        
        // $data = DetailCustomer::with('company')->where('company_id', '2')->get();
        // dd($data);
    //     $data  = DB::table('detail_customers')->select([
    //         DB::raw('count(*) as jumlah'),
    //         DB::raw('company_id as coba')
    //    ])
    //    ->groupBy('coba')
    //    ->get();

//     $data = DetailCustomer::with('company')->groupBy('company_id')
//     ->selectRaw('count(*) as jumlah, company_id')
//     ->get();


//        dd($data);
//         //  return view('livetable.index', compact('data'));
//    }
}
