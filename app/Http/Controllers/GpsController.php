<?php

namespace App\Http\Controllers;

use App\Models\Gps;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;


class GpsController extends Controller
{
    public function index()
    {
        return view('Gps.index');
    }
    public function add_form()
    {
        $gps = Gps::orderBy('merk', 'DESC')->get();
        return view('gps.add_form')->with([

            'gps' => $gps,
        ]);
    }

    public function item_data()
    {
        $gps = Gps::orderBy('id', 'DESC')->get();
        return view('gps.item_data')->with([
            'gps' => $gps
        ]);
    }

    public function store(Request $request)
    {
        $data = array(
            'merk'    =>  $request->merk,
            'type'     =>  $request->type,
            'imei'     =>  $request->imei,
            'waranty'     =>  $request->waranty,
            'po_date'     =>  $request->po_date,
            'status'     =>  $request->status,
        );
        GPS::insert($data);
    }

    public function show($id)
    {
        
        $gps =Gps ::findOrfail($id);
        return view('gps.edit_form')->with([
            'gps' => $gps,
            
        ]);
    }

    public function destroy($id)
    {
        $data = Gps::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = Gps::findOrfail($id);
        $data->merk = $request->merk;
        $data->type = $request->type;
        $data->imei = $request->imei;
        $data->waranty = $request->waranty;
        $data->po_date = $request->po_date;
        $data->status = $request->status;
        $data->save();
    }
}
