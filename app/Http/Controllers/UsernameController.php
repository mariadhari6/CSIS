<?php

namespace App\Http\Controllers;
use App\Models\Username;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class UsernameController extends Controller
{

    public function index()
    {

        $Username = Username::all();
        return view('livetable.live_table', compact('Username'));
        // dd($Username);
    }

    function add_data(Request $request)
    {
        if ($request->ajax()) {
            $data = array(
                'FirstName'    =>  $request->FirstName,
                'LastName'     =>  $request->LastName
            );
            $id = DB::table('usernames')->insert($data);
            if ($id > 0) {
                echo '<div class="alert alert-success">Data Inserted</div>';
            }
        }
    }

    function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $Username = Username::orderBy('id', 'desc')->get();
            echo json_encode($Username);
        }
    }

    function detail_data(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('usernames')->where('id', $request->id)->first();
            echo json_encode($data);
        }
    }

    function delete_data(Request $request)
    {
        if ($request->ajax()) {
            DB::table('usernames')
                ->where('id', $request->id)
                ->delete();
            echo '<div class="alert alert-success">Data Deleted</div>';
        }
    }

    function update_data(Request $request)
    {
        if ($request->ajax()) {
            $data = array(
                'FirstName'    =>  $request->FirstName,
                'LastName'     =>  $request->LastName
            );
            DB::table('usernames')
                ->where('id', $request->id)
                ->update($data);
            echo '<div class="alert alert-success">Data Updated</div>';
        }
    }

    // public function datatable(Request $request)
    // {
    //     if ($request->ajax()) {

    //         return DataTables::of(Username::all())->make(true);
    //     }
    // }
    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('usernames')->whereIn('id', $ids)->delete();

        }

        // $ids = $request->ids;
        // DB::table('usernames')
        //         ->whereIn('id',explode(",",$ids))
        //         ->delete();
        //
    }
}
