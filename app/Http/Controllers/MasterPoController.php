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
  

    }

}





