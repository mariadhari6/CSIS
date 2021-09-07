<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;


class SensorController extends Controller
{
    public function index()
    {
        return view('sensor.index');
    }
    public function add_form()
    {
        $sensor = Sensor::orderBy('sensor_name', 'DESC')->get();
        return view('sensor.add_form')->with([

            'sensor' => $sensor,
        ]);
    }

    public function item_data()
    {
        $sensor = Sensor::orderBy('id', 'DESC')->get();
        return view('sensor.item_data')->with([
            'sensor' => $sensor
        ]);
    }

    public function store(Request $request)
    {
        $data = array(
            'sensor_name'    =>  $request->sensor_name,
            'merk_sensor'     =>  $request->merk_sensor,
            'serial_number'     =>  $request->serial_number,
            'rab_number'     =>  $request->rab_number,
            'waranty'     =>  $request->waranty,
            'status'     =>  $request->status,
        );
        Sensor::insert($data);
    }

    public function edit_form($id)
    {

        $sensor = Sensor::findOrfail($id);
        return view('sensor.edit_form')->with([
            'sensor' => $sensor,

        ]);
    }

    public function destroy($id)
    {
        $data = Sensor::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = Sensor::findOrfail($id);
        $data->sensor_name = $request->sensor_name;
        $data->merk_sensor = $request->merk_sensor;
        $data->serial_number = $request->serial_number;
        $data->rab_number = $request->rab_number;
        $data->waranty = $request->waranty;
        $data->status = $request->status;
        $data->save();
    }

    public function selected()
    {
        $sensor = Sensor::all();
        return view('sensor.selected')->with([
            'sensor' => $sensor
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = Sensor::findOrfail($id);
        $data->sensor_name = $request->sensor_name;
        $data->merk_sensor = $request->merk_sensor;
        $data->serial_number = $request->serial_number;
        $data->rab_number = $request->rab_number;
        $data->waranty = $request->waranty;
        $data->status = $request->status;
        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('sensors')->whereIn('id', $ids)->delete();
        }
    }
    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(Sensor::all())->make(true);
        }
    }

    public function updateSelected(Request $request)
    {
        Sensor::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }
}
