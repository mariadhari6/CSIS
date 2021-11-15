<?php

namespace App\Http\Controllers;

use App\Exports\TamplateCompany;
use App\Imports\CompanyImport;
use App\Models\Company;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    public function index()
    {
        return view('MasterData.company.index');
    }
    public function add_form()
    {
        $seller = Seller::orderBy('seller_name', 'ASC')->get();
        return view('MasterData.company.add_form')->with([
            'seller' => $seller,
        ]);
    }

    public function item_data()
    {
        $company = Company::orderBy('id', 'DESC')->get();
        return view('MasterData.company.item_data')->with([
            'company' => $company
        ]);
    }
    public function save_import(Request $request)
    {
        $dataRequest = json_decode($request->data);
        foreach ($dataRequest as $key => $value) {
            try {
                $data = array(
                    'company_name'        => $value->company_name,
                    'seller_id'        =>  Seller::where('seller_name', $value->seller_id)->firstOrFail()->id,
                    'customer_code'        =>  $value->customer_code,
                    'no_agreement_letter_id'     => Seller::where('no_agreement_letter', $value->no_agreement_letter_id)->firstOrFail()->id,
                    'status'     =>  $value->status,


                );
                Company::insert($data);
                // return 'success';
            } catch (\Throwable $th) {
                return 'fail';
            }
        }
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'seller_id' => 'required',
            'customer_code' => 'required',
            'no_agreement_letter_id' => 'required',
            'status' => 'required',
        ]);
        $data = array(
            'company_name'     =>  $request->company_name,
            'seller_id'    =>  $request->seller_id,
            'customer_code'     =>  $request->customer_code,
            'no_agreement_letter_id' => $request->no_agreement_letter_id,
            'status'     =>  $request->status,
        );
        Company::insert($data);
    }

    public function edit_form($id)
    {
        $seller = Seller::orderBy('seller_name', 'DESC')->get();
        $company = Company::findOrfail($id);
        return view('MasterData.company.edit_form')->with([
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
        $data->company_name = $request->company_name;
        $data->seller_id = $request->seller_id;
        $data->customer_code = $request->customer_code;
        $data->no_agreement_letter_id = $request->no_agreement_letter_id;
        $data->status = $request->status;

        $data->save();
    }

    public function selected()
    {
        $company = Company::all();
        return view('MasterData.company.selected')->with([
            'company' => $company
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = Company::findOrfail($id);
        $data->company_name = $request->company_name;
        $data->seller_id = $request->seller_id;
        $data->customer_code = $request->customer_code;
        $data->no_agreement_letter_id = $request->no_agreement_letter_id;
        $data->status = $request->status;

        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('companies')->whereIn('id', $ids)->delete();
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

    public function dependentCompany($id)
    {
        $data = DB::table("sellers")
            ->where("id", $id)
            ->pluck('no_agreement_letter', 'id');
        return json_encode($data);
    }
    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('MasterCompany', $nameFile);

        Excel::import(new CompanyImport, public_path('/MasterCompany/' . $nameFile));
        // return redirect('/GsmMaster');
    }
    public function export()
    {
        return Excel::download(new TamplateCompany, 'template-company.xlsx');
    }

    // public function showAgreement($id)
    // {
    //     $data = DB::table("sellers")
    //         ->join('companies', 'sellers.no_agreement_letter', '=', 'companies.no_agreement_letter_id')
    //         // ->where("id", $id)
    //         ->pluck('no_agreement_letter', 'id');
    //     return json_encode($data);
    // }
}
