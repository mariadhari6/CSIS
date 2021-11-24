<?php

namespace App\Http\Controllers;

use App\Models\MerkGps;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MerkGpsController extends Controller
{
    //

    public function index()
    {

        return view('DataSelect.merk_gps.index');
    }

    public function add_form()
    {

        return view('DataSelect.merk_gps.add_form');
    }

    public function item_data()
    {
        $merk_gps = MerkGps::orderBy('id', 'DESC')->get();
        return view('DataSelect.merk_gps.item_data', compact('merk_gps'));
    }

    public function store(Request $request)
    {
        $data = array(
            'merk_gps'    =>  $request->merk_gps,
            'type_gps'    =>  $request->type_gps,



        );
        MerkGps::insert($data);
    }

    public function show($id)
    {
        $merk_gps = MerkGps::findOrfail($id);
        return view('DataSelect.merk_gps.edit_form')->with([
            'merk_gps' => $merk_gps
        ]);
    }

    public function destroy($id)
    {
        $data = MerkGps::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = MerkGps::findOrfail($id);
        $data->merk_gps = $request->merk_gps;
        $data->type_gps = $request->type_gps;


        $data->save();
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(MerkGps::all())->make(true);
        }
    }
}
