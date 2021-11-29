<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SalesController extends Controller
{
    //
    public function index()
    {

        return view('DataSelect.sales.index');
    }

    public function add_form()
    {

        return view('DataSelect.sales.add_form');
    }

    public function item_data()
    {
        $sales = Sales::orderBy('id', 'DESC')->get();
        return view('DataSelect.sales.item_data', compact('sales'));
    }

    public function store(Request $request)
    {
        $data = array(
            'name'    =>  $request->name,


        );
        Sales::insert($data);
    }

    public function show($id)
    {
        $sales = Sales::findOrfail($id);
        return view('DataSelect.sales.edit_form')->with([
            'sales' => $sales
        ]);
    }

    public function destroy($id)
    {
        $data = Sales::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = Sales::findOrfail($id);
        $data->name = $request->name;

        $data->save();
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(Sales::all())->make(true);
        }
    }
}
