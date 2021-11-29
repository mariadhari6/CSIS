<?php

namespace App\Http\Controllers;

use App\Models\SensorName;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SensorNameController extends Controller
{
    //

    public function index()
    {

        return view('DataSelect.sensor_name.index');
    }

    public function add_form()
    {

        return view('DataSelect.sensor_name.add_form');
    }

    public function item_data()
    {
        $sensor_name = SensorName::orderBy('id', 'DESC')->get();
        return view('DataSelect.sensor_name.item_data', compact('sensor_name'));
    }

    public function store(Request $request)
    {
        $data = array(
            'sensor_name'    =>  $request->sensor_name,


        );
        SensorName::insert($data);
    }

    public function show($id)
    {
        $sensor_name = SensorName::findOrfail($id);
        return view('DataSelect.sensor_name.edit_form')->with([
            'sensor_name' => $sensor_name
        ]);
    }

    public function destroy($id)
    {
        $data = SensorName::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = SensorName::findOrfail($id);
        $data->sensor_name = $request->sensor_name;

        $data->save();
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(SensorName::all())->make(true);
        }
    }
}
