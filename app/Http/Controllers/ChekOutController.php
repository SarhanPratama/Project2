<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class ChekOutController extends Controller
{

    public function checkout () {

        $id_user = auth()->user()->id;
        $keranjang = DB::table('keranjang')->select('harga')
        ->where('idpelanggan', $id_user)
        ->get();

        $total = 0;
        foreach($keranjang as $item) {
            $total += $item->harga;
        }
        // dd($total);

        // $subtotal = $total + 30000;

        return view('ecommerce.layouts.Chekout')
        ->with('total', $total)
        // ->with('total',$total)
        ;

    }

    public function prosescheckout(Request $request)
    {

        $nobukti = 'J' . now()->format('YmdHis') . rand(1000, 9999);


        $request->validate([
            'city' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'payment_method' => 'required|in:bri,bni,mandiri,gopay',
            'note'=> ''
        ]);

        if ($request->hasFile('buktipem')) {

            $request->validate([
                'buktipem' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $foto = $request->file('buktipem');

            $namaFoto = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();

            $foto->storeAs('public/buktipem', $namaFoto);
        } else {
            $namaFoto = null;
        }

        $user = Auth::user();

        $pelanggan = DB::table('tbpelanggan')->where('id_user', $user->id)->first();

        if (!$pelanggan) {
            DB::table('tbpelanggan')->insert([
                'kode' => $nobukti,
                'id_user' => $user->id,
                'nama' => $user->name,
                'kota' => $request->city,
                'alamat' => $request->address,
                'nohp' => $request->phone,
                'kodepos' => $request->zipcode,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

            $keranjang = DB::table('keranjang')
            ->leftJoin('tbstok', 'tbstok.id', '=', 'keranjang.idstok')
            ->select('keranjang.*', 'tbstok.hargajual as hj')
            ->where('keranjang.idpelanggan', $user->id)
            ->get();

            $totalharga = 0;
            foreach ($keranjang as $value) {

                $totalharga += $value->harga;
            }

            DB::table('tbjual')->insert([
                'nobukti' => $nobukti,
                'tgl' => now(),
                'idpelanggan' => $user->id,
                'keterangan' => 'Pembelian Barang',
                'total' => $totalharga,
                'payment_method' => $request->payment_method,
                'buktipem' => $namaFoto,
                'note' => $request->note
            ]);


            foreach ($keranjang as $barang) {

                DB::table('tbmutasi')->insert([
                    'nobukti' => $nobukti,
                    'idstok' => $barang->idstok,
                    'quantity' => $barang->jumlah,
                    'mk' => 'K',
                    'harga' => $barang->hj,
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                DB::table('tbstok')
                ->where('id', $barang->idstok)
                ->decrement('saldoawal', $barang->jumlah);

                DB::table('keranjang')->where('id', $barang->id)->delete();
            }

            return redirect('checkout-complete')->with('success', 'Checkout Berhasil!');
    }

    public function checkoutComplete() {
        $title = 'Success';
        return view('ecommerce.layouts.chekout-complete')
        ->with('title', $title);
    }

}
