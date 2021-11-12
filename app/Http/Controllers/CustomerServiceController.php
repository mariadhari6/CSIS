<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Auth;
use App\Models\Company;
use App\Models\Gps;
use App\Models\Gsm;
use App\Models\Sensor;
use App\Models\Username;
use App\Models\Vehicle;

class CustomerServiceController extends Controller
{
    //
    public function index()
    {

        $company = Company::all();
        $gps = Gps::all();
        $vehicle = Vehicle::all();
        $sensor = Sensor::all();
        $gsm = Gsm::all();
        $username = Username::where('id', 3)->count();
        return view('tes')->with([
            'company' => $company,
            'gps' => $gps,
            'vehicle' => $vehicle,
            'sensor' => $sensor,
            'username' => $username,
            'gsm' => $gsm,



        ]);
    }
    public function utama()
    {
        return view('partials.v_login');
    }
}
