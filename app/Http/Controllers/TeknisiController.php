<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeknisiController extends Controller
{
    public function index()
    {
        return view('home.teknisi');
    }
}
