<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $orders = Orders::where('status','!=','Annulé')->get();
        return view('Admin.dashboard')->with('orders',$orders);
    }
}
