<?php

namespace App\Http\Controllers;

use App\Models\Gps;
use App\Models\MerkGps;
use App\Models\TypeGps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Imports\GpsImport;
use Maatwebsite\Excel\Facades\Excel;

class GpsController extends Controller
{
    public function index()
    {
        return view('MasterData.gps.index');
    }
    public function add_form()
    {
        $gps = Gps::orderBy('id', 'DESC')->get();
        $merk = MerkGps::orderBy('id', 'DESC')->get();
        $type = TypeGps::orderBy('id', 'DESC')->get();
        return view('MasterData.gps.add_form')->with([

            'gps' => $gps,
            'merk' => $merk,
            'type' => $type

        ]);
    }

    public function item_data()
    {
        $gps = Gps::orderBy('id', 'DESC')->get();
        return view('MasterData.gps.item_data')->with([
            'gps' => $gps,

        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required',
            'type' => 'required',
            'imei' => 'required',
            'waranty' => 'required',
            'po_date' => 'required',
            'status' => 'required'

        ]);
        $data = array(
            'merk'    =>  $request->merk,
            'type'     =>  $request->type,
            'imei'     =>  $request->imei,
            'waranty'     =>  $request->waranty,
            'po_date'     =>  $request->po_date,
            'status'     =>  $request->status,
            'status_ownership' => $request->status_ownership
        );
        Gps::insert($data);
    }

    public function edit_form($id)
    {
        $merk_gps = MerkGps::orderBy('id', 'DESC')->get();
        $type_gps = TypeGps::orderBy('id', 'DESC')->get();
        $gps = Gps::findOrfail($id);
        return view('MasterData.gps.edit_form')->with([
            'gps' => $gps,
            'merk_gps' => $merk_gps,
            'type_gps' => $type_gps

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
        $data->status_ownership = $request->status_ownership;
        $data->save();
    }

    public function selected()
    {
        $gps = Gps::all();
        $merk_gps = MerkGps::all();
        $type_gps = TypeGps::all();

        return view('MasterData.gps.selected')->with([
            'gps' => $gps,
            'merk_gps' => $merk_gps,
            'type_gps' => $type_gps
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = Gps::findOrfail($id);
        $data->merk = $request->merk;
        $data->type = $request->type;
        $data->imei = $request->imei;
        $data->waranty = $request->waranty;
        $data->po_date = $request->po_date;
        $data->status = $request->status;
        $data->status_ownership = $request->status_ownership;
        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('gps')->whereIn('id', $ids)->delete();
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(Gps::all())->make(true);
        }
    }

    public function updateSelected(Request $request)
    {
        Gps::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }

    public function ImportGps(Request $request)
    {
        $file = $request->file('excel-gps');
        Excel::import(new GpsImport, $file);
        return redirect()->back()->withStatus('file imported success');


        // return redirect('/')->with('success', 'All good!');
    }
}
