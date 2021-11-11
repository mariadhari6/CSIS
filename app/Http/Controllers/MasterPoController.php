<?php
namespace App\Http\Controllers;
use App\Exports\TamplateMasterPo;
use App\Imports\MasterPoImport;
use App\Models\Company;
use App\Models\MasterPo;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
class MasterPoController extends Controller
{
    public function index()
    {
        $company = Company::orderBy('company_name', 'DESC')->get();
        return view('MasterData.MasterPo.index')->with([
            'company'          => $company
        ]);
    }
    public function add_form()
    {
        $sales = Sales::orderBy('id', 'ASC')->get();
        $company = Company::orderBy('id', 'ASC')->get();
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
            try {
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
                // return 'success';
            } catch (\Throwable $th) {
                return 'fail';
            }
        }
    }
    public function item_data()
    {
        $master_po = MasterPo::orderBy('id', 'DESC')->get();
        return view('MasterData.MasterPo.item_data', compact('master_po'));
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
    public function item_data_beli()
    {
        $master_po = MasterPo::where('status_po', 'Beli')->get();
        return view('MasterData.MasterPo.item_data')->with([
            'master_po' => $master_po
        ]);
    }
    public function item_data_sewa()
    {
        $master_po = MasterPo::where('status_po', 'Sewa')->get();
        return view('MasterData.MasterPo.item_data')->with([
            'master_po' => $master_po
        ]);
    }
    public function item_data_sewa_beli()
    {
        $master_po = MasterPo::where('status_po', 'Sewa Beli')->get();
        return view('MasterData.MasterPo.item_data')->with([
            'master_po' => $master_po
        ]);
    }
    public function item_data_trial()
    {
        $master_po = MasterPo::where('status_po', 'Trial')->get();
        return view('MasterData.MasterPo.item_data')->with([
            'master_po' => $master_po
        ]);
    }
    public function filter_company($id)
    {
        $master_po = MasterPo::orderBy('id', 'DESC')->where('company_id', $id)->get();
        return view('MasterData.MasterPo.item_data')->with([
            'master_po' => $master_po
        ]);
    }
    public function edit_form($id)
    {
        $sales = Sales::orderBy('id', 'ASC')->get();
        $company = Company::orderBy('id', 'DESC')->get();
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
        MasterPo::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }
    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('DataMasterPo', $nameFile);
        Excel::import(new MasterPoImport, public_path('/DataMasterPo/' . $nameFile));
        // return redirect('/GsmMaster');
    }
    public function export()
    {
        return Excel::download(new TamplateMasterPo, 'template-MasterPo.xlsx');
    }
}
