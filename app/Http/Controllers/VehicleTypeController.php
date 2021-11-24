<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VehicleTypeController extends Controller
{
    //
    public function index()
    {

        return view('DataSelect.vehicle_type.index');
    }

    public function add_form()
    {

        return view('DataSelect.vehicle_type.add_form');
    }

    public function item_data()
    {
        $vehicle_type = VehicleType::orderBy('id', 'DESC')->get();
        return view('DataSelect.vehicle_type.item_data', compact('vehicle_type'));
    }

    public function store(Request $request)
    {
        $data = array(
            'name'    =>  $request->name,


        );
        VehicleType::insert($data);
    }

    public function show($id)
    {
        $vehicle_type = VehicleType::findOrfail($id);
        return view('DataSelect.vehicle_type.edit_form')->with([
            'vehicle_type' => $vehicle_type
        ]);
    }

    public function destroy($id)
    {
        $data = VehicleType::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = VehicleType::findOrfail($id);
        $data->name = $request->name;

        $data->save();
    }




    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(VehicleType::all())->make(true);
        }
    }
}
