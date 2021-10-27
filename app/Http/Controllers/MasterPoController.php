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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterPoController extends Controller
{
    public function index()
    {
        return view('master_po.index');
    }
    public function add_form()
    {
        $master_po  = MasterPo::orderBy('po_number', 'DESC')->get();
        $sales      = Sales::orderBy('name', 'DESC')->get();
        $company    = Company::orderBy('company_name', 'DESC')->get();
        return view('master_po.add_form')->with([
            'master_po' => $master_po,
            'sales'     => $sales,
            'company'   => $company
        ]);
    }
    public function item_data()
    {
        $master_po = MasterPo::orderBy('id', 'ASC')->get();
        return view('master_po.item_data')->with([
            'master_po' => $master_po
        ]);
    }
    public function store(Request $request)
    {
        $data = array(
            'company_id' => $request->company_id,
            'po_number' => $request->po_number,
            'po_date' => $request->po_date,
            'harga_layanan' => $request->harga_layanan,
            'jumlah_unit_po' => $request->jumlah_unit_po,
            'status_po' => $request->status_po,
            'sales_id' => $request->sales_id
        );
        MasterPo::insert($data);
    }

    public function edit_form($id)
    {
        $master_po = MasterPo::findOrfail($id);
        $sales      = Sales::orderBy('name', 'DESC')->get();
        $company    = Company::orderBy('company_name', 'DESC')->get();
        return view('master_po.edit_form')->with([
            'master_po' => $master_po,
            'sales'     => $sales,
            'company'   => $company

        ]);
    }

    public function destroy($id)
    {
        $data = MasterPo::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
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

    public function selected()
    {
        $master_po = MasterPo::all();
        return view('master_po.selected')->with([
            'master_po' => $master_po
        ]);
    }

    public function updateall(Request $request, $id)
    {
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

    public function check(){

        // $master_po = Seller::pluck('no_agreement_letter', 'id');
            // $id = 1;
        //     $master_po = Seller::select(DB::raw('CONCAT(no_agreement_letter, " - ", status) AS full_name, id'))
        //    ->pluck('full_name', 'id');
        $id = 1;
        // $data = Seller::all()->where('id', $id)->map->only('no_agreement_letter')->iterator_to_array();
        // $data = DB::table("sellers")
        //             ->where("id", $id)
        //             ->pluck('no_agreement_letter', 'id');

        // $data = Seller::all()->where('id', $id) ->mapWithKeys(function ($item){
        //  return [
        //     $item['id'] => Seller($item)->only(['no_agreement_letter', 'status'])->all()
        //  ];
        // });

        // $keyed = Seller::all()->where('id', $id)->mapWithKeys(function ($item, $key) {
        //     return [$item['id'] => $item->only(['seller_name','seller_code'])
        //     ];
        // });
        
        // $data = $keyed->all();
        // $id = "OSLOG" ;
    //     $id = 1;

    //    return collect([
    //         ['id' => 1, 'name' => 'A'],
    //         ['id' => 1, 'name' => 'B'],
    //         ['id' => 3, 'name' => 'C']
    //     ])->where('id', $id)->mapWithKeys(function($item){
    //         return [
    //             $item['id'] => collect($item)->only(['name'])->all()
    //         ];
    //     });

        // $key = Vehicle::all()->where('company_id', $id)->mapWithKeys(function ($item) {
        //     return [$item['company_id'] => $item->only(['license_plate', 'vehicle_id'])
        //     ];
        // });


    //    $all = Vehicle::all()->where('company_id', $id);
    //    $keyed = $all->mapWithKeys(function ($item) {
    //     return [$item['company_id'] => $item
    // ];
    // });
        // $key = Vehicle::orderBy('id', 'DESC')->where('company_id', $id)->orWhere('company_id', $id)->get();
        
        // $key = Vehicle::all()->where('company_id', $id)->groupBy('license_plate');

       
        // dd($key->all());

      
    // $data = Vehicle::with('company')->groupBy('company_id')
    // ->selectRaw('count(*) as jumlah, company_id')
    // ->selectRaw('license_plate as plate')
    // ->get();
    // $id = 1;
    // $key = Vehicle::all()->where('company_id', $id)->mapToDictionary(function ($item){
    //     return [$item['company_id'] => $item['license_plate']
    // ];
    // });

    // $key = Vehicle::all()->where('company_id', $id)->mapWithKeys(function ($item, $key) {
    //     return [$item['company_id'] => $item->only(['license_plate'])
    //     ];
    // });

    
    //  $details = DetailCustomer::with('vehicle')->get();
    // $data = Sensor::groupBy('sensor_name')
    // ->selectRaw('count(*) as jumlah, sensor_name')
    // ->get();
    $id = 6;

    
    
    // $count = DetailCustomer::where('po_id', $id)->count();
    // // ->get();

    // $data = MasterPo::where('id', $id)->pluck('jumlah_unit_po');
    // $i = json_decode($data);

    // // foreach ($data as $key->jumlah_unit_po) {
            
    // //   echo $key ;

    // // }
    
  
    // if( $count <= $data[0]){

    //     echo "masih kurang  atau pas";
    // }else{
    //     echo "kelebihan";
    
    // }

    // return $ijumlah_unit_po;
    // return $data->jumlah;
    
       
        // $data = Carbon::now();
        // $bulan = $data->month;
        // $tahun = $data->year;

        // return $tahun;
        // $month = 10;
        // $year = 2021;
        // $data = DetailCustomer::whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)->groupBy('company_id')
        // ->selectRaw('count(*) as jumlah, company_id')
        // // ->get();
        // $id = 8;
        // $data = DetailCustomer::where('po_id', $id )->groupBy('po_id')
        // ->selectRaw('count(*) as jumlah, po_id')
        // ->get();



        // $data = DetailCustomer::where('po_id', $id)->get('gps_id');

        // $data = DB::table('detail_customers')
        // ->where('po_id', $id)
        // ->select()
        // ->whereRaw($where['rawQuery'], isset($where['bindParams']) ? $where['bindParams'] : array())
        // ->get()
        // ->groupBy('po_id');


        // return $data;

        $str = "1 2 3";

        // $arr = explode(" ",$str);
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
        $company = 1;
        $details = DetailCustomer::orderBy('id', 'DESC')->where('company_id', $company )
                ->get();

        $h =  DetailCustomer::orderBy('id', 'DESC')->where('company_id', $company )
        ->pluck('sensor_all');

        $l = $h[0];
        $a = explode(" ",$l );
        $u = count($a)-1;
 
 
        for ($i=0; $i <= $u ; $i++) { 


            $d =  DB::table('detail_customers')
            ->join('sensors', 'detail_customers.sensor_all' , '=', 'sensors.id')
            ->select('detail_customers.sensor_all' , 'sensors.sensor_name')
            ->get();

            
        
        
        }

        $e = MasterPo::get('jumlah_unit_po');

        $s = DetailCustomer::groupBy('po_id')
            ->selectRaw('count(*) as jumlah, po_id')
            ->get();
        
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
        $month = 10;
        $year  = 2021;
        $data = DB::table('detail_customers')
        ->groupBy('company_id')
        ->select('company_id', 
            DB::raw('count(gps_id) as total_gps'),
            DB::raw('count(tanggal_pasang) as total_penambahan')
        )
        ->whereRaw('MONTH(tanggal_pasang) = ?',$month)
        ->whereRaw('YEAR(tanggal_pasang) = ?',$year)
        ->get();

        return $data[0]->company_id->company->company_name;
        


        

        


        









        // join antara $a[] dengan id pada sensor
        
       
      


    }

}


