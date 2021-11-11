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

        $now            = Carbon::now();
        $month          = $now->month;
        $year           = $now->year;
        $company = Company::orderBy('company_name', 'DESC')->get();

        return view('customer.summary.index')->with([
            'company' => $company,
            'month'   => $month,
            'year'    => $year
        ]);

    }

    public function filter(Request $request) {   

        $company        = $request->Company;
        $month          = $request->Month;
        $year           = $request->Year;
        $lastDay        = $request->lastDay;
        $filter_lastDay = "$year-$month-$lastDay";

        if ($company == "") {

            $data = DetailCustomer::groupBy('company_id')->select('company_id')->get();
        
            for ($i=0; $i < count($data) ; $i++) { 

                $company_id = $data[$i]->company_id;
                $cari_tanggal_awal_pasang_per_company = DetailCustomer::where('company_id', $company_id)
                ->select('tanggal_pasang')->orderBy('tanggal_pasang', 'ASC')->get();

                $data[$i]['tanggal_pasang_awal'] =  $cari_tanggal_awal_pasang_per_company[0]->tanggal_pasang;
            }

            for ($i=0; $i < count($data) ; $i++) {  

                $company_id = $data[$i]->company_id;
                $tanggal_pasang_awal = $data[$i]->tanggal_pasang_awal;
                $cari_total_gps = DetailCustomer::where('company_id', $company_id)->whereBetween('tanggal_pasang', [$tanggal_pasang_awal, $filter_lastDay])
                ->select(DB::raw('count(gps_id) as total_gps'))->get();

                $data[$i]['total_gps'] = $cari_total_gps[0]->total_gps;
            }

            for ($i=0; $i < count($data) ; $i++) { 

                $company_id = $data[$i]->company_id;
        
                $data_pasang = DetailCustomer::where('company_id', $company_id)->whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)
                ->select(DB::raw('count(tanggal_pasang) as penambahan_layanan '))->get();

                $data[$i]['penambahan'] = $data_pasang[0]->penambahan_layanan; 
                    
            }

            for ($i=0; $i < count($data) ; $i++) { 

                $company_id = $data[$i]->company_id;
        
                $data_terminate = DetailCustomer::where('company_id', $company_id)->whereMonth('tanggal_non_aktif', $month)->whereYear('tanggal_non_aktif', $year)
                ->select(DB::raw('count(tanggal_non_aktif) as terminate')
                )->get();

                $data[$i]['terminate'] = $data_terminate[0]->terminate;  
            
                $data[$i]->total_gps = $data[$i]->total_gps - $data[$i]->terminate;
                    
                
            }

            for ($i=0; $i < count($data) ; $i++) {

                $company_id = $data[$i]->company_id;
           
                $data_reaktivasi = DetailCustomer::where('company_id', $company_id)->whereMonth('tgl_reaktivasi_gps', $month)->whereYear('tgl_reaktivasi_gps', $year)
                ->select(DB::raw('count(tgl_reaktivasi_gps) as reaktivasi')
                )->get();
    
                $data[$i]['reaktivasi'] = $data_reaktivasi[0]->reaktivasi;  
               
                $data[$i]->total_gps    = $data[$i]->total_gps  + $data[$i]->reaktivasi;
                $data[$i]->penambahan   = $data[$i]->penambahan + $data[$i]->reaktivasi;
                               
            }
    

            $data_finish = $data->sortByDesc('total_gps');

            return view('customer.summary.item_summary')->with([
                'data_finish' => $data_finish,
                'month'       => $month,
                'year'        => $year,
               
            ]);   

        }
        else{

            $data = DetailCustomer::groupBy('company_id')->where('company_id', $company)->select('company_id')->get();
        
            for ($i=0; $i < count($data) ; $i++) { 

                $company_id = $data[$i]->company_id;
                $cari_tanggal_awal_pasang_per_company = DetailCustomer::where('company_id', $company_id)
                ->select('tanggal_pasang')->orderBy('tanggal_pasang', 'ASC')->get();

                $data[$i]['tanggal_pasang_awal'] =  $cari_tanggal_awal_pasang_per_company[0]->tanggal_pasang;
            }

            for ($i=0; $i < count($data) ; $i++) {  

                $company_id = $data[$i]->company_id;
                $tanggal_pasang_awal = $data[$i]->tanggal_pasang_awal;
                $cari_total_gps = DetailCustomer::where('company_id', $company_id)->whereBetween('tanggal_pasang', [$tanggal_pasang_awal, $filter_lastDay])
                ->select(DB::raw('count(gps_id) as total_gps'))->get();

                $data[$i]['total_gps'] = $cari_total_gps[0]->total_gps;
            }

            for ($i=0; $i < count($data) ; $i++) { 

                $company_id = $data[$i]->company_id;
        
                $data_pasang = DetailCustomer::where('company_id', $company_id)->whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)
                ->select(DB::raw('count(tanggal_pasang) as penambahan_layanan '))->get();

                $data[$i]['penambahan'] = $data_pasang[0]->penambahan_layanan; 
                    
            }

            for ($i=0; $i < count($data) ; $i++) { 

                $company_id = $data[$i]->company_id;
        
                $data_terminate = DetailCustomer::where('company_id', $company_id)->whereMonth('tanggal_non_aktif', $month)->whereYear('tanggal_non_aktif', $year)
                ->select(DB::raw('count(tanggal_non_aktif) as terminate')
                )->get();

                $data[$i]['terminate'] = $data_terminate[0]->terminate;  
            
                $data[$i]->total_gps = $data[$i]->total_gps - $data[$i]->terminate;   
            }

            for ($i=0; $i < count($data) ; $i++) {

                $company_id = $data[$i]->company_id;
           
                $data_reaktivasi = DetailCustomer::where('company_id', $company_id)->whereMonth('tgl_reaktivasi_gps', $month)->whereYear('tgl_reaktivasi_gps', $year)
                ->select(DB::raw('count(tgl_reaktivasi_gps) as reaktivasi')
                )->get();
    
                $data[$i]['reaktivasi'] = $data_reaktivasi[0]->reaktivasi;  
               
                $data[$i]->total_gps    = $data[$i]->total_gps  + $data[$i]->reaktivasi;
                $data[$i]->penambahan   = $data[$i]->penambahan + $data[$i]->reaktivasi;
                                    
            }
    
           
            $data_finish = $data->sortByDesc('total_gps');

            return view('customer.summary.item_summary')->with([
                'data_finish'   => $data_finish,
                'month'         => $month,
                'year'          => $year,
            ]);
        }
    }

    public function DataPo(Request $request) {
       
       $company = $request->company;

       $data = DetailCustomer::where('company_id', $company)
       ->groupBy('company_id', 'po_id')
       ->selectRaw('company_id')
       ->selectRaw('po_id')
       ->select('po_id', 
        DB::raw('count(po_id) as jumlah_per_po '),
        DB::raw('company_id')
        )->get();

        return view('customer.summary.item_po')->with([
            'data' => $data,
        ]);
    }


    public function item_summary() {

        $now            = Carbon::now();
        $month          = $now->month;
        $year           = $now->year;
        $filter_lastDay = $now->endOfMonth()->toDateString();

        $data = DetailCustomer::groupBy('company_id')->select('company_id')->get();
        
        for ($i=0; $i < count($data) ; $i++) { 

            $company_id = $data[$i]->company_id;
            $cari_tanggal_awal_pasang_per_company = DetailCustomer::where('company_id', $company_id)
            ->select('tanggal_pasang')->orderBy('tanggal_pasang', 'ASC')->get();

            $data[$i]['tanggal_pasang_awal'] =  $cari_tanggal_awal_pasang_per_company[0]->tanggal_pasang;
        }

        for ($i=0; $i < count($data) ; $i++) {  

            $company_id = $data[$i]->company_id;
            $tanggal_pasang_awal = $data[$i]->tanggal_pasang_awal;
            $cari_total_gps = DetailCustomer::where('company_id', $company_id)->whereBetween('tanggal_pasang', [$tanggal_pasang_awal, $filter_lastDay])
            ->select(DB::raw('count(gps_id) as total_gps'))->get();

            $data[$i]['total_gps'] = $cari_total_gps[0]->total_gps;
        }

        for ($i=0; $i < count($data) ; $i++) { 

            $company_id = $data[$i]->company_id;
       
            $data_pasang = DetailCustomer::where('company_id', $company_id)->whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)
            ->select(DB::raw('count(tanggal_pasang) as penambahan_layanan '))->get();

            $data[$i]['penambahan'] = $data_pasang[0]->penambahan_layanan; 
                
        }

        for ($i=0; $i < count($data) ; $i++) { 

            $company_id = $data[$i]->company_id;
       
            $data_terminate = DetailCustomer::where('company_id', $company_id)->whereMonth('tanggal_non_aktif', $month)->whereYear('tanggal_non_aktif', $year)
            ->select(DB::raw('count(tanggal_non_aktif) as terminate')
            )->get();

            $data[$i]['terminate'] = $data_terminate[0]->terminate;  
           
            $data[$i]->total_gps = $data[$i]->total_gps - $data[$i]->terminate;
                
            
        }

        for ($i=0; $i < count($data) ; $i++) {

            $company_id = $data[$i]->company_id;
       
            $data_reaktivasi = DetailCustomer::where('company_id', $company_id)->whereMonth('tgl_reaktivasi_gps', $month)->whereYear('tgl_reaktivasi_gps', $year)
            ->select(DB::raw('count(tgl_reaktivasi_gps) as reaktivasi')
            )->get();

            $data[$i]['reaktivasi'] = $data_reaktivasi[0]->reaktivasi;  
           
            $data[$i]->total_gps    = $data[$i]->total_gps  + $data[$i]->reaktivasi;
            $data[$i]->penambahan   = $data[$i]->penambahan + $data[$i]->reaktivasi;
                
            
        }

        $data_finish = $data->sortByDesc('total_gps');

        return view('customer.summary.item_summary')->with([
            'data_finish'   => $data_finish,
            'month'         => $month,
            'year'          => $year,
           
        ]);
    }
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
