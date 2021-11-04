<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\DetailCustomer;
use App\Models\Pic;
use App\Models\RequestComplaint;
use App\Models\Task;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RequestComplaintController extends Controller
{
    public function index()
    {
        return view('request_complaint.index');
    }
    public function add_form()
    {
        $detail = DetailCustomer::groupBy('company_id')
            ->selectRaw('count(*) as jumlah, company_id')
            ->get();
        // $details = DetailCustomer::where($)with('vehicle')->get();
        $pic = Pic::orderBy('pic_name', 'ASC')->get();

        $company = Company::orderBy('company_name', 'ASC')->get();
        $task_request = Task::orderBy('id', 'ASC')->get();
        $request_complain = RequestComplaint::orderBy('id', 'DESC')->get();
        $vehicle = Vehicle::orderBy('id', 'ASC')->get();
        // $details = DetailCustomer::orderBy('id', 'ASC')->get();
        // $


        return view('request_complaint.add_form')->with([

            'request_complain' => $request_complain,
            'pic'              => $pic,
            'company'              => $company,
            'task_request'              => $task_request,
            'vehicle'              => $vehicle,
            'detail'              => $detail,
            // 'details'              => $details


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
        $request_complain = RequestComplaint::all();
        return view('request_complaint.item_data', compact('request_complain'));
        // dd($request_complain);
    }

    public function store(Request $request)
    {

        $data = array(
            'company_id'     =>  $request->company_id,
            'internal_eksternal'    =>  $request->internal_eksternal,
            'pic_id'     =>  $request->pic_id,
            'vehicle'     =>  $request->vehicle,
            'waktu_info'     =>  $request->waktu_info,
            'waktu_respond'     =>  $request->waktu_respond,
            'task' => $request->task,
            'platform'     =>  $request->platform,
            'detail_task'     =>  $request->detail_task,
            'divisi'     =>  $request->divisi,
            'respond'     =>  $request->respond,
            'waktu_kesepakatan'     =>  $request->waktu_kesepakatan,
            'waktu_solve'     =>  $request->waktu_solve,
            'status'     =>  $request->status,
            'status_akhir'     =>  $request->status_akhir,
        );
        RequestComplaint::insert($data);
    }

    public function edit_form($id)
    {
        $pic = Pic::groupBy('company_id')
            ->selectRaw('count(*) as jumlah, company_id')
            ->get();
        $company = Company::orderBy('id', 'DESC')->get();
        $request_complain = RequestComplaint::findOrfail($id);
        $vehicle = Vehicle::orderBy('id', 'DESC')->get();
        $task_request = Task::all();

        return view('request_complaint.edit_form')->with([
            'request_complain' => $request_complain,
            'pic'              => $pic,
            'company'              => $company,
            'task_request'   => $task_request,
            'vehicle'              => $vehicle


        ]);
    }

    public function destroy($id)
    {
        $data = RequestComplaint::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
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
        RequestComplaint::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }
    public function basedPic($id)
    {



        $data = Pic::where('company_id', $id)->get();

        return $data;
    }
    public function basedVehicle($id)
    {

        $data = DetailCustomer::where('company_id', $id)->get();

        return $data;
        // echo json_encode(array('data' => $data));
        // die;
    }
}
