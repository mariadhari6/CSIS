<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\GsmActive;
use App\Models\GsmPreActive;
use App\Models\GsmTerminate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class GsmTerminateController extends Controller
{
    //

    public function index()
    {
        return view('MasterData.GsmTerminate.index');
    }

    public function add_form()
    {
        $company = Company::orderBy('company_name', 'DESC')->get();
        $GsmActive = GsmActive::orderBy('gsm_pre_active_id', 'DESC')->get();
        $GsmPreActive = GsmPreActive::orderBy('gsm_number', 'DESC')->get();
        $GsmTerminate = GsmTerminate::with('gsmActive')->get();


        return view('MasterData.GsmTerminate.add_form')->with([
            'company' => $company,
            'GsmActive' => $GsmActive,
            'GsmPreActive' => $GsmPreActive,
            'GsmTerminate' => $GsmTerminate,

        ]);
    }

    public function item_data()
    {
        $GsmTerminate = GsmTerminate::orderBy('id', 'DESC')->get();
        return view('MasterData.GsmTerminate.item_data')->with([
            'GsmTerminate' => $GsmTerminate
        ]);
    }

    public function store(Request $request)
    {
        $data = array(
            'request_date'   => $request->request_date,
            'active_date'      => $request->active_date,
            'gsm_active_id' => $request->gsm_active_id,
            'status_active'   => $request->status_active,
            'company_id'      => $request->company_id,
            'note' => $request->note,

        );
        GsmTerminate::insert($data);
    }

    public function edit_form($id)
    {
        $GsmPreActive = GsmPreActive::orderBy('gsm_number', 'DESC')->get();
        $company = Company::orderBy('company_name', 'DESC')->get();
        $GsmActive = GsmActive::orderBy('gsm_pre_active_id', 'DESC')->get();
        $GsmTerminate = GsmTerminate::findOrfail($id);
        return view('MasterData.GsmTerminate.edit_form')->with([
            'company' => $company,
            'GsmActive' => $GsmActive,
            'GsmTerminate' => $GsmTerminate,
            'GsmPreActive' => $GsmPreActive

        ]);
    }

    public function update(Request $request, $id)
    {
        $data = GsmTerminate::findOrfail($id);
        $data->request_date = $request->request_date;
        $data->active_date = $request->active_date;
        $data->gsm_active_id = $request->gsm_active_id;
        $data->status_active = $request->status_active;
        $data->company_id = $request->company_id;
        $data->note = $request->note;
        $data->save();
    }

    public function selected()
    {
        $GsmTerminate = GsmTerminate::all();
        return view('MasterData.GsmTerminate.selected')->with([
            'GsmTerminate' => $GsmTerminate
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = GsmTerminate::findOrfail($id);
        $data->request_date = $request->request_date;
        $data->active_date = $request->active_date;
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
            DB::table('gsm_terminates')->whereIn('id', $ids)->delete();
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(GsmTerminate::all())->make(true);
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
