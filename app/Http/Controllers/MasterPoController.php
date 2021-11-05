<?php

namespace App\Http\Controllers;
use App\Models\MasterPo;
use App\Models\Sales;
use App\Models\Company;
use App\Models\DetailCustomer;
use App\Models\Vehicle;
use App\Models\Seller;
use App\Models\Gsm;
use App\Models\Sensor;
use App\Models\Gps;
use App\Models\ServiceStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterPoController extends Controller
{
    public function index(){

        $company = Company::orderBy('company_name', 'DESC')->get();
        return view('master_po.index')->with([
            'company' => $company
        ]);
    }
    public function add_form(){

        $master_po  = MasterPo::orderBy('po_number', 'DESC')->get();
        $sales      = Sales::orderBy('name', 'DESC')->get();
        $company    = Company::orderBy('company_name', 'DESC')->get();

        return view('master_po.add_form')->with([
            'master_po' => $master_po,
            'sales'     => $sales,
            'company'   => $company
        ]);
    }
    public function item_data(){

        $master_po = MasterPo::orderBy('id', 'DESC')->get();
        return view('master_po.item_data')->with([
            'master_po' => $master_po
        ]);
    }


    public function store(Request $request){

        $data = array(
            'company_id'        => $request->company_id,
            'po_number'         => $request->po_number,
            'po_date'           => $request->po_date,
            'harga_layanan'     => $request->harga_layanan,
            'jumlah_unit_po'    => $request->jumlah_unit_po,
            'status_po'         => $request->status_po,
            'sales_id'          => $request->sales_id,
            'count'             => $request->jumlah_unit_po
        );

        MasterPo::insert($data);
    }

    public function edit_form($id){

        $master_po = MasterPo::findOrfail($id);
        $sales      = Sales::orderBy('name', 'DESC')->get();
        $company    = Company::orderBy('company_name', 'DESC')->get();
        return view('master_po.edit_form')->with([
            'master_po' => $master_po,
            'sales'     => $sales,
            'company'   => $company

        ]);
    }

    public function destroy($id){

        $data = MasterPo::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id){

        $data = MasterPo::findOrfail($id);
        $data->company_id = $request->company_id;
        $data->po_number = $request->po_number;
        $data->po_date = $request->po_date;
        $data->harga_layanan = $request->harga_layanan;
        $data->jumlah_unit_po = $request->jumlah_unit_po;
        $data->status_po = $request->status_po;
        $data->sales_id = $request->sales_id;
        
        $data->save();
    }

    public function selected(){

        $master_po = MasterPo::all();
        return view('master_po.selected')->with([
            'master_po' => $master_po
        ]);
    }

    public function updateall(Request $request, $id){

        $data = Gps::findOrfail($id);
        $data->company_id = $request->company_id;
        $data->po_number = $request->po_number;
        $data->po_date = $request->po_date;
        $data->harga_layanan = $request->harga_layanan;
        $data->jumlah_unit_po = $request->jumlah_unit_po;
        $data->status_po = $request->status_po;
        $data->sales_id = $request->sales_id;
        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('master_po')->whereIn('id', $ids)->delete();
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(MasterPo::all())->make(true);
        }
    }

    public function updateSelected(Request $request)
    {
        MasterPo::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }

    public function item_data_beli(){

        $master_po = MasterPo::where('status_po', 'Beli')->get();
        return view('master_po.item_data')->with([
            'master_po' => $master_po
        ]);
    }

    public function item_data_sewa(){

        $master_po = MasterPo::where('status_po', 'Sewa')->get();
         return view('master_po.item_data')->with([
             'master_po' => $master_po
         ]);
    }

    public function item_data_sewa_beli(){

         $master_po = MasterPo::where('status_po', 'Sewa Beli')->get();
         return view('master_po.item_data')->with([
            'master_po' => $master_po
         ]);
    }

    public function item_data_trial(){

        $master_po = MasterPo::where('status_po', 'Trial')->get();
        return view('master_po.item_data')->with([
            'master_po' => $master_po
        ]);

    }


    public function filter_company($id){

        $master_po = MasterPo::where('company_id', $id)->get();
        return view('master_po.item_data')->with([
            'master_po' => $master_po
        ]);

    }















































    public function check(){

  
    



        // $str = "Door(234,a)";

        // $arr = explode("()",$str);
        // return $arr;
        // $count = count($arr)-1;  

        // for ($i=0; $i <= $count; $i++) { 
        //     Sensor::where('id', $arr[$i])->update(array('status' => 'Used'));
        // }

        // return $arr[0];
        
        // $batas  = MasterPo::where('id', $i)->pluck('jumlah_unit_po');
        // $id = 1;
        // Gps::where('id', $id)->update(array('status' => 'Used'));

        // $data = DetailCustomer::where('po_id', $id )->groupBy('po_id')
        // ->selectRaw('count(*) as jumlah, po_id')
        // ->get();
        
        // $data = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
        // ->selectRaw('count(*) as jumlah, company_id')
        // ->get();

        // jumlah total gps yang status layanan aktif   
        // $data = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->count('status_layanan' , 'Active')->groupBy('company_id')->get();

            //  $i = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)
            // ->groupBy('company_id')
            // ->orderBy(DB::raw('COUNT(gps_id)','desc'))
            // ->get(array(DB::raw('COUNT(gps_id) as total_gps_active'),'company_id'));

            // $a = DetailCustomer::whereMonth('tanggal_non_aktif', $month)->whereYear('tanggal_non_aktif', $year)
            // ->groupBy('company_id')
            // ->orderBy(DB::raw('COUNT(tanggal_non_aktif)','desc'))
            // ->get(array(DB::raw('COUNT(tanggal_non_aktif) as total_terminate'),'company_id'));


            // $a = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)
            // ->groupBy('company_id')
            // ->orderBy(DB::raw('COUNT(tanggal_pasang)','desc'))
            // ->get(array(DB::raw('COUNT(tanggal_pasang) as total_penambahan'),'company_id'));
        //     $month = 10;
        //     $year = 2021;

        //     $i = DB::table('detail_customers')
        //     ->groupBy('company_id')
        //     ->select('company_id', 
        //         DB::raw('count(gps_id) as total_gps'),
        //         DB::raw('count(tanggal_pasang) as total_penambahan')
        //     )
        //     ->whereRaw('MONTH(tanggal_pasang) = ?',$month)
        //     ->whereRaw('YEAR(tanggal_pasang) = ?',$year)
        //     ->get();


            

        // return count($i);
        
    //     ->select('company_id', 
    //     DB::raw('count(tanggal_non_aktif) as total_terminate'),
    //   )
    //   ->whereRaw('MONTH(tanggal_non_aktif ) = ?',$month)
    //   ->whereRaw('YEAR(tanggal_non_aktif ) = ?',$year)
        // $company = 1;
        // $details = DetailCustomer::orderBy('id', 'DESC')->where('company_id', $company )
        //         ->get();

        // $h =  DetailCustomer::orderBy('id', 'DESC')->where('company_id', $company )
        // ->pluck('sensor_all');

        // $l = $h[0];
        // $a = explode(" ",$l );
        // $u = count($a)-1;
 
 
        // for ($i=0; $i <= $u ; $i++) { 


       

            
        
        
        // }

        // $e = MasterPo::get('jumlah_unit_po');

        // $s = DetailCustomer::groupBy('po_id')
        //     ->selectRaw('count(*) as jumlah, po_id')
        //     ->get();
        
        // return $s[0]['jumlah'];

        // $p =  DB::table('detail_customers')
        // ->join('master_pos', 'detail_customers.po_id' , '=', 'master_pos.id')
        // ->select('detail_customers.po_id' , 'master_pos.jumlah_unit_po')
        // ->get();
        // $id = 1;
        // $po         = MasterPo::orderBy('po_number', 'DESC')->where('company_id', $id)->pluck('jumlah_unit_po');

        // $cekdataada = DetailCustomer::groupBy('po_id')
        // ->selectRaw('count(*) as jumlah , po_id')
        // ->get();

        // return $cekdataada[0]['po_id'];



        // $i = DB::table('master_pos')
        //     ->groupBy('id')
        //     ->select('id', 
        //         DB::raw('jumlah_unit_po as jumlah'),
        //     )
        //     ->get();


        // return $i[0]->jumlah;
        
        // $data = DB::table('detail_customers')
        // ->groupBy('company_id')
        // ->select('company_id', 
        //     DB::raw('count(gps_id) as total_gps'),
        //     DB::raw('count(tanggal_pasang) as total_penambahan')
        // )
        // ->whereRaw('MONTH(tanggal_pasang) = ?',$month)
        // ->whereRaw('YEAR(tanggal_pasang) = ?',$year)
        // ->get();

        // return $data[0]->company_id->company->company_name;
        
        // $data = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
        // ->select('company_id', 
        //     DB::raw('count(gps_id) as total_gps'),
        // )
        // ->get();

        // $data = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
        // ->selectRaw('count(*) as jumlah, company_id')
        // ->get();

        // $data1 = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
        // ->select('company_id', 
        //     DB::raw('count(gps_id) AS total_gps WHERE status_layanan = "In Active"'),
        //     DB::raw('count(tanggal_pasang) AS penambahan_layanan '),
        // )   
        // ->get();

        // $data2 = DetailCustomer::whereMonth('tanggal_non_aktif', $month)->whereYear('tanggal_non_aktif', $year)->groupBy('company_id')
        // ->select('company_id', 
        //     DB::raw('count(tanggal_non_aktif) as total_terminate '),
        // )   
        // ->get();


        
        // $merge=$data2->merge($data1);

        // $out=(int)$data2->total_terminate-(int)$data1->penambahan_layanan;
    
        // return $out;

        

        


        









        // join antara $a[] dengan id pada sensor
        
            // $d =  DB::table('detail_customers')
            // ->join('sensors', 'detail_customers.sensor_all' , '=', 'sensors.id')
            // ->select('detail_customers.sensor_all' , 'sensors.sensor_name')
            // ->get();

            // // return $d;
            // $month = 11;
            // $year  = 2021;
            // $users = DB::table('detail_customers')
            // ->selectRaw('count(gps_id) as total_gps  WHERE status_layanan = Active, company_id')
            // ->groupBy('company_id')
            // ->get();

           


            // $data1 = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
            // ->select('company_id', 
            //     DB::raw('count(gps_id) as total_gps'),
            //     DB::raw('count(tanggal_pasang) as penambahan_layanan '),
            // )   
            // ->get();


            // $data2 = DetailCustomer::whereMonth('tanggal_non_aktif', $month)->whereYear('tanggal_non_aktif', $year)->groupBy('company_id')
            // ->select('company_id', 
            //     DB::raw('count(tanggal_non_aktif) as total_terminate '),
            // )
            // ->union($data1)   
            // ->get();


          

            // $company = 5;
            // $month = 10;
            // $year = 2021;

            // $data = DetailCustomer::where('company_id', $company)->whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)
            // ->groupBy('company_id')->groupBy('po_id')
            // ->selectRaw('company_id')
            // ->selectRaw('po_id')
            // ->get();

        //    return DetailCustomer::join('master_pos', 'master_pos.harga_layanan', '=' , 'detail_customers.id' )
        //     ->get(['detail_customers.id', DB::raw('sum(master_pos.value) as value')])
        //     ->sum('value');

            // $d =  DetailCustomer::join('master_pos', 'detail_customers.harga_layanan' , '=', 'master_pos.id')
            // ->select('detail_customers.harga_layanan' , 'master_pos.harga_layanan')
            // ->get();

            // $t = DetailCustomer::with('sensor')->get();

            // dd($t);
            // return $d;
    
            // return $data ;
            // $i = 7;
            // $details    = DetailCustomer::where('po_id', $i)->count();

            // return $details;
            // $i = 7;
            // $s                       = MasterPo::where('id', $i)->pluck('jumlah_unit_po');

            // return $s[0];
            // $banyak_po_di_details    = DetailCustomer::where('po_id', $i)->count();

            // MasterPo::where('id', $i)->update(array('count' => $banyak_po_di_details)) ;  
            // $status_layanan = ServiceStatus::all();

          

            // $data_pasang = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
            // ->where('status_id', "1")
            // ->select('company_id', 
            //     DB::raw('count(gps_id) as total_gps'),
            //     DB::raw('count(tanggal_pasang) as penambahan_layanan ')
            // )   
            // ->get();

            // $data_terminate = DetailCustomer::whereMonth('tanggal_non_aktif', $month)->whereYear('tanggal_non_aktif', $year)->groupBy('company_id')
            // ->where('status_temporary', "1")
            // ->select('company_id', 
            //     DB::raw('count(tanggal_non_aktif) as terminate '),
            // )
            // ->get();

            // $data = array();
            // $company_id_terminate = array(); // [12, 2, 4, 1]
            // $company_id_pasang = array();

            // foreach($data_terminate as $dt) {
            //     array_push($company_id_terminate, $dt['company_id']);
            // }

            // foreach($data_pasang as $dp) {
            //     array_push($company_id_pasang, $dp['company_id']);
            // }

            // print(count($data_terminate));

            // for ($i=0; $i < count($data_pasang); $i++) {
            //     $data_ = $data_pasang[$i];

            //     if (in_array($data_['company_id'], $company_id_terminate)) {
            //         // print('ada');
            //         $idx_terminate = array_search($data_['company_id'], $company_id_terminate); // get index of terminate
            //         $data_['terminate'] = $data_terminate[$idx_terminate]['terminate'];
            //         // print($data_['terminate']);
            //     }
            //     else {
            //         $data_['terminate'] = 0;
            //     }

            //     array_push($data, $data_);
            // }

            // if (count($data_pasang) > 0 && count($data_terminate) > 0) {
            //     for ($i=0; $i < count($data_pasang); $i++) {
            //         $data_ = $data_pasang[$i];
    
            //         if (in_array($data_['company_id'], $company_id_terminate)) {
            //             // print('ada');
            //             $idx_terminate = array_search($data_['company_id'], $company_id_terminate); // get index of terminate
            //             $data_['terminate'] = $data_terminate[$idx_terminate]['terminate'];
            //             // print($data_['terminate']);
            //         }
            //         else {
            //             $data_['terminate'] = 0;
            //         }
    
            //         array_push($data, $data_);
            //     }
            // }

            // else if (count($data_pasang) < 1 && count($data_terminate) > 0) {
            //     for ($i=0; $i < count($data_terminate); $i++) {
            //         $data_ = $data_terminate[$i];
    
            //         if (in_array($data_['company_id'], $company_id_pasang)) {
            //             // print('ada');
            //             $idx_terminate = array_search($data_['company_id'], $company_id_pasang); // get index of terminate
            //             $data_['terminate'] = $data_terminate[$idx_terminate]['terminate'];
            //             // print($data_['terminate']);
            //         }
            //         else {
            //             $data_['terminate'] = 0;
            //         }
    
            //         array_push($data, $data_);
            //     }
            // }
    
            // return $data;

           // 4 November 2021

        //    $data_pasang = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
        //    ->where('status_temporary', "1")
        //    ->select('company_id',
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
        
           
        //         for ($i=0; $i < count($data_pasang); $i++) {
        //             $data_ = $data_pasang[$i];
                    
        //             if (in_array($data_['company_id'], $company_id_terminate)) {

        //                 $idx_terminate = array_search($data_['company_id'], $company_id_terminate); // get index of terminate
        //                 $data_['terminate'] = $data_terminate[$idx_terminate]['terminate']; // hasil terminate masuk
        //             }
        //             else {
        //                 $data_['terminate'] = 0;
        //             }
        //             array_push($data, $data_);
                    
        //         }
        
    
        //    $data_complete = array();
        //    $company_id_total_gps = array();

        //    foreach($total_gps as $st){
        //        array_push($company_id_total_gps, $st['company_id']);
        //    }

        //     for ($i=0; $i < count($data) ; $i++) { 
        //       $data_finish = $data[$i];

        //       if (in_array($data_finish['company_id'], $company_id_total_gps)) {
        //         $idx_total_gps  = array_search($data_finish['company_id'], $company_id_total_gps);
        //         $data_finish['total'] = $total_gps[$idx_total_gps]['total_gps'];

                  
        //       }else{
        //           $data_finish['total'] = 0; 
        //       }

        //       array_push($data_complete, $data_finish);

        //   }

        //   return $data_complete;  

        // $month = 11;
        // $year  = 2021; 
        // $company = 66;
        
        // $data = DetailCustomer::where('company_id', $company)->whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->where('status_temporary', "1")
        // ->groupBy('company_id', 'po_id')
        // ->selectRaw('company_id')
        // ->selectRaw('po_id')
        // ->get();

        //  return $data;
      
        
        // for ($i=0; $i < count($data) ; $i++) { 
        //     $i = $data[$i]->po_id;

         

        //     $cari_po = MasterPO::where('id', $i)->get();
        //     // return $cari_po;
        //     $jumlah = $cari_po[0]->jumlah_unit_po;
        //     $harga  = $cari_po[0]->harga_layanan;

        //     $hasil_perkalian = $jumlah * $harga;

        //     $data[$i]['hasil_perkalian'] = $hasil_perkalian;
        //     // print($hasil_perkalian);
        // }


        // $master = MasterPo::where('company_id', 66)
        // ->selectRaw('count(harga_layanan) as total harga_layanan')
        // ->get();

        // return $master;



        // 5 November 2021

        $month = 11;
        $year  = 2021; 

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

    
        return $data_complete;


           


        
           
             
    
        // return $data;



        








        
        


     


        
    
        




    }

}

// $d =  DB::table('detail_customers')
// ->join('pics', 'detail_customers.company_id' , '=', 'pics.company_id')
// ->select('detail_customers.company_id' , 'pics.pic_name')
// ->get();

// return $d;


