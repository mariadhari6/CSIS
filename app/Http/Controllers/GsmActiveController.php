<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\GsmActive;
use App\Models\GsmPreActive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class GsmActiveController extends Controller
{
    //
    public function index()
    {
        return view('GsmActive.index');
    }
    public function add_form()
    {
        $company = Company::orderBy('company_name', 'DESC')->get();
        $GsmPreActive = GsmPreActive::orderBy('gsm_number', 'DESC')->get();
        return view('GsmActive.add_form')->with([
            'company' => $company,
            'GsmPreActive' => $GsmPreActive

        ]);
    }

    public function item_data()
    {
        $GsmActive = GsmActive::orderBy('id', 'DESC')->get();
        return view('GsmActive.item_data')->with([
            'GsmActive' => $GsmActive
        ]);
    }

    public function store(Request $request)
    {
        $data = array(
            'gsm_pre_active_id' => $request->gsm_pre_active_id,
            'request_date'   => $request->request_date,
            'active_date'      => $request->active_date,
            'status_active'   => $request->status_active,
            'company_id'      => $request->company_id,
            'note' => $request->note

        );
        GsmActive::insert($data);
    }

    public function edit_form($id)
    {
        $company = Company::orderBy('company_name', 'DESC')->get();
        $GsmPreActive = GsmPreActive::orderBy('gsm_number', 'DESC')->get();
        $GsmActive     = GsmActive::findOrfail($id);
        return view('GsmActive.edit_form')->with([
            'company' => $company,
            'GsmActive' => $GsmActive,
            'GsmPreActive' => $GsmPreActive

        ]);
    }

    public function update(Request $request, $id)
    {
        $data = GsmActive::findOrfail($id);
        $data->gsm_pre_active_id = $request->gsm_pre_active_id;
        $data->request_date = $request->request_date;
        $data->active_date = $request->active_date;
        $data->status_active = $request->status_active;
        $data->company_id = $request->company_id;
        $data->note = $request->note;
        $data->save();
    }

    public function selected()
    {
        $GsmActive = GsmActive::all();
        return view('GsmActive.selected')->with([
            'GsmActive' => $GsmActive
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = GsmActive::findOrfail($id);
        $data->gsm_pre_active_id = $request->gsm_pre_active_id;
        $data->request_date = $request->request_date;
        $data->active_date = $request->active_date;
        $data->status_active = $request->status_active;
        $data->company_id = $request->company_id;
        $data->note = $request->note;
        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('gsm_actives')->whereIn('id', $ids)->delete();
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(GsmActive::all())->make(true);
        }
    }

    public function updateSelected(Request $request)
    {
        GsmActive::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }
}
