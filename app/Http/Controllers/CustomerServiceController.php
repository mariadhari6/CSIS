<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Auth;

class CustomerServiceController extends Controller
{
    //
    public function index()
    {
        return view('tes');
    }
}
