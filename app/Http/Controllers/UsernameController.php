<?php

namespace App\Http\Controllers;

use App\Models\Username;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;
use App\Exports\UsersExport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

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
        return view('livetable.item_data', compact('usernames'));
    }

    public function store(Request $request)
    {
        $data = array(
            'FirstName'    =>  $request->FirstName,
            'LastName'     =>  $request->LastName
        );
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
        $data->FirstName = $request->FirstName;
        $data->LastName = $request->LastName;
        $data->save();
    }
    public function selected()
    {
        $usernames = Username::all();
        return view('livetable.selected')->with([
            'usernames' => $usernames
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = Username::findOrfail($id);
        $data->FirstName = $request->FirstName;
        $data->LastName = $request->LastName;

        echo $id;
    }
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
    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(Username::all())->make(true);
        }
    }

<<<<<<< HEAD
    // public function index()
    // {

    //     $Username = Username::all();
    //     return view('livetable.live_table', compact('Username'));
    //     // dd($Username);
    // }

    // function add_data(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = array(
    //             'FirstName'    =>  $request->FirstName,
    //             'LastName'     =>  $request->LastName
    //         );
    //         $id = DB::table('usernames')->insert($data);
    //         if ($id > 0) {
    //             echo '<div class="alert alert-success">Data Inserted</div>';
    //         }
    //     }
    // }

    // function fetch_data(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $Username = Username::orderBy('id', 'desc')->get();
    //         echo json_encode($Username);
    //     }
    // }

    // function detail_data(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = DB::table('usernames')->where('id', $request->id)->first();
    //         echo json_encode($data);
    //     }
    // }

    // function delete_data(Request $request)
    // {
    //     if ($request->ajax()) {
    //         DB::table('usernames')
    //             ->where('id', $request->id)
    //             ->delete();
    //         echo '<div class="alert alert-success">Data Deleted</div>';
    //     }
    // }

    // function update_data(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = array(
    //             'FirstName'    =>  $request->FirstName,
    //             'LastName'     =>  $request->LastName
    //         );
    //         DB::table('usernames')
    //             ->where('id', $request->id)
    //             ->update($data);
    //         echo '<div class="alert alert-success">Data Updated</div>';
    //     }
    // }

    // public function datatable(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = array(
    //             'FirstName'    =>  $request->FirstName,
    //             'LastName'     =>  $request->LastName
    //         );
    //         $id = DB::table('usernames')->insert($data);
    //         if ($id > 0) {
    //             echo '<div class="alert alert-success">Data Inserted</div>';
    //         }
    //     }
    // }

    // function fetch_data(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $Username = Username::orderBy('id', 'desc')->get();
    //         echo json_encode($Username);
    //     }
    // }

    // function detail_data(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = DB::table('usernames')->where('id', $request->id)->first();
    //         echo json_encode($data);
    //     }
    // }

    // function delete_data(Request $request)
    // {
    //     if ($request->ajax()) {
    //         DB::table('usernames')
    //             ->where('id', $request->id)
    //             ->delete();
    //         echo '<div class="alert alert-success">Data Deleted</div>';
    //     }
    // }

    // function update_data(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = array(
    //             'FirstName'    =>  $request->FirstName,
    //             'LastName'     =>  $request->LastName
    //         );
    //         DB::table('usernames')
    //             ->where('id', $request->id)
    //             ->update($data);
    //         echo '<div class="alert alert-success">Data Updated</div>';
    //     }
    // }
=======

    public function deleteAll(Request $request)
    {
            $ids = $request->input('id');
            $data = Username::WhereIn('id', $ids);
            $data->delete();
    }


    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(Username::all())->make(true);
        }
    }

    public function selected()
    {
        $usernames = Username::all();
        return view('livetable.selected')->with([
            'usernames' => $usernames
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = Username::findOrfail($id);
        $data->FirstName = $request->FirstName;
        $data->LastName = $request->LastName;

        echo $id;
    }
>>>>>>> 784b498cf83f37e97e5281cab8281f088ca92032

    public function updateSelected(Request $request)
    {
        Username::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
