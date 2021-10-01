<?php

namespace App\Http\Controllers;

use App\Models\GsmPreActive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class GsmPreActiveController extends Controller
{
    public function index()
    {
        return view('MasterData.GsmPreActive.index');
    }
    public function add_form()
    {
        // $gsm_pre_active = GsmPreActive::orderBy('gsm_number', 'DESC')->get();
        return view('MasterData.GsmPreActive.add_form');
    }

    public function item_data()
    {
        $GsmPreActive = GsmPreActive::orderBy('id', 'DESC')->get();
        return view('MasterData.GsmPreActive.item_data')->with([
            'GsmPreActive' => $GsmPreActive
        ]);
    }

    public function store(Request $request)
    {
        $data = array(
            'gsm_number'    =>  $request->gsm_number,
            'serial_number'     =>  $request->serial_number,
            'icc_id'     =>  $request->icc_id,
            'imsi'     =>  $request->imsi,
            'res_id'     =>  $request->res_id,
            'expired_date'     =>  $request->expired_date,
            'note'     =>  $request->note,
            'status_gsm'     =>  $request->status_gsm,
        );
        GsmPreActive::insert($data);
    }

    public function edit_form($id)
    {

        $GsmPreActive = GsmPreActive::findOrfail($id);
        return view('MasterData.GsmPreActive.edit_form')->with([
            'GsmPreActive' => $GsmPreActive,

        ]);
    }

    public function destroy($id)
    {
        $data = GsmPreActive::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = GsmPreActive::findOrfail($id);
        $data->gsm_number = $request->gsm_number;
        $data->serial_number = $request->serial_number;
        $data->icc_id = $request->icc_id;
        $data->imsi = $request->imsi;
        $data->res_id = $request->res_id;
        $data->expired_date = $request->expired_date;
        $data->note = $request->note;
        $data->status_gsm = $request->status_gsm;
        $data->save();
    }

    public function selected()
    {
        $GsmPreActive = GsmPreActive::all();
        return view('MasterData.GsmPreActive.selected')->with([
            'GsmPreActive' => $GsmPreActive
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = GsmPreActive::findOrfail($id);
        $data->gsm_number = $request->gsm_number;
        $data->serial_number = $request->serial_number;
        $data->icc_id = $request->icc_id;
        $data->imsi = $request->imsi;
        $data->res_id = $request->res_id;
        $data->expired_date = $request->expired_date;
        $data->note = $request->note;
        $data->status_gsm = $request->status_gsm;
        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('gsm_pre_actives')->whereIn('id', $ids)->delete();
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(GsmPreActive::all())->make(true);
        }
    }
    public function updateSelected(Request $request)
    {
        GsmPreActive::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }
}
