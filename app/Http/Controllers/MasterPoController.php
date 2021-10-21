<?php
namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\MasterPo;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MasterPoController extends Controller
{
    public function index()
    {
        return view('MasterData.MasterPo.index');
    }
    public function add_form()
    {
        $company = Company::orderBy('id', 'DESC')->get();
        $master_po = MasterPo::orderBy('po_number', 'DESC')->get();
        return view('MasterData.MasterPo.add_form')->with([
            'master_po'        => $master_po,
            'company'          => $company
        ]);
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
            'selles'            => $request->selles,
        );
        MasterPo::insert($data);
    }

    public function item_data_oslog()
    {
        $master_po = MasterPo::where('company_id', 'OSLOG')->get();
        return view('MasterData.MasterPo.item_data')->with([
            'master_po' => $master_po
        ]);
    }

    public function item_data_contract()
    {
        $master_po = MasterPo::where('status_po', 'Contract')->get();
        return view('MasterData.MasterPo.item_data')->with([
            'master_po' => $master_po
        ]);
    }

    public function item_data_terminate()
    {
        $master_po = MasterPo::where('status_po', 'Terminate')->get();
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

     public function item_data_register()
     {
         $master_po = MasterPo::where('status_po', 'Register')->get();
         return view('MasterData.MasterPo.item_data')->with([
             'master_po' => $master_po
         ]);

        }

    public function edit_form($id)
    {
        $company = Company::orderBy('id', 'DESC')->get();
        $master_po = MasterPo::findOrfail($id);
        return view('MasterData.MasterPo.edit_form')->with([
            'master_po'        => $master_po,
            'company'          => $company

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
        $data->selles           = $request->selles;

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
        $data->selles           = $request->selles;
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

}
