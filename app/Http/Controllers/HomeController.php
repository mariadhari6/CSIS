<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Gps;
use App\Models\Sensor;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $company = Company::all();
        $gps = Gps::all();
        $vehicle = Vehicle::all();
        $sensor = Sensor::all();



        return view('home')->with([
            'company' => $company,
            'gps' => $gps,
            'vehicle' => $vehicle,
            'sensor' => $sensor,
        ]);
    }
}
