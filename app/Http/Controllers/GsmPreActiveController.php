<?php

namespace App\Http\Controllers;

use App\Models\GsmPreActive;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
=======
use DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24

class GsmPreActiveController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        return view('GsmPreActive.index');
=======
        return view('gsm_pre_active.index');
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
    }
    public function add_form()
    {
        // $gsm_pre_active = GsmPreActive::orderBy('gsm_number', 'DESC')->get();
<<<<<<< HEAD
        return view('GsmPreActive.add_form');
=======
        return view('gsm_pre_active.add_form');
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
    }

    public function item_data()
    {
<<<<<<< HEAD
        $GsmPreActive = GsmPreActive::orderBy('id', 'DESC')->get();
        return view('GsmPreActive.item_data')->with([
            'GsmPreActive' => $GsmPreActive
=======
        $gsm_pre_active = GsmPreActive::orderBy('id', 'DESC')->get();
        return view('gsm_pre_active.item_data')->with([
            'gsm_pre_active' => $gsm_pre_active
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
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

<<<<<<< HEAD
    public function edit_form($id)
    {

        $GsmPreActive = GsmPreActive::findOrfail($id);
        return view('GsmPreActive.edit_form')->with([
            'GsmPreActive' => $GsmPreActive,

=======
    public function show($id)
    {
        
        $gsm_pre_active =GsmPreActive ::findOrfail($id);
        return view('gsm_pre_active.edit_form')->with([
            'gsm_pre_active' => $gsm_pre_active,
            
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
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
<<<<<<< HEAD

    public function selected()
    {
        $GsmPreActive = GsmPreActive::all();
        return view('GsmPreActive.selected')->with([
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
=======
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
}
