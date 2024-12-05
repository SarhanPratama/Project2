<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use DB;

class ShopCartController extends Controller
{

    public function keranjang()
    {
        $title = 'Shop Cart';
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
                $total += $stock ->harga;
                $stock->fotoArray = json_decode($stock->foto, true);
            }

        return view('ecommerce.layouts.shopcart')
            ->with('shopcart', $shopcart)
            ->with('title', $title)
            ->with('total', $total);
    }

    public function shopcartitem(Request $request, $id)
    {
        $idpelanggan = auth()->user()->id;
        $barang = DB::table('tbstok')->where('id', $id)->first();

        $jumlah = $request->input('jumlah', 1);

        $existingCart = DB::table('keranjang')
            ->leftJoin('tbstok', 'tbstok.id', '=', 'keranjang.idstok')
            ->select('keranjang.*', 'tbstok.hargajual as hargajual')
            ->where('keranjang.idpelanggan', $idpelanggan)
            ->where('keranjang.idstok', $id)
            ->first();

        if ($existingCart) {
            DB::table('keranjang')
                ->where('id', $existingCart->id)
                ->update([
                    'jumlah' => $existingCart->jumlah + $jumlah,
                    'harga' => ($existingCart->jumlah + $jumlah) * $barang->hargajual,
                ]);
        } else {
            DB::table('keranjang')->insert([
                'idpelanggan' => $idpelanggan,
                'idstok' => $id,
                'jumlah' => $jumlah,
                'harga' => $jumlah * $barang->hargajual,
                'tgl' => now(),
            ]);
        }
        return redirect()->back()->with('success', 'berhasil ditambahkan ke keranjang');

    }

    public function deletecart($id)
    {
        $idpelanggan = auth()->user()->id;
        // $iduser = auth()->user()->id;

        $item = DB::table('keranjang')
            ->where('idpelanggan', $idpelanggan)
            ->where('idstok', $id)
            // ->where('iduser', $iduser)
            ->delete();

        return redirect()->back()->with('success', 'Product berhasil dihapus dari keranjang');
    }


    public function updatecart(request $request, $id){

        $iduser = auth::id();
        $newjumlah = $request-> input('jumlah');

        DB::table('keranjang')
            ->where('idstok', $id)
            ->where('idpelanggan', $iduser)
            ->update(['jumlah'=> $newjumlah]);

        return redirect()->back();
    }

}
