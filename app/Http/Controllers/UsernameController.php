<?php

namespace App\Http\Controllers;

use App\Models\Username;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;
use App\Exports\UsersExport;
use App\Models\User;
use Faker\Provider\pl_PL\LicensePlate;
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

    public function updateSelected(Request $request)
    {
        Username::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function getApi(){
        // $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        // $response->json();

        // dd($response);

        $response = Http::post('https://oslog.id/apiv5/gps/search?apiKey=8725f9e6-7713-4c99-8fd8-20ae0a523709', [
            'start' => '0',
            'lenght'=> '25',
            'name' => 'license_plate',
            'logic_operator' => 'like',
            'value' => '',
            'operator' => 'AND',
            'table_name' => 'm_vehicle',
            'name' => 'company',
            'column_result' => 'name',
            'name' => 'vehicle',
            'column_result' => ['licence_plate','name'],
            'name' => 'vehicle_type',
            'column_result' => 'name',
            'name' => 'pool',
            'column_result' => 'name',
            // 'columns' => ['id'],
            // 'ascending' => 'false'
        ]);

        $datas = $response->json();
        $data = $datas['data'];
        dd($data);
        // return view('livetable.index', compact('data'));
    }
}

