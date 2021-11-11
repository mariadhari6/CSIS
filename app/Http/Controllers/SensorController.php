<?php

namespace App\Http\Controllers;

use App\Exports\TamplateSensor;
use App\Imports\SensorImport;
use App\Models\MerkSensor;
use App\Models\Sensor;
use App\Models\SensorName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class SensorController extends Controller
{
    public function index()
    {
        return view('MasterData.sensor.index');
    }
    public function add_form()
    {
        $sensor = Sensor::orderBy('sensor_name', 'DESC')->get();
        $sensorName = SensorName::orderBy('sensor_name', 'ASC')->get();
        return view('MasterData.sensor.add_form')->with([
            'sensor' => $sensor,
            'sensorName' => $sensorName
        ]);
    }

    public function item_data()
    {
        $sensor = Sensor::orderBy('id', 'DESC')->get();
        return view('MasterData.sensor.item_data')->with([
            'sensor' => $sensor
        ]);
    }

    public function save_import(Request $request)
    {
        $dataRequest = json_decode($request->data);
        foreach ($dataRequest as $key => $value) {
            $serialNumber = $value->serial_number;
            $checkSerial = Sensor::where('serial_number', '=', $serialNumber)->first();
            if ($checkSerial === null) {
                try {
                    $data = array(
                        'sensor_name'        => $value->sensor_name,
                        'merk_sensor'        => $value->merk_sensor,
                        'serial_number'      =>  $value->serial_number,
                        'rab_number'         =>  $value->rab_number,
                        'waranty'            =>  $value->waranty,
                        'status'             =>  $value->status,

                    );
                    Sensor::insert($data);
                    // return 'success';
                } catch (\Throwable $th) {
                    return 'fail';
                }
            } else {
                return 'fail';
            }
        }
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
        $sensorName = SensorName::orderBy('id', 'DESC')->get();

        $sensor = Sensor::findOrfail($id);
        return view('MasterData.sensor.edit_form')->with([
            'sensor' => $sensor,
            'sensorName' => $sensorName


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
        return view('MasterData.sensor.selected')->with([
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

    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('DataSensor', $nameFile);

        Excel::import(new SensorImport, public_path('/DataSensor/' . $nameFile));
        // return redirect('/GsmMaster');
    }

    public function export()
    {
        return Excel::download(new TamplateSensor, 'template-sensor.xlsx');
    }
}
