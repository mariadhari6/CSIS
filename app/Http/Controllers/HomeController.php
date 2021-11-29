<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Gps;
use App\Models\Sensor;
use App\Models\Vehicle;

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



<<<<<<< HEAD
        return view('tes')->with([
=======
        return view('home')->with([
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
            'company' => $company,
            'gps' => $gps,
            'vehicle' => $vehicle,
            'sensor' => $sensor,
        ]);
    }
}
