<?php

namespace App\Http\Controllers;

use App\Exports\TamplateMasterVehicle;
use App\Exports\VehicleExport;
use App\Imports\VehicleImport;
use App\Models\Company;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicle = Vehicle::orderBy('id', 'DESC')->get();
        $vehicleLicenseGet = $vehicle->map(function ($item) {
            return collect($item->toArray())
                ->only(['license_plate'])
                ->all();
        });

        return view('MasterData.vehicle.index')->with([
            'vehicleLicenseGet' => $vehicleLicenseGet
        ]);
    }
    public function add_form()
    {
        $company = Company::orderBy('company_name', 'ASC')->get();
        $vehicleType = VehicleType::orderBy('name', 'ASC')->get();
        return view('MasterData.vehicle.add_form')->with([
            'company' => $company,
            'vehicleType' => $vehicleType
        ]);
    }

    public function item_data(Request $request)
    {
        $length = ($request->length === null) ? 50 : (int)$request->length;
        $vehicle = Vehicle::orderBy('id', 'DESC')->paginate($length);
        $no = ($request->no === null) ? 1 : $request->no;
        return view('MasterData.vehicle.item_data')->with([
            'vehicle' => $vehicle,
            'no'      => $no
        ]);
    }

    public function item_data_search(Request $request)
    {
        $query = Vehicle::query();
        $columns = array( 'company_id', 'license_plate', 'vehicle_id', 'pool_name', 'pool_location', 'status');
        foreach($columns as $column){
            $query->orWhere($column, 'LIKE', '%' . $request->text . '%');
        }
        $vehicle = $query->paginate(50);
        $no = ($request->no === null) ? 1 : $request->no;
        return view('MasterData.vehicle.item_data')->with([
            'vehicle' => $vehicle,
            'no' => $no
        ]);
    }

    public function item_data_page_length(Request $request)
    {
        $vehicle = Vehicle::orderBy('id', 'DESC')->paginate((int)$request->length);
        $no = ($request->no === null) ? 1 : $request->no;
        return view('MasterData.vehicle.item_data')->with([
            'vehicle' => $vehicle,
            'no' => $no
        ]);
    }


    public function save_import(Request $request)
    {
        $dataRequest = json_decode($request->data);
        foreach ($dataRequest as $key => $value) {
            $licensePlateNum = $value->license_plate;
            $checklicensePlate = Vehicle::where('license_plate', '=', $licensePlateNum)->first();
            if ($checklicensePlate === null) {
                try {
                    $data = array(
                        'company_id'    => Company::where('company_name', $value->company_id)->firstOrFail()->id,
                        'license_plate' => $value->license_plate,
                        'vehicle_id'    => VehicleType::where('name', $value->vehicle_id)->firstOrFail()->id,
                        'pool_name'     => $value->pool_name,
                        'pool_location' => $value->pool_location,
                        'status'        => $value->status
                    );
                    Vehicle::insert($data);
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
            'pool_location'     =>  $request->pool_location,
            'status'            =>  $request->status
        );
        Vehicle::insert($data);
    }

    public function show($id)
    {
        $vehicle        = Vehicle::findOrfail($id);
        $company        = Company::orderBy('company_name', 'ASC')->get();
        $vehicleType    = VehicleType::orderBy('name', 'ASC')->get();
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
        $data->status           = $request->status;

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
        $data->status           = $request->status;

        $data->save();
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

    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('MasterVehicle', $nameFile);

        Excel::import(new VehicleImport, public_path('/MasterVehicle/' . $nameFile));
        // return redirect('/GsmMaster');
    }
    public function export()
    {
        return Excel::download(new TamplateMasterVehicle, 'template-vehicle.xlsx');
    }

    public function export_vehicle()
    {
        return Excel::download(new VehicleExport, 'Vehicle.xlsx');
    }
}
