<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use App\Models\RequestComplaintCustomer;
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
        $pic = Pic::orderBy('id', 'DESC')->get();
        $request_complain = RequestComplaintCustomer::orderBy('id', 'DESC')->get();
        return view('request_complaint.add_form')->with([

            'request_complain' => $request_complain,
            'pic'              => $pic
        ]);
    }

    public function item_data()
    {
        $request_complain = RequestComplaintCustomer::orderBy('id', 'DESC')->get();
        return view('request_complaint.item_data')->with([
            'request_complain' => $request_complain
        ]);
    }

    public function store(Request $request)
    {

        $data = array(
            'company'     =>  $request->company,
            'internal_eksternal'    =>  $request->internal_eksternal,
            'pic'     =>  $request->pic,
            'vehicle'     =>  $request->vehicle,
            'waktu_info'     =>  $request->waktu_info,
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
        RequestComplaintCustomer::insert($data);
    }

    public function edit_form($id)
    {

        $request_complain = RequestComplaintCustomer::findOrfail($id);
        return view('request_complaint.edit_form')->with([
            'request_complain' => $request_complain,

        ]);
    }

    public function destroy($id)
    {
        $data = RequestComplaintCustomer::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = RequestComplaintCustomer::findOrfail($id);
        $data->company = $request->company;
        $data->internal_external = $request->internal_external;
        $data->pic = $request->pic;
        $data->vehicle = $request->vehicle;
        $data->waktu_info = $request->waktu_info;
        $data->task = $request->task;
        $data->platfom = $request->platfom;
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
        $request_complain = RequestComplaintCustomer::all();
        return view('request_complaint.selected')->with([
            'request_complain' => $request_complain
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = RequestComplaintCustomer::findOrfail($id);
        $data->company = $request->company;
        $data->internal_external = $request->internal_external;
        $data->pic = $request->pic;
        $data->vehicle = $request->vehicle;
        $data->waktu_info = $request->waktu_info;
        $data->task = $request->task;
        $data->platfom = $request->platfom;
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
            DB::table('request_complaint_customers')->whereIn('id', $ids)->delete();
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(RequestComplaintCustomer::all())->make(true);
        }
    }

    public function updateSelected(Request $request)
    {
        RequestComplaintCustomer::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }
}
