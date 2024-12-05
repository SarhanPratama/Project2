<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cartController extends Controller
{
    public function index() {
        try {
            $idpelanggan = auth()->user()->id;

            $shopcart = DB::table('keranjang')
                ->leftJoin('tbstok', 'tbstok.id', '=', 'keranjang.idstok')
                ->leftJoin('tbkategori', 'tbkategori.id', '=', 'tbstok.idkategori')
                ->leftJoin('tbpelanggan', 'tbpelanggan.id', '=', 'keranjang.idpelanggan')
                ->leftJoin('tbsatuan', 'tbsatuan.id', '=', 'tbstok.idsatuan')
                ->select('keranjang.*', 'tbstok.*', 'tbpelanggan.nama as namaPelanggan', 'tbkategori.nama as namaKategori', 'tbsatuan.nama as namaSatuan')
                ->where('keranjang.idpelanggan', $idpelanggan)
                ->get();

            $total = 0;
            foreach ($shopcart as $stock) {
                $total += $stock->harga;

                // Debug: pastikan foto valid sebelum di-decode
                if (!empty($stock->foto)) {
                    $stock->fotoArray = json_decode($stock->foto, true);
                } else {
                    $stock->fotoArray = [];
                }
            }

            return view('ecommerce.layouts.shopcart')
                ->with('shopcart', $shopcart)
                ->with('total', $total);

        } catch (\Exception $e) {
     
            Log::error($e->getMessage());
            abort(500, "Error: " . $e->getMessage());
        }
    }

}
