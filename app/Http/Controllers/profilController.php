<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class profilController extends Controller
{
    public function index($id) {
        $title = 'Profil';

        $user = DB::table('users')->where('id', $id)->first();
        // dd($user);
        return view('ecommerce.layouts.profil')
        ->with('user', $user)
        ->with('title', $title)
        ;
    }

    public function address() {
        $title = 'Address';

        return view('ecommerce.layouts.address')
        ->with('title', $title)
        ;

    }

    public function order() {
        $title = 'My Order';

        $Penjualan = DB::table('tbjual')
        ->leftjoin('tbpelanggan','tbpelanggan.kode','=','tbjual.nobukti')
        ->leftjoin('tbmutasi','tbmutasi.nobukti','=','tbjual.nobukti')
        ->distinct()
        ->select(
            'tbjual.id',
            'tbjual.nobukti',
            'tbpelanggan.nama as pelanggan',
            'tbjual.tgl',
            'tbjual.keterangan',
            'tbjual.total',
            'tbjual.payment_method',
            'tbjual.buktipem',
            'tbmutasi.status'
        )
        ->where('tbjual.idpelanggan', Auth::id())
        ->get();

        // dd($Penjualan);

        return view('ecommerce.layouts.order')
        ->with('title', $title)
        ->with('Penjualan', $Penjualan)
        ;
    }
}
