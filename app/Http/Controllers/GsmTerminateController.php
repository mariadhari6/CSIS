<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\GsmActive;
use App\Models\Gsm;
use App\Models\GsmPreActive;
use App\Models\GsmTerminate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class GsmTerminateController extends Controller
{
    public function index()
    {
        return view('MasterData.GsmTerminate.index');
    }

    public function item_data()
    {
        $GsmTerminate = Gsm::where('status_gsm', 'Terminate')->get();
        return view('MasterData.GsmTerminate.item_data')->with([
            'GsmTerminate' => $GsmTerminate
        ]);
    }

    public function item_data_MY(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $GsmTerminate = Gsm::where('status_gsm', 'Terminate')->whereMonth('terminate_date',  $month)->whereYear('terminate_date', $year)->get();
        return view('MasterData.GsmTerminate.item_data')->with([
            'GsmTerminate' => $GsmTerminate
        ]);
    }

    public function edit_form($id)
    {
        $company = Company::orderBy('company_name', 'ASC')->get();
        $GsmTerminate = Gsm::findOrfail($id);
        return view('MasterData.GsmTerminate.edit_form')->with([
            'company' => $company,
            'GsmTerminate' => $GsmTerminate
        ]);
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
        $data->request_date = $request->request_date;
        $data->terminate_date = $request->terminate_date;
        $data->note = $request->note;
        $data->save();
    }

    public function selected()
    {
        $GsmTerminate = Gsm::all();
        return view('MasterData.GsmTerminate.selected')->with([
            'GsmTerminate' => $GsmTerminate
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = Gsm::findOrfail($id);
        $data->request_date = $request->request_date;
        $data->terminate_date = $request->terminate_date;
        $data->gsm_active_id = $request->gsm_active_id;
        $data->status_active = $request->status_active;
        $data->company_id = $request->company_id;
        $data->note = $request->note;
        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('gsm')->whereIn('id', $ids)->delete();
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(Gsm::all())->make(true);
        }
    }

    public function updateSelected(Request $request)
    {
        GsmActive::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }

    public function dependentTerminate($id)
    {
        $data = DB::table("gsm_actives")
            ->where("gsm_pre_active_id", $id)
            ->pluck('company_id', 'id');
        return json_encode($data);
    }


    public function showCompany($id)
    {
        $data = DB::table("companies")
            ->where("id", $id)
            ->pluck('company_name', 'id');
        return json_encode($data);
    }
}
