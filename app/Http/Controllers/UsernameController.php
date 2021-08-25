<?php

namespace App\Http\Controllers;

use App\Models\Username;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class UsernameController extends Controller
{

    public function index()
    {

        return view('livetable.live_table');
        
    }

    public function add_form()
    {

        return view('livetable.add_form');
        
    }

    public function item_data()
    {
        $usernames = Username::orderBy('id', 'DESC')->get();
        return view('livetable.item_data')->with([
            'usernames' => $usernames
        ]);
    }

    public function store(Request $request)
    {
        $data['FirstName'] = $request->FirstName;
        Username::insert($data);
    }

    public function show($id)
    {
        $usernames = Username::findOrfail($id);
        return view('livetable.edit_form')->with([
            'usernames' => $usernames
        ]);
    }

    public function destroy($id)
    {
        $data = Username::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = Username::findOrfail($id);
        $data['FirstName'] = $request->FirstName;
        $data->save(); 
    }
    
}
