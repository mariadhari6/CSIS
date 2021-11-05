<?php

namespace App\Http\Controllers;
use App\Models\SummaryCustomer;
use App\Models\Company;
use App\Models\DetailCustomer;
use carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SummaryController extends Controller{

    public function index(){

        $company = Company::orderBy('company_name', 'DESC')->get();

        return view('customer.summary.index')->with([
            'company' => $company,
        ]);

    }

    public function filter(Request $request){   

        $company = $request->Company;
        $month   = $request->Month;
        $year    = $request->Year;

        if ($company == "") {

            $total_gps = DetailCustomer::groupBy('company_id')->where('status_id', "1")
            ->select('company_id', 
                DB::raw('count(gps_id) as total_gps'),
            )->get();

            $data_pasang = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
            ->select('company_id',
                DB::raw('count(tanggal_pasang) as penambahan_layanan ')
            )->get();

            $data_terminate = DetailCustomer::whereMonth('tanggal_non_aktif', $month)->whereYear('tanggal_non_aktif', $year)->groupBy('company_id')
            ->where('status_id', "2")
            ->select('company_id', 
                DB::raw('count(tanggal_non_aktif) as terminate '),
            )->get();

            $data = array();
            $company_id_pasang = array();

            foreach($data_pasang as $dt ){
                array_push($company_id_pasang, $dt['company_id']);
            }

            for ($i=0; $i < count($total_gps); $i++) {
                $data_ = $total_gps[$i];
                if(in_array($data_['company_id'], $company_id_pasang)) {

                    $idx_pasang = array_search($data_['company_id'], $company_id_pasang); // get index of terminate
                    $data_['penambahan'] = $data_pasang[$idx_pasang]['penambahan_layanan']; // hasil terminate masuk
                }
                else {
                    $data_['penambahan'] = 0;
                }
                array_push($data, $data_);
                                
            }

            $data_complete = array();
            $company_id_terminate = array(); // [12, 2, 4, 1]   
            foreach($data_terminate as $ds) {
                array_push($company_id_terminate, $ds['company_id']);
            }
            for ($i=0; $i < count($data) ; $i++) { 
                $data_finish = $data[$i];

                if (in_array($data_finish['company_id'], $company_id_terminate)) {
                $idx_terminate = array_search($data_finish['company_id'], $company_id_terminate);
                $data_finish['terminate'] = $data_terminate[$idx_terminate]['terminate'];
    
                }
                else{
                    $data_finish['terminate'] = 0; 
                }
                array_push($data_complete, $data_finish);
            }

            return view('customer.summary.item_summary')->with([
                'data_complete' => $data_complete,
                'month'         => $month,
                'year'          => $year,
               
            ]);   

        }
        else{

            $total_gps = DetailCustomer::groupBy('company_id')->where('status_id', "1")
            ->select('company_id', 
                DB::raw('count(gps_id) as total_gps'),
            )->get();

            $data_pasang = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
            ->select('company_id',
                DB::raw('count(tanggal_pasang) as penambahan_layanan ')
            )->get();

            $data_terminate = DetailCustomer::whereMonth('tanggal_non_aktif', $month)->whereYear('tanggal_non_aktif', $year)->groupBy('company_id')
            ->where('status_id', "2")
            ->select('company_id', 
                DB::raw('count(tanggal_non_aktif) as terminate '),
            )->get();

            $data = array();
            $company_id_pasang = array();

            foreach($data_pasang as $dt ){
                array_push($company_id_pasang, $dt['company_id']);
            }

            for ($i=0; $i < count($total_gps); $i++) {
                $data_ = $total_gps[$i];
                if(in_array($data_['company_id'], $company_id_pasang)) {

                    $idx_pasang = array_search($data_['company_id'], $company_id_pasang); // get index of terminate
                    $data_['penambahan'] = $data_pasang[$idx_pasang]['penambahan_layanan']; // hasil terminate masuk
                }
                else {
                    $data_['penambahan'] = 0;
                }
                array_push($data, $data_);
                                
            }

            $data_complete = array();
            $company_id_terminate = array(); // [12, 2, 4, 1]   
            foreach($data_terminate as $ds) {
                array_push($company_id_terminate, $ds['company_id']);
            }
            for ($i=0; $i < count($data) ; $i++) { 
                $data_finish = $data[$i];

                if (in_array($data_finish['company_id'], $company_id_terminate)) {
                $idx_terminate = array_search($data_finish['company_id'], $company_id_terminate);
                $data_finish['terminate'] = $data_terminate[$idx_terminate]['terminate'];
    
                }
                else{
                    $data_finish['terminate'] = 0; 
                }
                array_push($data_complete, $data_finish);
            }

            return view('customer.summary.item_summary')->with([
                'data_complete' => $data_complete,
                'month'         => $month,
                'year'          => $year,
            ]);
        }
    }

    public function DataPo(Request $request){
       
       $company = $request->company;
       $month   = $request->month;
       $year    = $request->year;

       $data = DetailCustomer::where('company_id', $company)->whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year) ->where('status_temporary', "1")
       ->groupBy('company_id', 'po_id')
       ->selectRaw('company_id')
       ->selectRaw('po_id')
       ->get();

        return view('customer.summary.item_po')->with([
            'data' => $data,
        ]);
    }


    public function item_summary(){

        $now    = Carbon::now();
        $month  = $now->month;
        $year   = $now->year;

        $total_gps = DetailCustomer::groupBy('company_id')->where('status_id', "1")
        ->select('company_id', 
            DB::raw('count(gps_id) as total_gps'),
        )->get();

        $data_pasang = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
        ->select('company_id',
            DB::raw('count(tanggal_pasang) as penambahan_layanan ')
        )->get();

        $data_terminate = DetailCustomer::whereMonth('tanggal_non_aktif', $month)->whereYear('tanggal_non_aktif', $year)->groupBy('company_id')
        ->where('status_id', "2")
        ->select('company_id', 
            DB::raw('count(tanggal_non_aktif) as terminate '),
        )->get();

        $data = array();
        $company_id_pasang = array();

        foreach($data_pasang as $dt ){
            array_push($company_id_pasang, $dt['company_id']);
        }

        for ($i=0; $i < count($total_gps); $i++) {
            $data_ = $total_gps[$i];
            if(in_array($data_['company_id'], $company_id_pasang)) {

                $idx_pasang = array_search($data_['company_id'], $company_id_pasang); // get index of terminate
                $data_['penambahan'] = $data_pasang[$idx_pasang]['penambahan_layanan']; // hasil terminate masuk
            }
            else {
                $data_['penambahan'] = 0;
            }
            array_push($data, $data_);
                             
        }

        $data_complete = array();
        $company_id_terminate = array(); // [12, 2, 4, 1]   
        foreach($data_terminate as $ds) {
            array_push($company_id_terminate, $ds['company_id']);
        }
        for ($i=0; $i < count($data) ; $i++) { 
            $data_finish = $data[$i];

            if (in_array($data_finish['company_id'], $company_id_terminate)) {
              $idx_terminate = array_search($data_finish['company_id'], $company_id_terminate);
              $data_finish['terminate'] = $data_terminate[$idx_terminate]['terminate'];
   
            }
            else{
                $data_finish['terminate'] = 0; 
            }
            array_push($data_complete, $data_finish);
        }
    
        
        return view('customer.summary.item_summary')->with([
            'data_complete' => $data_complete,
            'month'         => $month,
            'year'          => $year,
           
        ]);
    }


