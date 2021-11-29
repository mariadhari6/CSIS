<?php

namespace App\Http\Controllers;

use App\Models\Teknisi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeknisiController extends Controller
{
    public function index()
    {
        return view('home.teknisi');
    }

    public function index_data()
    {

        return view('DataSelect.teknisi.index');
    }

    public function add_form()
    {

        return view('DataSelect.teknisi.add_form');
    }

    public function item_data()
    {
        $teknisi = Teknisi::orderBy('id', 'DESC')->get();
        return view('DataSelect.teknisi.item_data', compact('teknisi'));
    }

    public function store(Request $request)
    {
        $data = array(
            'teknisi_name'    =>  $request->teknisi_name,
        );
        Teknisi::insert($data);
    }

    public function show($id)
    {
        $teknisi = Teknisi::findOrfail($id);
        return view('DataSelect.teknisi.edit_form')->with([
            'teknisi' => $teknisi
        ]);
    }

    public function destroy($id)
    {
        $data = Teknisi::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = Teknisi::findOrfail($id);
        $data->teknisi_name = $request->teknisi_name;
        $data->save();
    }




    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(Teknisi::all())->make(true);
        }
    }
}
