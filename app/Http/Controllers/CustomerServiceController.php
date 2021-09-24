<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Auth;
use App\Models\Username;

class CustomerServiceController extends Controller
{
    //
    public function index()
    {
<<<<<<< HEAD

        $username = Username::where('id', 3)->count();
        return view('tes', compact('username'));

=======
        $username = Username::where('id', 3)->count();
        return view('tes', compact('username'));
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
    }
    public function utama()
    {
        return view('partials.v_login');
<<<<<<< HEAD

=======
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
    }
}
