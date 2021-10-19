<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    public function index()
    {
        return view('MasterData.vehicle.index');
    }
    public function add_form()
    {
        $company = Company::orderBy('company_name', 'DESC')->get();
        $vehicleType = VehicleType::orderBy('name', 'DESC')->get();
        return view('MasterData.vehicle.add_form')->with([
            'company' => $company,
            'vehicleType' => $vehicleType
        ]);
    }

    public function item_data()
    {
        $vehicle = Vehicle::orderBy('id', 'DESC')->get();

        return view('MasterData.vehicle.item_data')->with([
            'vehicle' => $vehicle
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'company_id'    => 'required',
            'license_plate' => 'required',
            'vehicle_id'    => 'required',
            'pool_name'     => 'required',
            'pool_location' => 'required',
        ]);
        $data = array(
            'company_id'        =>  $request->company_id,
            'license_plate'     =>  $request->license_plate,
            'vehicle_id'        =>  $request->vehicle_id,
            'pool_name'         => $request->pool_name,
            'pool_location'     =>  $request->pool_location
        );
        Vehicle::insert($data);
    }

    public function show($id)
    {
        $vehicle        = Vehicle::findOrfail($id);
        $company        = Company::orderBy('company_name', 'DESC')->get();
        $vehicleType    = VehicleType::orderBy('name', 'DESC')->get();
        return view('MasterData.vehicle.edit_form')->with([
            'vehicle'       => $vehicle,
            'company'       => $company,
            'vehicleType'   => $vehicleType
        ]);
    }

    public function destroy($id)
    {
        $data = Vehicle::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = Vehicle::findOrfail($id);

        $data->company_id       = $request->company_id;
        $data->license_plate    = $request->license_plate;
        $data->vehicle_id       = $request->vehicle_id;
        $data->pool_name        = $request->pool_name;
        $data->pool_location    = $request->pool_location;

        $data->save();
    }

    public function selected()
    {
        $vehicle = Vehicle::all();
        return view('MasterData.vehicle.selected')->with([
            'vehicle' => $vehicle
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = Vehicle::findOrfail($id);
        $data->company_id       = $request->company_id;
        $data->licence_plate    = $request->licence_plate;
        $data->vehicle_id       = $request->vehicle_id;
        $data->pool_name        = $request->pool_name;
        $data->pool_location    = $request->pool_location;

        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('vehicles')->whereIn('id', $ids)->delete();
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(Company::all())->make(true);
        }
    }

    public function updateSelected(Request $request)
    {
        Company::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }
}
