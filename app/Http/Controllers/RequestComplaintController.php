<?php

namespace App\Http\Controllers;

use App\Exports\RequestComplaintExport;
use App\Models\Company;
use App\Models\DetailCustomer;
use App\Models\Pic;
use App\Models\RequestComplaint;
use App\Models\Task;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class RequestComplaintController extends Controller
{
    public function index()
    {

        return view('request_complaint.index');
    }

    public function add_form()
    {

        $detail             = DetailCustomer::groupBy('company_id')->selectRaw('count(*) as jumlah, company_id')->get();
        $pic                = Pic::orderBy('pic_name', 'ASC')->get();
        $company            = Company::orderBy('company_name', 'ASC')->get();
        $task_request       = Task::orderBy('id', 'ASC')->get();
        $request_complain   = RequestComplaint::orderBy('id', 'DESC')->get();
        $vehicle            = Vehicle::orderBy('id', 'ASC')->get();

        return view('request_complaint.add_form')->with([

            'request_complain' => $request_complain,
            'pic'              => $pic,
            'company'          => $company,
            'task_request'     => $task_request,
            'vehicle'          => $vehicle,
            'detail'           => $detail,
        ]);
    }

    public function item_data_MY(Request $request)
    {

        $year = $request->year;
        $month = $request->month;
        $request_complain = RequestComplaint::whereMonth('waktu_info',  $month)->whereYear('waktu_info', $year)->get();
        return view('request_complaint.item_data', compact('request_complain'));
    }

    public function item_data_request_internal()
    {

        $request_complain = RequestComplaint::where('internal_eksternal', 'Request Internal')->get();
        return view('request_complaint.item_data')->with([
            'request_complain' => $request_complain
        ]);
    }

    public function item_data_request_eksternal()
    {

        $request_complain = RequestComplaint::where('internal_eksternal', 'Request Eksternal')->get();
        return view('request_complaint.item_data')->with([
            'request_complain' => $request_complain
        ]);
    }

    public function item_data_complain_internal()
    {

        $request_complain = RequestComplaint::where('internal_eksternal', 'Complain Internal')->get();
        return view('request_complaint.item_data')->with([
            'request_complain' => $request_complain
        ]);
    }

    public function item_data_complain_eksternal()
    {

        $request_complain = RequestComplaint::where('internal_eksternal', 'Complain Eksternal')->get();
        return view('request_complaint.item_data')->with([
            'request_complain' => $request_complain
        ]);
    }
    public function item_data()
    {

        $request_complain = RequestComplaint::orderBy('id', 'DESC')->get();
        return view('request_complaint.item_data', compact('request_complain'));
    }

    public function store(Request $request)
    {

        $task               = $request->task;
        $vehicle            = $request->vehicle;
        $waktu_info         = Carbon::parse($request->waktu_info);
        $waktu_respon       = Carbon::parse($request->waktu_respond);
        $satu_jam           = $waktu_info->addHours(1);

        if ($waktu_respon <= $satu_jam) {
            $status_waktu_respon = "tidak telat";
        } else {
            $status_waktu_respon = "telat";
        }

        if ($vehicle == "") {
            $imei               = null;
            $gsm                = null;
            $type               = null;
            $sensor             = null;
            $equipment_gps_id   = null;
            $equipment_sensor_id = null;
        } else {
            $imei               = DetailCustomer::where('vehicle_id', $vehicle)->pluck('imei');
            $gsm                = DetailCustomer::where('vehicle_id', $vehicle)->pluck('gsm_id');
            $type               = DetailCustomer::where('vehicle_id', $vehicle)->pluck('type');
            $sensor             = DetailCustomer::where('vehicle_id', $vehicle)->pluck('sensor_all');
            $equipment_gps_id   = count($imei);
            $explode_sensor     = explode(' ', $sensor[0]);
            $equipment_sensor_id = count($explode_sensor);
        }


        if ($task == "Pemasangan GPS" || $task == "Mutasi Pemasangan GPS" || $task == "Mutasi Pelepasan GPS" || $task == "Mutasi Pelepasan Pemasangan GPS") {

            $data = array(
                'company_id'                =>  $request->company_id,
                'internal_eksternal'        =>  $request->internal_eksternal,
                'pic_id'                    =>  $request->pic_id,
                'vehicle'                   =>  $request->vehicle,
                'waktu_info'                =>  $request->waktu_info,
                'waktu_respond'             =>  $request->waktu_respond,
                'task'                      =>  $request->task,
                'platform'                  =>  $request->platform,
                'detail_task'               =>  $request->detail_task,
                'divisi'                    =>  $request->divisi,
                'respond'                   =>  $request->respond,
                'waktu_kesepakatan'         =>  $request->waktu_kesepakatan,
                'waktu_solve'               =>  $request->waktu_solve,
                'status'                    =>  $request->status,
                'status_akhir'              =>  $request->status_akhir,
                'imei'                      =>  $imei == null ? null : $imei[0],
                'gsm_pemasangan'            =>  $gsm == null ? null : $gsm[0],
                'equipment_terpakai_gps'    =>  $type == null ? null : $type[0],
                'status_waktu_respon'       =>  $status_waktu_respon,
                'equipment_terpakai_sensor' =>  $sensor == null ? null : $sensor[0]


            );
        } elseif ($task == "Maintenance GPS" || $task == "Maintenance Sensor") {

            $data = array(
                'company_id'                =>  $request->company_id,
                'internal_eksternal'        =>  $request->internal_eksternal,
                'pic_id'                    =>  $request->pic_id,
                'vehicle'                   =>  $request->vehicle,
                'waktu_info'                =>  $request->waktu_info,
                'waktu_respond'             =>  $request->waktu_respond,
                'task'                      =>  $request->task,
                'platform'                  =>  $request->platform,
                'detail_task'               =>  $request->detail_task,
                'divisi'                    =>  $request->divisi,
                'respond'                   =>  $request->respond,
                'waktu_kesepakatan'         =>  $request->waktu_kesepakatan,
                'waktu_solve'               =>  $request->waktu_solve,
                'status'                    =>  $request->status,
                'status_akhir'              =>  $request->status_akhir,
                'type_gps_id'               =>  $type == null ? null : $type[0],
                'equipment_gsm'             =>  $request->equipment_gsm,
                'equipment_gps_id'          =>  $request->$equipment_gps_id,
                'equipment_sensor_id'       =>  $request->$equipment_sensor_id,
                'status_waktu_respon'       =>  $status_waktu_respon,
                'equipment_terpakai_sensor' =>  $sensor == null ? null : $sensor[0]

            );
        } else {
            // $vehicle_id = "halo";
            $data = array(
                'company_id'                =>  $request->company_id,
                'internal_eksternal'        =>  $request->internal_eksternal,
                'pic_id'                    =>  $request->pic_id,
                'vehicle'                   =>  $request->vehicle,
                'waktu_info'                =>  $request->waktu_info,
                'waktu_respond'             =>  $request->waktu_respond,
                'task'                      =>  $request->task,
                'platform'                  =>  $request->platform,
                'detail_task'               =>  $request->detail_task,
                'divisi'                    =>  $request->divisi,
                'respond'                   =>  $request->respond,
                'waktu_kesepakatan'         =>  $request->waktu_kesepakatan,
                'waktu_solve'               =>  $request->waktu_solve,
                'status'                    =>  $request->status,
                'status_akhir'              =>  $request->status_akhir,
                'status_waktu_respon'       =>  $status_waktu_respon == null ? null : $status_waktu_respon,
                'equipment_terpakai_sensor' =>  $sensor == null ? null : $sensor[0]
            );
        }


        RequestComplaint::insert($data);
    }

    public function edit_form($id)
    {


        $pic = Pic::orderBy('id', 'DESC')->get();
        $detail = DetailCustomer::groupBy('company_id')->selectRaw('count(*) as jumlah, company_id')->get();
        $company = Company::orderBy('id', 'DESC')->get();
        $request_complain = RequestComplaint::findOrfail($id);
        $vehicle = Vehicle::orderBy('id', 'DESC')->get();
        $task_request = Task::all();

        return view('request_complaint.edit_form')->with([

            'request_complain' => $request_complain,
            'pic'              => $pic,
            'company'          => $company,
            'task_request'     => $task_request,
            'vehicle'          => $vehicle,
            'detail'           => $detail
        ]);
    }

    public function destroy($id)
    {

        $data = RequestComplaint::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {

        $waktu_kesepakatan  = Carbon::parse($request->waktu_kesepakatan);
        $waktu_solve        = Carbon::parse($request->waktu_solve);
        $dua_hari           = $waktu_kesepakatan->addHours(48);

        if ($waktu_solve <= $dua_hari) {
            $status_waktu_solve = "tidak telat";
        } else {
            $status_waktu_solve = "telat";
        }

        $waktu_info         = Carbon::parse($request->waktu_info);
        $waktu_respon       = Carbon::parse($request->waktu_respond);
        $satu_jam           = $waktu_info->addHours(1);

        if ($waktu_respon <= $satu_jam) {
            $status_waktu_respon = "tidak telat";
        } else {
            $status_waktu_respon = "telat";
        }

        $data = RequestComplaint::findOrfail($id);
        $data->company_id           = $request->company_id;
        $data->internal_eksternal   = $request->internal_eksternal;
        $data->pic_id               = $request->pic_id;
        $data->vehicle              = $request->vehicle;
        $data->waktu_info           = $request->waktu_info;
        $data->waktu_respond        = $request->waktu_respond;
        $data->task                 = $request->task;
        $data->platform             = $request->platform;
        $data->detail_task          = $request->detail_task;
        $data->divisi               = $request->divisi;
        $data->respond              = $request->respond;
        $data->waktu_kesepakatan    = $request->waktu_kesepakatan;
        $data->waktu_solve          = $request->waktu_solve;
        $data->status               = $request->status;
        $data->status_akhir         = $request->status_akhir;
        $data->status_waktu_respon  = $status_waktu_respon;
        $data->status_waktu_solve   = $status_waktu_solve;

        $data->save();
    }

    public function selected()
    {

        $request_complain = RequestComplaint::all();
        return view('request_complaint.selected')->with([
            'request_complain' => $request_complain
        ]);
    }

    public function updateall(Request $request, $id)
    {

        $data = RequestComplaint::findOrfail($id);
        $data->company_id = $request->company_id;
        $data->internal_eksternal = $request->internal_eksternal;
        $data->pic_id = $request->pic_id;
        $data->vehicle = $request->vehicle;
        $data->waktu_info = $request->waktu_info;
        $data->waktu_respond = $request->waktu_respond;
        $data->task = $request->task;
        $data->platform = $request->platform;
        $data->detail_task = $request->detail_task;
        $data->divisi = $request->divisi;
        $data->respond = $request->respond;
        $data->waktu_kesepakatan = $request->waktu_kesepakatan;
        $data->waktu_solve = $request->waktu_solve;
        $data->status = $request->status;
        $data->status_akhir = $request->status_akhir;

        echo $id;
    }

    public function deleteAll(Request $request)
    {

        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('request_complaint')->whereIn('id', $ids)->delete();
        }
    }

    public function datatable(Request $request)
    {

        if ($request->ajax()) {
            return DataTables::of(RequestComplaint::all())->make(true);
        }
    }

    public function updateSelected(Request $request)
    {

        RequestComplaint::where('item_type_id', '=', 1)->update(['colour' => 'black']);
    }

    public function basedPic($id)
    {

        $data = Pic::where('company_id', $id)->get();
        return $data;
    }

    public function basedVehicle($id)
    {

        $data = DetailCustomer::where('company_id', $id)->get();

        for ($i = 0; $i < count($data); $i++) {
            $loop = $data[$i]->vehicle_id;
            $cari_vehicle = Vehicle::where('id', $loop)->get();
            $data[$i]['vehicle_license_plate'] = $cari_vehicle[0]->license_plate;
            $data[$i]['id'] = $cari_vehicle[0]->id;
        }

        return $data;
    }

    public function basedInternalEksternal(Request $request)
    {

        $id = $request->request_complain;

        if ($id == "Request Internal" || $id == "Request Eksternal") {
            $data = Task::where('jenis', '=', 'request')->get();
        } else {
            $data = Task::where('jenis', '=', 'complain')->get();
        }
        return $data;
    }

    public function export_request()
    {
        return Excel::download(new RequestComplaintExport, 'Request_Complaint.xlsx');
    }

    public function dashboard()
    {
        return view('request_complaint.Dashboard.dashboard');
    }
}
