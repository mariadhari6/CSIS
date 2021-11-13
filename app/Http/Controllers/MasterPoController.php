<?php

namespace App\Http\Controllers;
use App\Models\MasterPo;
use App\Models\Pic;
use App\Models\Sales;
use App\Models\Company;
use App\Models\DetailCustomer;
use App\Models\Vehicle;
use App\Models\Seller;
use App\Models\Gsm;
use App\Models\Sensor;
use App\Models\Gps;
use App\Models\VehicleType;
use App\Models\ServiceStatus;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\TamplateMasterPo;
use App\Imports\MasterPoImport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;



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

    public function importExcel(Request $request) {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('DataMasterPo', $nameFile);

        Excel::import(new MasterPoImport, public_path('/DataMasterPo/' . $nameFile));
        // return redirect('/GsmMaster');
    }

    public function export() {

        return Excel::download(new TamplateMasterPo, 'template-MasterPo.xlsx');
    }

    public function check() {
        // $vehicle = 122;
        // $imei = DetailCustomer::where('vehicle_id', $vehicle)->pluck('imei');
        // $gsm = DetailCustomer::where('vehicle_id', $vehicle)->pluck('gsm_id');
        // $type = DetailCustomer::where('vehicle_id', $vehicle)->pluck('type');
        // return $type[0];


        // $now            = Carbon::now();
        // $month          = $now->month;
        // $year           = $now->year;
        // $filter_lastDay = $now->endOfMonth()->toDateString();

        // $data = DetailCustomer::groupBy('company_id')->select('company_id')->get();
        
        // for ($i=0; $i < count($data) ; $i++) { 

        //     $company_id = $data[$i]->company_id;
        //     $cari_tanggal_awal_pasang_per_company = DetailCustomer::where('company_id', $company_id)
        //     ->select('tanggal_pasang')->orderBy('tanggal_pasang', 'ASC')->get();

        //     $data[$i]['tanggal_pasang_awal'] =  $cari_tanggal_awal_pasang_per_company[0]->tanggal_pasang;
        // }

        // for ($i=0; $i < count($data) ; $i++) {  

        //     $company_id = $data[$i]->company_id;
        //     $tanggal_pasang_awal = $data[$i]->tanggal_pasang_awal;
        //     $cari_total_gps = DetailCustomer::where('company_id', $company_id)->whereBetween('tanggal_pasang', [$tanggal_pasang_awal, $filter_lastDay])
        //     ->select(DB::raw('count(gps_id) as total_gps'))->get();

        //     $data[$i]['total_gps'] = $cari_total_gps[0]->total_gps;
        // }

        // for ($i=0; $i < count($data) ; $i++) { 

        //     $company_id = $data[$i]->company_id;
       
        //     $data_pasang = DetailCustomer::where('company_id', $company_id)->whereMonth('tanggal_pasang', $month)->whereYear('tanggal_pasang', $year)
        //     ->select(DB::raw('count(tanggal_pasang) as penambahan_layanan '))->get();

        //     $data[$i]['penambahan'] = $data_pasang[0]->penambahan_layanan; 
                
        // }

        // for ($i=0; $i < count($data) ; $i++) { 

        //     $company_id = $data[$i]->company_id;
       
        //     $data_terminate = DetailCustomer::where('company_id', $company_id)->whereMonth('tanggal_non_aktif', $month)->whereYear('tanggal_non_aktif', $year)
        //     ->select(DB::raw('count(tanggal_non_aktif) as terminate')
        //     )->get();

        //     $data[$i]['terminate'] = $data_terminate[0]->terminate;  
           
        //     $data[$i]->total_gps = $data[$i]->total_gps - $data[$i]->terminate;
                
            
        // }

        // for ($i=0; $i < count($data) ; $i++) {

        //     $company_id = $data[$i]->company_id;
       
        //     $data_reaktivasi = DetailCustomer::where('company_id', $company_id)->whereMonth('tgl_reaktivasi_gps', $month)->whereYear('tgl_reaktivasi_gps', $year)
        //     ->select(DB::raw('count(tgl_reaktivasi_gps) as reaktivasi')
        //     )->get();

        //     $data[$i]['reaktivasi'] = $data_reaktivasi[0]->reaktivasi;  
           
        //     $data[$i]->total_gps    = $data[$i]->total_gps  + $data[$i]->reaktivasi;
        //     $data[$i]->penambahan   = $data[$i]->penambahan + $data[$i]->reaktivasi;
                
            
        // }

        // return $data;
        // $warning = array();
        // $id = 454;
        // $cek_detail = DetailCustomer::where('imei', $id)->first();
        

        // $cek_status = DetailCustomer::where('imei', $id)->where('status_id', 1)->get();
        // $cari_company    = DetailCustomer::where('imei', $id)->where('status_id', 1)->first();
        // $license    = DetailCustomer::where('imei', $id)->where('status_id', 1)->pluck('licence_plate')->first();
        // $company['company_id'] = $cari_company;
        // for ($i=0; $i <count($cek_status) ; $i++) { 
        //     $cek_status[$i]['terpasang'] = "terpasang";
        // }

        // return $cek_status;

        // foreach ($cek_status as $item) {
           

        //     return $item->licence_plate;    
        // }
        // $h = Company::where('id', 69)->get();

        // return $h[0]->id;

        // return $license;
    

        // $company = DetailCustomer::groupBy('company_id')->select('company_id')->get();

        // for ($i=0; $i < count($company) ; $i++) { 
        //     $a = $company[$i]->company_id;
        //     $cari_pic            = Pic::where('company_id', $a)->get();
        //     $total_gps_installed = DetailCustomer::where('company_id', $a)->select(DB::raw('count(gps_id) as total_gps_installed'))->get();
        //     $company[$i]["pic"]  = $cari_pic;
        //     $company[$i]["total_gps_installed"] = $total_gps_installed;
            
        // }

        // return $company;
          
        // $data = DetailCustomer::groupBy('company_id')->select('company_id')->get();
        // for ($i=0; $i < count($data) ; $i++) { 

        //     $company_id = $data[$i]->company_id;
        //     $cari_tanggal_awal_pasang_per_company = DetailCustomer::where('company_id', $company_id)
        //     ->select('tanggal_pasang')->orderBy('tanggal_pasang', 'ASC')->get();

        //     print($cari_tanggal_awal_pasang_per_company);
        //     // $data[$i]['tanggal_pasang_awal'] =  $cari_tanggal_awal_pasang_per_company[0]->tanggal_pasang;
        // }

        $time = '2021-11-13 09:00:00';
        $a = Carbon::parse($time);

        $satu_jam = $a->addHours(1);
        // $t = date("H:i",strtotime($time));

        $enter ='2021-11-13 10:01:00';;
        if ( $enter <= $satu_jam) {
            echo 'tidak telat';
        }
        else {
            echo 'telat';
        }

        // return $satu_jam;

     

      





        

      



        

    }

}





