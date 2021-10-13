<?php

namespace App\Http\Controllers;

use App\Exports\TemplateGsm;
use App\Imports\GsmMasterImport;
use App\Models\Company;
use App\Models\Gsm;
use App\Models\GsmTemporary;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GsmMasterController extends Controller
{
    public function index()
    {
        return view('MasterData.GsmMaster.index');
    }

    public function add_form()
    {
        $company = Company::orderBy('id', 'DESC')->get();
        return view('MasterData.GsmMaster.add_form')->with([
            'company' => $company
        ]);
    }

    public function item_data()
    {
        $GsmMaster = Gsm::orderBy('id', 'DESC')->get();
        return view('MasterData.GsmMaster.item_data')->with([
            'GsmMaster' => $GsmMaster
        ]);
    }

    public function item_data_temporary()
    {
        $GsmMaster = GsmTemporary::orderBy('id', 'ASC')->get();
        return view('MasterData.GsmMaster.item_data_temporary')->with([
            'GsmMaster' => $GsmMaster
        ]);
    }

    public function item_data_ready()
    {
        $GsmMaster = Gsm::where('status_gsm', 'Ready')->get();
        return view('MasterData.GsmMaster.item_data')->with([
            'GsmMaster' => $GsmMaster
        ]);
    }

    public function item_data_active()
    {
        $GsmMaster = Gsm::where('status_gsm', 'Active')->get();
        return view('MasterData.GsmMaster.item_data')->with([
            'GsmMaster' => $GsmMaster
        ]);
    }

    public function item_data_terminate()
    {
        $GsmMaster = Gsm::where('status_gsm', 'Terminate')->get();
        return view('MasterData.GsmMaster.item_data')->with([
            'GsmMaster' => $GsmMaster
        ]);
    }

    public function store(Request $request)
    {
        $data = array(
            'status_gsm'        =>  $request->status_gsm,
            'gsm_number'        =>  $request->gsm_number,
            'company_id'        =>  $request->company_id,
            'serial_number'     =>  $request->serial_number,
            'icc_id'            =>  $request->icc_id,
            'imsi'              =>  $request->imsi,
            'res_id'            =>  $request->res_id,
            'request_date'      =>  $request->request_date,
            'expired_date'      =>  $request->expired_date,
            'active_date'       =>  $request->active_date,
            'expired_date'      =>  $request->expired_date,
            'terminate_date'    =>  $request->terminate_date,
            'note'              =>  $request->note
        );
        Gsm::insert($data);
    }

    public function edit_form($id)
    {

        $GsmMaster = Gsm::findOrfail($id);
        $company = Company::orderBy('id', 'DESC')->get();
        return view('MasterData.GsmMaster.edit_form')->with([
            'GsmMaster' => $GsmMaster,
            'company' => $company

        ]);
    }

    public function deleteTemporary()
    {
        GsmTemporary::truncate();
    }

    public function destroy($id)
    {
        $data = Gsm::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = Gsm::findOrfail($id);
        $data->status_gsm = $request->status_gsm;
        $data->gsm_number = $request->gsm_number;
        $data->company_id = $request->company_id;
        $data->serial_number = $request->serial_number;
        $data->icc_id = $request->icc_id;
        $data->imsi = $request->imsi;
        $data->res_id = $request->res_id;
        $data->request_date = $request->request_date;
        $data->expired_date = $request->expired_date;
        $data->active_date = $request->active_date;
        $data->terminate_date = $request->terminate_date;
        $data->note = $request->note;
        $data->save();
    }

    public function selected()
    {
        $GsmMaster = Gsm::all();
        return view('MasterData.GsmMaster.selected')->with([
            'GsmMaster' => $GsmMaster
        ]);
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('gsm')->whereIn('id', $ids)->delete();
        }
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('DataGsmMaster', $nameFile);

        Excel::import(new GsmMasterImport, public_path('/DataGsmMaster/' . $nameFile));
        // return redirect('/GsmMaster');
    }

    public function export()
    {
        return Excel::download(new TemplateGsm, 'template-gsm.xlsx');
    }
}
