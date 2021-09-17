<?php

namespace App\Http\Controllers;
use App\Models\SummaryCustomer;

use Illuminate\Http\Request;

class SummaryController extends Controller
{
   public function index(){
       return view('customer.summary.index');
   }

   public function item_data(){

    $summary = SummaryCustomer::orderBy('id', 'DESC')->get();
    return view('customer.summary.item_data', compact('summary'));

   }

   public function add_form(){
       return view('customer.summary.add');
   }
}
