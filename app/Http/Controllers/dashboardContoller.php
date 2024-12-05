<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardContoller extends Controller
{
    public function dashboardView() {

        $productSold = DB::table('tbmutasi')
        ->whereIn('tbmutasi.status', ['Complete', 'Process'])
        ->selectRaw('SUM(quantity) as total_products_sold')
        ->first();
        // dd($productSold);

        $netprofit = DB::table('tbmutasi')
        ->join('tbstok', 'tbstok.id', '=', 'tbmutasi.idstok',)
        ->whereIn('tbmutasi.status', ['Complete', 'Process'])
        ->selectRaw('SUM((tbstok.hargajual - tbstok.hargabeli) * tbmutasi.quantity) as profit')
        ->first();

        $newCustomers = DB::table('users')
        ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
        ->selectRaw('COUNT(*) as new_customers')
        ->first();

        return view('Admin.dashboard')
        ->with('productSold', $productSold)
        ->with('netprofit', $netprofit)
        ->with('newCustomers', $newCustomers)
        ;
    }
}
