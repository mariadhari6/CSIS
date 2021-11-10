<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Gsm;
use App\Models\GsmActive;
use App\Models\GsmPreActive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class GsmActiveController extends Controller
{
    public function index()
    {
        return view('MasterData.GsmActive.index');
    }

    public function item_data()
    {
        $GsmActive = Gsm::where('status_gsm', 'Active')->get();
        return view('MasterData.GsmActive.item_data')->with([
            'GsmActive' => $GsmActive
        ]);
    }
    // ::whereIn('task', [1, 2, 3])->
    public function item_data_MY(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $GsmActive = Gsm::where('status_gsm', 'Active')->whereMonth('active_date',  $month)->whereYear('active_date', $year)->get();
        return view('MasterData.GsmActive.item_data')->with([
            'GsmActive' => $GsmActive
        ]);
    }

    public function edit_form($id)
    {
        $company = Company::orderBy('id', 'DESC')->get();
        $GsmActive     = Gsm::findOrfail($id);
        return view('MasterData.GsmActive.edit_form')->with([
            'company' => $company,
            'GsmActive' => $GsmActive
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Gsm::findOrfail($id);
        $data->status_gsm = $request->status_gsm;
        $data->gsm_number = $request->gsm_number;
        $data->company_id = $request->company_id;
        $data->request_date = $request->request_date;
        $data->active_date = $request->active_date;
        $data->note = $request->note;
        $data->save();
    }
    public function destroy($id)
    {
        $data = Gsm::findOrfail($id);
        $data->delete();
    }

    public function selected()
    {
        $GsmActive = Gsm::all();
        return view('MasterData.GsmActive.selected')->with([
            'GsmActive' => $GsmActive
        ]);
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
        Gsm::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }
}
