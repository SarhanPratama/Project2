<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class customerController extends Controller
{
    public function index() {

        $ordersPerCustomer = DB::table('tbpelanggan')
        ->leftJoin('tbjual', 'tbjual.idpelanggan', '=', 'tbpelanggan.id_user')
        ->leftJoin('tbmutasi', function ($join) {
            $join->on('tbmutasi.nobukti', '=', 'tbjual.nobukti')
                ->whereIn('tbmutasi.status', ['Complete', 'Process']);
        })
        ->select(
            'tbpelanggan.id',
            'tbpelanggan.id_user',
            'tbpelanggan.nama',
            'tbpelanggan.nohp',
            'tbpelanggan.created_at',
            DB::raw('COUNT(DISTINCT CASE WHEN tbmutasi.status IN ("Complete", "Process") THEN tbjual.idpelanggan ELSE NULL END) as total_orders'),
            DB::raw('SUM(CASE WHEN tbmutasi.status IN ("Complete", "Process") THEN tbjual.total ELSE 0 END) as total_order_amount')
        )
        ->groupBy('tbpelanggan.id', 'tbpelanggan.id_user', 'tbpelanggan.nama', 'tbpelanggan.nohp', 'tbpelanggan.created_at')
        ->get();
        // dd($ordersPerCustomer);



        return view('Admin.customer.list')
        ->with('ordersPerCustomer', $ordersPerCustomer)
        ;
    }

    public function destroy($id) {

        $rec = DB::table('tbpelanggan')->where('id', $id)->first();

        if ($rec) {
            DB::table('tbjual')->where('id', $id)->delete();

        }

        return redirect()->back()->with('success', 'Customer berhasil dihapus');
    }
}
