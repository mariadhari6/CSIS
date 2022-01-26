<?php

namespace App\Http\Controllers;

use App\Exports\MasterPoExport;
use App\Exports\TamplateMasterPo;
use App\Imports\MasterPoImport;
use App\Models\Company;
use App\Models\MasterPo;
use App\Models\DetailCustomer;
use App\Models\Sales;
use App\Models\Sensor;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use carbon\Carbon;

class MasterPoController extends Controller
{
    public function index()
    {
        $company = Company::orderBy('company_name', 'ASC')->get();
        return view('MasterData.MasterPo.index')->with([
            'company' => $company
        ]);
    }
    public function add_form()
    {
        $sales = Sales::orderBy('id', 'ASC')->get();
        $company = Company::orderBy('company_name', 'ASC')->get();
        $master_po = MasterPo::orderBy('po_number', 'ASC')->get();
        return view('MasterData.MasterPo.add_form')->with([
            'master_po'        => $master_po,
            'company'          => $company,
            'sales'          => $sales
        ]);
    }
    public function save_import(Request $request)
    {
        $dataRequest = json_decode($request->data);
        foreach ($dataRequest as $key => $value) {
            $data = array(
                'company_id'        => Company::where('company_name', $value->company_id)->firstOrFail()->id,
                'po_number'         =>  $value->po_number,
                'po_date'           => $value->po_date,
                'harga_layanan'     =>  $value->harga_layanan,
                'jumlah_unit_po'    =>  $value->jumlah_unit_po,
                'status_po'         => $value->status_po,
                'sales_id'            =>  $value->sales_id,
                'count'             => $value->jumlah_unit_po,

            );

            MasterPo::insert($data);
        }
    }

    public function item_data(Request $request)
    {
        $length = ($request->length === null) ? 50 : (int)$request->length;
        $master_po = MasterPo::orderBy('id', 'DESC')->paginate($length);
        $no = ($request->no === null) ? 1 : $request->no;
        return view('MasterData.MasterPo.item_data')->with([
            'master_po' => $master_po,
            'no'        => $no
        ]);
    }

    public function item_data_search(Request $request)
    {
        $query = MasterPo::query();
        $columns = array( 'company_id', 'po_number', 'po_date', 'harga_layanan', 'jumlah_unit_po', 'status_po', 'sales_id', 'count' );
        foreach($columns as $column){
            $query->orWhere($column, 'LIKE', '%' . $request->text . '%');
        }
        $master_po = $query->paginate(50);
        $no = ($request->no === null) ? 1 : $request->no;
        return view('MasterData.MasterPo.item_data')->with([
            'master_po' => $master_po,
            'no' => $no
        ]);
    }

    public function item_data_page_length(Request $request)
    {
        $master_po = MasterPo::orderBy('id', 'DESC')->paginate((int)$request->length);
        $no = ($request->no === null) ? 1 : $request->no;
        return view('MasterData.MasterPo.item_data')->with([
            'master_po' => $master_po,
            'no' => $no
        ]);
    }

    public function store(Request $request)
    {
        $data = array(
            'company_id'        => $request->company_id,
            'po_number'         => $request->po_number,
            'po_date'           => $request->po_date,
            'harga_layanan'     => $request->harga_layanan,
            'jumlah_unit_po'    => $request->jumlah_unit_po,
            'status_po'         => $request->status_po,
            'sales_id'            => $request->sales_id,
            'count'             => $request->jumlah_unit_po,
        );
        MasterPo::insert($data);
    }

    public function item_data_beli(Request $request)
    {
        $length = ($request->length === null) ? 50 : (int)$request->length;
        $master_po = MasterPo::where('status_po', 'Beli')->paginate($length);
        $no = ($request->no === null) ? 1 : $request->no;
        return view('MasterData.MasterPo.item_data')->with([
            'master_po' => $master_po,
            'no'        => $no
        ]);
    }

    public function item_data_sewa(Request $request)
    {
        $length = ($request->length === null) ? 50 : (int)$request->length;
        $master_po = MasterPo::where('status_po', 'Sewa')->paginate($length);
        $no = ($request->no === null) ? 1 : $request->no;
        return view('MasterData.MasterPo.item_data')->with([
            'master_po' => $master_po,
            'no'        => $no
        ]);
    }

    public function item_data_sewa_beli(Request $request)
    {
        $length = ($request->length === null) ? 50 : (int)$request->length;
        $master_po = MasterPo::where('status_po', 'Sewa Beli')->paginate($length);
        $no = ($request->no === null) ? 1 : $request->no;
        return view('MasterData.MasterPo.item_data')->with([
            'master_po' => $master_po,
            'no'        => $no
        ]);
    }

    public function item_data_trial(Request $request)
    {
        $length = ($request->length === null) ? 50 : (int)$request->length;
        $master_po = MasterPo::where('status_po', 'Trial')->paginate($length);
        $no = ($request->no === null) ? 1 : $request->no;
        return view('MasterData.MasterPo.item_data')->with([
            'master_po' => $master_po,
            'no'        =>$no
        ]);
    }

    public function filter_company(Request $request, $id)
    {
        $length = ($request->length === null) ? 50 : (int)$request->length;
        $master_po = MasterPo::orderBy('id', 'DESC')->where('company_id', $id)->paginate($length);
        $no = ($request->no === null) ? 1 : $request->no;
        return view('MasterData.MasterPo.item_data')->with([
            'master_po' => $master_po,
            'no'        => $no

        ]);
    }

    public function edit_form($id)
    {
        $sales = Sales::orderBy('id', 'ASC')->get();
        $company = Company::orderBy('company_name', 'ASC')->get();
        $master_po = MasterPo::findOrfail($id);
        return view('MasterData.MasterPo.edit_form')->with([
            'master_po'        => $master_po,
            'company'          => $company,
            'sales'          => $sales
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
        $data->company_id       = $request->company_id;
        $data->po_number        = $request->po_number;
        $data->po_date          = $request->po_date;
        $data->harga_layanan    = $request->harga_layanan;
        $data->jumlah_unit_po   = $request->jumlah_unit_po;
        $data->status_po        = $request->status_po;
        $data->sales_id           = $request->sales_id;
        $data->count           = $request->jumlah_unit_po;

        $data->save();
    }

    public function selected()
    {
        $master_po = MasterPo::all();
        return view('MasterData.MasterPo.selected')->with([
            'master_po' => $master_po
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = MasterPo::findOrfail($id);
        $data->company_id       = $request->company_id;
        $data->po_number        = $request->po_number;
        $data->po_date          = $request->po_date;
        $data->harga_layanan    = $request->harga_layanan;
        $data->jumlah_unit_po   = $request->jumlah_unit_po;
        $data->status_po        = $request->status_po;
        $data->sales_id           = $request->sales_id;
        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('master_pos')->whereIn('id', $ids)->delete();
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
        MasterPo::where('item_type_id', '=', 1)->update(['colour' => 'black']);
    }
    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('DataMasterPo', $nameFile);
        Excel::import(new MasterPoImport, public_path('/DataMasterPo/' . $nameFile));
    }

    public function export()
    {
        return Excel::download(new TamplateMasterPo, 'template-MasterPo.xlsx');
    }

    public function export_masterPO()
    {
        return Excel::download(new MasterPoExport, 'MasterPo.xlsx');
    }

}
