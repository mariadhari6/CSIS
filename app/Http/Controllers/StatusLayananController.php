<?php

namespace App\Http\Controllers;

use App\Models\ServiceStatus;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StatusLayananController extends Controller
{
    //

    public function index()
    {

        return view('DataSelect.status_layanan.index');
    }

    public function add_form()
    {

        return view('DataSelect.status_layanan.add_form');
    }

    public function item_data()
    {
        $status_layanan = ServiceStatus::orderBy('id', 'DESC')->get();
        return view('DataSelect.status_layanan.item_data', compact('status_layanan'));
    }

    public function store(Request $request)
    {
        $data = array(
            'service_status_name'    =>  $request->service_status_name,


        );
        ServiceStatus::insert($data);
    }

    public function show($id)
    {
        $status_layanan = ServiceStatus::findOrfail($id);
        return view('DataSelect.status_layanan.edit_form')->with([
            'status_layanan' => $status_layanan
        ]);
    }

    public function destroy($id)
    {
        $data = ServiceStatus::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = ServiceStatus::findOrfail($id);
        $data->service_status_name = $request->service_status_name;

        $data->save();
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(ServiceStatus::all())->make(true);
        }
    }
}
