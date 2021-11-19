<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // $user = User::orderBy('id', 'DESC')->get(); 
        // // echo $user->roles->pluck('name');
        // foreach ($user as $key => $value) {
        //     // dd($value);
        //     echo $value->roles->pluck('name') . '/n';
        // }
        return view('MasterData.user.index');
    }

    public function add_form()
    {

        return view('MasterData.user.add_form');
    }

    public function item_data()
    {
        $user = User::orderBy('id', 'DESC')->get(); 
        // DB::table('roles')->where('model_id',$id)->delete();

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
        $user = User::findOrfail($id);
        // $user = User::orderBy('id', 'DESC')->with('roles')->first(); 
        return view('MasterData.user.edit_form')->with([
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        // $user = Auth::user()();
        $data = User::findOrfail($id);
        $success = '';
        $checkEmail = User::where('email', '=', $request->email)->first();

        if ($checkEmail != "") {
            if ($request->email != $data->email) {
                $success = 'fail email';
            } else {
                $success = 'success';
            }
        } 
        
        if (!Hash::check($request->password, $data->password)) {
            $success = 'fail password';
        } 
        
        if ($success == 'success') {
            $data->name = $request->name;
            if ($request->email != $data->email) {
                $data->email = $request->email;
            }
            $data->password = Hash::make($request->password);
            $data->save();
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $data->assignRole($request->role);

            return $success;    
        } else {
            return $success;
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}