// 3 Novemmber 2021

//    $data_pasang = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
//    ->where('status_id', "1")
//    ->select('company_id', 
//        DB::raw('count(gps_id) as total_gps'),
//        DB::raw('count(tanggal_pasang) as penambahan_layanan ')
//    )   
//    ->get();

//    $data_terminate = DetailCustomer::whereMonth('tanggal_non_aktif', $month)->whereYear('tanggal_non_aktif', $year)->groupBy('company_id')
//    ->where('status_id', "2")
//    ->select('company_id', 
//        DB::raw('count(tanggal_non_aktif) as terminate '),
//    )   
//    ->get();

//    $data = array();
//    $company_id_terminate = array(); // [12, 2, 4, 1]

//    foreach($data_terminate as $dt) {
//        array_push($company_id_terminate, $dt['company_id']);
//    }

//    for ($i=0; $i < count($data_pasang); $i++) {
//        $data_ = $data_pasang[$i];

//        if (in_array($data_['company_id'], $company_id_terminate)) {
//            // print('ada');
//            $idx_terminate = array_search($data_['company_id'], $company_id_terminate); // get index of terminate
//            $data_['terminate'] = $data_terminate[$idx_terminate]['terminate'];
//            // print($data_['terminate']);
//        }
//        else {
//            $data_['terminate'] = 0;
//        }

//        array_push($data, $data_);
//    }





      // $data2 = DetailCustomer::whereMonth('tanggal_non_aktif', $month)->whereYear('tanggal_non_aktif', $year)->groupBy('company_id')->where('status_layanan', "In Active")
        // ->select('company_id', 
        //     DB::raw('count(tanggal_non_aktif) as total_terminate '),
        // )   
        // ->get();

        // $merge=$data1->merge($data2);




        // 4 november 2021

    //     $data_pasang = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
    //     ->where('status_temporary', "1")
    //     ->select('company_id',
    //         DB::raw('count(tanggal_pasang) as penambahan_layanan ')
    //     )   
    //     ->get();

    //     $data_terminate = DetailCustomer::whereMonth('tanggal_non_aktif', $month)->whereYear('tanggal_non_aktif', $year)->groupBy('company_id')
    //     ->where('status_id', "2")
    //     ->select('company_id', 
    //         DB::raw('count(tanggal_non_aktif) as terminate '),
    //     )   
    //     ->get();

    //     $total_gps = DetailCustomer::groupBy('company_id')
    //     ->where('status_id', "1")
    //     ->select('company_id', 
    //         DB::raw('count(gps_id) as total_gps'),
    //     )   
    //     ->get();
            
    //     $data = array();
    //     $company_id_terminate = array();
        
    //     foreach($data_terminate as $dt) {
    //         array_push($company_id_terminate, $dt['company_id']);
    //     }

    //     for ($i=0; $i < count($data_pasang); $i++) {
    //         $data_ = $data_pasang[$i];
            
    //         if (in_array($data_['company_id'], $company_id_terminate)) {

    //             $idx_terminate = array_search($data_['company_id'], $company_id_terminate); // get index of terminate
    //             $data_['terminate'] = $data_terminate[$idx_terminate]['terminate']; // hasil terminate masuk
    //         }
    //         else {
    //             $data_['terminate'] = 0;
    //         }

    //         array_push($data, $data_);
    //     }
     
    //     $data_complete = array();
    //     $company_id_total_gps = array();

    //     foreach($total_gps as $st){
    //         array_push($company_id_total_gps, $st['company_id']);
    //     }

    //     for ($i=0; $i < count($data) ; $i++) { 
    //         $data_finish = $data[$i];

    //         if (in_array($data_finish['company_id'], $company_id_total_gps)) {
    //             $idx_total_gps  = array_search($data_finish['company_id'], $company_id_total_gps);
    //             $data_finish['total'] = $total_gps[$idx_total_gps]['total_gps'];        
    //         }
    //         else{
    //            $data_finish['total'] = 0; 
    //         }

    //         array_push($data_complete, $data_finish);
    //    } 



















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
// }
