<?php

namespace App\Http\Controllers;
use App\Models\DetailCustomer;

use Illuminate\Http\Request;

class DetailCustomerController extends Controller
{
    public function index(){
        return view('customer.detail_customer.index');
    }

    public function itemDetail(){
        $details = DetailCustomer::orderBy('id', 'DESC')->get();
        return view('customer.detail_customer.item_data')->with([
            'detail_customers' => $details
        ]);
    }



}
