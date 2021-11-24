<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TaskController extends Controller
{

    public function index()
    {

        return view('DataSelect.task.index');
    }

    public function add_form()
    {

        return view('DataSelect.task.add_form');
    }

    public function item_data()
    {
        $task = Task::orderBy('id', 'DESC')->get();
        return view('DataSelect.task.item_data', compact('task'));
    }

    public function store(Request $request)
    {
        $data = array(
            'task'    =>  $request->task,
            'jenis'    =>  $request->jenis,


        );
        task::insert($data);
    }

    public function show($id)
    {
        $task = Task::findOrfail($id);
        return view('DataSelect.task.edit_form')->with([
            'task' => $task
        ]);
    }

    public function destroy($id)
    {
        $data = Task::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = Task::findOrfail($id);
        $data->task = $request->task;
        $data->jenis = $request->jenis;

        $data->save();
    }




    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(task::all())->make(true);
        }
    }
}
