<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Pic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PicController extends Controller
{
    public function index()
    {
        return view('MasterData.pic.index');
    }
    public function add_form()
    {
        $company = Company::orderBy('company_name', 'DESC')->get();
        return view('MasterData.pic.add_form')->with([
            'company' => $company
        ]);
    }

    public function item_data()
    {
        $pic = Pic::orderBy('id', 'DESC')->get();
        return view('MasterData.pic.item_data')->with([
            'pic' => $pic
        ]);
    }

    public function store(Request $request)
    {
        $data = array(
            'company_id' => $request->company_id,
            'pic_name'   => $request->pic_name,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'position'   => $request->position,
            'date_of_birth' => $request->date_of_birth

        );
        Pic::insert($data);
    }

    public function edit_form($id)
    {
        $company = Company::orderBy('company_name', 'DESC')->get();
        $pic     = Pic::findOrfail($id);
        return view('MasterData.pic.edit_form')->with([
            'company' => $company,
            'pic'     => $pic
        ]);
    }

    public function destroy($id)
    {
        $data = Pic::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = Pic::findOrfail($id);
        $data->company_id = $request->company_id;
        $data->pic_name = $request->pic_name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->position = $request->position;
        $data->date_of_birth = $request->date_of_birth;
        $data->save();
    }

    public function selected()
    {
        $pic = Pic::all();
        return view('MasterData.pic.selected')->with([
            'pic' => $pic
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = Pic::findOrfail($id);
        $data->company_id = $request->company_id;
        $data->pic_name = $request->pic_name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->position = $request->position;
        $data->date_of_birth = $request->date_of_birth;
        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('pics')->whereIn('id', $ids)->delete();
        }
    }


    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(Pic::all())->make(true);
        }
    }

    public function updateSelected(Request $request)
    {
        Company::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }
}
