<?php

namespace App\Http\Controllers;


use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SellerController extends Controller
{
    public function index()
    {
        return view('MasterData.seller.index');
    }

    public function add_form()
    {

        return view('MasterData.seller.add_form');
    }

    public function item_data()
    {
        $seller = Seller::orderBy('id', 'DESC')->get();
        return view('MasterData.seller.item_data')->with([
            'seller' => $seller
        ]);
    }

    public function store(Request $request)
    {
        $data = array(
            'seller_name' => $request->seller_name,
            'seller_code'   => $request->seller_code,
            'no_agreement_letter'      => $request->no_agreement_letter,
            'status'   => $request->status

        );
        Seller::insert($data);
    }

    public function edit_form($id)
    {
        $seller    = Seller::findOrfail($id);
        return view('MasterData.seller.edit_form')->with([
            'seller' => $seller,

        ]);
    }

    public function destroy($id)
    {
        $data = Seller::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = Seller::findOrfail($id);
        $data->seller_name = $request->seller_name;
        $data->seller_code = $request->seller_code;
        $data->no_agreement_letter = $request->no_agreement_letter;
        $data->status = $request->status;
        $data->save();
    }

    public function selected()
    {
        $seller = Seller::all();
        return view('MasterData.seller.selected')->with([
            'seller' => $seller
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = Seller::findOrfail($id);
        $data->seller_name = $request->seller_name;
        $data->seller_code = $request->seller_code;
        $data->no_agreement_letter = $request->no_agreement_letter;
        $data->status = $request->status;
        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('sellers')->whereIn('id', $ids)->delete();
        }
    }


    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(Seller::all())->make(true);
        }
    }

    public function updateSelected(Request $request)
    {
        Seller::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }
}
