<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Seller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index');
    }
    public function add_form()
    {
        $seller = Seller::orderBy('seller_name', 'DESC')->get();
        return view('company.add_form')->with([

            'seller' => $seller,
        ]);
    }

    public function item_data()
    {
        $company = Company::orderBy('id', 'DESC')->get();
        return view('company.item_data')->with([
            'company' => $company
        ]);
    }

    public function store(Request $request)
    {
        $data = array(
            'seller_id'    =>  $request->seller_id,
            'company_name'     =>  $request->company_name,
            'status'     =>  $request->status,
            'customer_code'     =>  $request->customer_code,
            'no_po'     =>  $request->no_po,
            'po_date'     =>  $request->po_date,
        );
        Company::insert($data);
    }

    public function show($id)
    {
        $seller = Seller::orderBy('seller_name', 'DESC')->get();
        $company = Company::findOrfail($id);
        return view('company.edit_form')->with([
            'company' => $company,
            'seller' => $seller,
        ]);
    }

    public function destroy($id)
    {
        $data = Company::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = Company::findOrfail($id);
        $data->seller_id = $request->seller_id;
        $data->company_name = $request->company_name;
        $data->status = $request->status;
        $data->customer_code = $request->customer_code;
        $data->no_po = $request->no_po;
        $data->po_date = $request->po_date;
        $data->save();
    }
}
