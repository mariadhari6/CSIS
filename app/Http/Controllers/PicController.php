<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Pic;
use Illuminate\Http\Request;

class PicController extends Controller
{
    public function index()
    {
        return view('pic.index');
    }
    public function add_form()
    {
        $company = Company::orderBy('company_name', 'DESC')->get();
        return view('pic.add_form')->with([
            'company' => $company
        ]);
    }

    public function item_data()
    {
        $pic = Pic::orderBy('id', 'DESC')->get();
        return view('pic.item_data')->with([
            'pic' => $pic
        ]);
    }

    public function store(Request $request)
    {
        $data = array(
            'company_id' => $request->company_id,
            'pic_name'   => $request->pic_name,
            'email'      => $request->email,
            'position'   => $request->position,
            'phone'      => $request->phone,
            'date_of_birth' => $request->date_of_birth

        );
        Pic::insert($data);
    }

    public function edit_form($id)
    {
        $company = Company::orderBy('company_name', 'DESC')->get();
        $pic     = Pic::findOrfail($id);
        return view('pic.edit_form')->with([
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
        $data->email = $request->email;
        $data->position = $request->position;
        $data->phone = $request->phone;
        $data->date_of_birth = $request->date_of_birth;
        $data->save();
    }
}
