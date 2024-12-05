<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanController extends Controller
{

    public function index(request $r){
        $Penjualan = DB::table('tbjual')
        ->leftjoin('tbpelanggan','tbpelanggan.id_user','=','tbjual.idpelanggan')
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
        ->get();

        // dd($Penjualan);
        // $total = 0;
        // foreach ($Penjualan as $item) {
        //     $total += $item ->harga;
        //     // $stock->fotoArray = json_decode($stock->foto, true);
        // }
        // $Penjualan = DB::table('tbjual')
        // ->leftjoin('tbpelanggan','tbpelanggan.kode','=','tbjual.nobukti')
        // ->leftjoin('tbmutasi','tbmutasi.nobukti','=','tbjual.nobukti')
        // ->select('tbjual.*','tbpelanggan.nama as pelanggan', 'tbmutasi.status as status')
        // ->get();

        return view ('Admin.Penjualan.list')
        ->with('Penjualan',$Penjualan)
        ;
        }

        public function create() {

            return view('Admin.Penjualan.form');
        }

        public function store(Request $r)
        {
            // Membuat array data dari input request
            $x = array(
                'nobukti' => $r->nobukti,
                'tgl' => $r->tgl,
                'idpelanggan' => $r->idpelanggan,
                'keterangan' => $r->keterangan,
                'total' => $r->total,
                'buktipem' => $r->buktipem,
            );

            // Cek apakah kode sudah ada di database
            $pesan = '';
            $rec = DB::table('tbjual')
                ->where('nama', $r->nama)
                ->first();

            if ($rec == null) {
                // Jika kode belum ada, masukkan data ke database
                DB::table('tbjual')->insertGetId($x);
            } else {
                // Jika kode sudah ada, buat pesan kesalahan
                $pesan = "KODE INI SUDAH TERDAFTAR...!";
            }

            // Redirect ke route 'Stock.index' dengan pesan
            return redirect()->route('Penjualan.index')
                ->with('judul', 'Daftar Penjualan')
                ->with('pesan', $pesan);
        }

    public function show($nobukti) {

        $data = DB::table('tbjual')
        ->leftjoin('tbmutasi','tbmutasi.nobukti','=','tbjual.nobukti')
        ->leftjoin('tbpelanggan','tbpelanggan.kode','=','tbjual.nobukti')
        ->select('tbjual.*', 'tbpelanggan.nama as pelanggan', 'tbpelanggan.alamat as alamat', 'tbmutasi.status as status')
        ->where('tbjual.nobukti', $nobukti)
        ->first();

        $Penjualan = DB::table('tbjual')
        ->leftjoin('tbpelanggan','tbpelanggan.kode','=','tbjual.nobukti')
        ->leftjoin('tbmutasi','tbmutasi.nobukti','=','tbjual.nobukti')
        ->leftJoin('tbstok', 'tbstok.id', '=', 'tbmutasi.idstok')
        ->select('tbjual.*', 'tbstok.*', 'tbpelanggan.nama as pelanggan', 'tbmutasi.status as status', 'tbmutasi.quantity as qty', 'tbmutasi.id as idmutasi')
        ->where('tbjual.nobukti', $nobukti)
        ->get();

        return view('Admin.Penjualan.detail')
        ->with('Penjualan', $Penjualan)
        ->with('data', $data)
        ;
    }

    public function update(Request $r, $id)
    {

        // Prepare the data to be updated
        $x = array(

            'nobukti' => $r->nobukti,
                'tgl' => $r->tgl,
                'idpelanggan' => $r->idpelanggan,
                'keterangan' => $r->keterangan,
                'total' => $r->total,
                'buktipem' => $r->buktipem,

        );

        DB::table('tbjual')->where('id', $id)->update($x);

        return redirect()->route('Penjualan.index')
            ->with('judul', 'Daftar Penjualan')
            ->with('pesan', 'Record updated successfully.');

}

public function destroy($nobukti)
{

    $rec = DB::table('tbjual')->where('nobukti', $nobukti)->first();

    if ($rec) {
        DB::table('tbjual')->where('nobukti', $nobukti)->delete();
        DB::table('tbmutasi')->where('nobukti', $nobukti)->delete();

    }
    return redirect()->route('Penjualan.index')
        ->with('judul', 'Daftar Penjualan')
        ->with('judul', 'Daftar Penjualan')
       ;
}

public function deleteProduct($id) {
    $rec = DB::table('tbmutasi')
    ->where('id', $id)
    ->first();

    if ($rec) {
        DB::table('tbmutasi')->where('id', $id)->delete();
    }

    return redirect()->back()->with('success', 'Product berhasil dihapus');
}

public function verify(Request $request, $nobukti)
{
    // Validasi input status
    $request->validate([
        'status' => 'required|in:Complete,Reject,Process',
    ]);

    // Update status berdasarkan input pengguna
    DB::table('tbmutasi')
        ->where('nobukti', $nobukti)
        ->update(['status' => $request->status]);

    return redirect()->back()->with('success', "Status updated to '{$request->status}'.");
}



}
