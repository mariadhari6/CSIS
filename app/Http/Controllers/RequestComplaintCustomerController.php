<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Pic;
use App\Models\RequestComplaintCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RequestComplaintCustomerController extends Controller
{
    public function index()
    {
        return view('RequestComplaint.data_request_complaint.index');
    }
    public function add_form()
    {
        $pic = Pic::orderBy('id', 'DESC')->get();
        $company = Company::orderBy('id', 'DESC')->get();
        return view('RequestComplaint.data_request_complaint.add_form')
                ->with([
                    'company'   => $company,
                    'pic'       => $pic
                ]);
        // echo $pic;
        
    }
    public function item_data()
    {
        $request_complaint = RequestComplaintCustomer::orderBy('id', 'DESC')->get();
        return view('RequestComplaint.data_request_complaint.item_data',compact('request_complaint'));
        // echo $request_complaint->companyRequest['id'];
    }

    public function store(Request $request)
    {               

        $data = array(
            'company_id'            =>  $request->company_id,
            'internal_eksternal'    =>  $request->internal_eksternal,
            'pic_id'                =>  $request->pic_id,
            'vehicle'               =>  $request->vehicle,
            'waktu_info'            =>  $request->waktu_info,
            'task'                  =>  $request->task,
            'platform'              =>  $request->platform,
            'detail_task'           =>  $request->detail_task,
            'divisi'                =>  $request->divisi,
            'waktu_respond'         =>  $request->waktu_respond,
            'respond'               =>  $request->respond,
            'waktu_kesepakatan'     =>  $request->waktu_kesepakatan,
            'waktu_solve'           =>  $request->waktu_solve,
            'status'                =>  $request->status,
            'status_akhir'          =>  $request->status_akhir,
        );
        RequestComplaintCustomer::insert($data);
    }

    public function edit_form($id)
    {
        $pic = Pic::orderBy('id', 'DESC')->get();
        $company = Company::orderBy('id', 'DESC')->get();
        $request_complaint = RequestComplaintCustomer::findOrfail($id);

        return view('RequestComplaint.data_request_complaint.edit_form')
                ->with([
                    'company'   => $company,
                    'pic'       => $pic,
                    'request_complaint' => $request_complaint
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
        $data->company_id = $request->company_id;
        $data->internal_eksternal = $request->internal_eksternal;
        $data->pic_id = $request->pic_id;
        $data->vehicle = $request->vehicle;
        $data->waktu_info = $request->waktu_info;
        $data->task = $request->task;
        $data->platform = $request->platform;
        $data->detail_task = $request->detail_task;
        $data->divisi = $request->divisi;
        $data->waktu_respond = $request->waktu_respond;
        $data->respond = $request->respond;
        $data->waktu_kesepakatan = $request->waktu_kesepakatan;
        $data->waktu_solve = $request->waktu_solve;
        $data->status = $request->status;
        $data->status_akhir = $request->status_akhir;

        $data->save();
    }

    public function selected()
    {
        $request_complaint = RequestComplaintCustomer::all();
        return view('RequestComplaint.data_request_complaint.selected')->with([

            'request_complaint' => $request_complaint 
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = RequestComplaintCustomer::findOrfail($id);
        $data->company_id              = $request->company_id;
        $data->internal_eksternal    = $request->internal_eksternal;
        $data->pic_id                  = $request->pic_id;
        $data->vehicle              = $request->vehicle;
        $data->waktu_info           = $request->waktu_info;
        $data->task                 = $request->task;
        $data->platform              = $request->platform;
        $data->detail_task          = $request->detail_task;
        $data->divisi               = $request->divisi;
        $data->waktu_respond        = $request->waktu_respond;
        $data->respond              = $request->respond;
        $data->waktu_kesepakatan    = $request->waktu_kesepakatan;
        $data->waktu_solve          = $request->waktu_solve;
        $data->status               = $request->status;
        $data->status_akhir         = $request->status_akhir;

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
