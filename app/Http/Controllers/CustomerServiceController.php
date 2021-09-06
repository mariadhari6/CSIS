<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Auth;
<<<<<<< HEAD
use App\Models\Username;
=======
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24

class CustomerServiceController extends Controller
{
    //
    public function index()
    {
<<<<<<< HEAD
        $username = Username::where('id', 3)->count();
        return view('tes', compact('username'));
=======
        return view('tes');
>>>>>>> 37e80c2851d05eaa6dfe9459719015d8eae19c24
    }
}
