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
        $username = Username::where('id', 3)->count();
        return view('tes', compact('username'));
    }
}
