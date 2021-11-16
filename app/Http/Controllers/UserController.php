<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('MasterData.user.index');
    }

    public function add_form()
    {

        return view('MasterData.user.add_form');
    }

    public function item_data()
    {
        $user = User::orderBy('id', 'DESC')->with('roles')->get(); 
        // dd($user->roles);
        // echo $user->roles[0]['name'];
        // $roles = DB::table('model_has_roles')->orderBy('role_id', 'DESC')->get();
        return view('MasterData.user.item_data')->with([
            'user' => $user
            // 'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $data->assignRole($request->role);
    }

    public function destroy($id)
    {
        $data = User::findOrfail($id);
        $data->delete();
    }

    public function edit_form($id)
    {
        $user = User::orderBy('id', 'DESC')->with('roles')->first(); 
        return view('MasterData.user.edit_form')->with([
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        // $user = Auth::user()();
        $data = User::findOrfail($id);
        $checkEmail = User::where('email', '=', $request->email)->first();

        if ($checkEmail != "") {
            return 'fail email';
        } else if (!Hash::check($request->password, $data->password)) {
            return 'fail password';
        } 

        // Hash::make($request->password);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        // $data->status = $request->status;
        // $data->assignRole($request->role);
        // $data->save();
        // $data->save();
    }
}
