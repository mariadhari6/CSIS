<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailCustomerController extends Controller
{
    public function index(){
        return view('customer.detail_customer.index');
    }
}
