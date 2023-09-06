<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use Carbon\Carbon;

class apichartdashboard extends Controller
{
    public function yearProfit(){
        $year = Carbon::now()->year;
        $orders = Orders::whereBetween('created_at', [
            Carbon::parse("$year-01-01")->startOfYear(),
            Carbon::parse("$year-12-31")->endOfYear()
        ])->get();
        $totalPrix = [];

        foreach ($orders as $order) {
            $totalPrix[] = $order->prixTotal;
        }
        return response()->json($totalPrix);
    }
}
