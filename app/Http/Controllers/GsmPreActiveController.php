<?php

namespace App\Http\Controllers;

use App\Models\GsmPreActive;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;


class GsmPreActiveController extends Controller
{
    public function index()
    {
        return view('gsm_pre_active.index');
    }
    public function add_form()
    {
        // $gsm_pre_active = GsmPreActive::orderBy('gsm_number', 'DESC')->get();
        return view('gsm_pre_active.add_form');
    }

    public function item_data()
    {
        $gsm_pre_active = GsmPreActive::orderBy('id', 'DESC')->get();
        return view('gsm_pre_active.item_data')->with([
            'gsm_pre_active' => $gsm_pre_active
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
        );
        GsmPreActive::insert($data);
    }

    public function show($id)
    {
        
        $gsm_pre_active =GsmPreActive ::findOrfail($id);
        return view('gsm_pre_active.edit_form')->with([
            'gsm_pre_active' => $gsm_pre_active,
            
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
        $data->save();
    }
}
