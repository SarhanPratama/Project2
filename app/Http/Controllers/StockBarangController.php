<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StockBarangController extends Controller
{

    public function index(Request $r)
    {
        $query = DB::table('tbstok')
            ->leftJoin('tbkategori', 'tbkategori.id', '=', 'tbstok.idkategori')
            ->select('tbstok.*', 'tbkategori.nama as kategori');

        if ($r->has('kategori') && is_array($r->kategori)) {
            $query->whereIn('tbkategori.id', $r->kategori);
        }

        if ($r->has('search')) {
            $search = $r->search;
            $query->where(function ($q) use ($search) {
                $q->where('tbstok.nama', 'like', '%' . $search . '%')
                    ->orWhere('tbkategori.nama', 'like', '%' . $search . '%')
                    ->orWhere('tbstok.kode', 'like', '%' . $search . '%');
            });
        }

        $barang = $query->paginate(8)->appends($r->all());
        $kategori = DB::table('tbkategori')->get();


        return view('Admin.Stock.list', [
            'judul' => 'Daftar Stock',
            'barang' => $barang,
            'kategori' => $kategori,
            'search' => $r->search ?? '',
        ]);
    }



    public function create(request $r)
    {
        $kategori = DB::table('tbkategori')->get();
        $satuan = DB::table('tbsatuan')->get();
        return view('Admin.Stock.form')
            ->with('kategori', $kategori)
            ->with('satuan', $satuan)
            ->with('judul', 'Form Stock')
        ;
    }


    public function store(Request $r)
    {

        $x = $r->validate([
            'kode' => 'required|unique:tbstok,kode',
            'nama' => 'required',
            'idsatuan' => 'required|integer',
            'idkategori' => 'required|integer',
            'saldoawal' => 'required|numeric',
            'hargabeli' => 'required|numeric',
            'hargajual' => 'required|numeric',
            'desc' => 'nullable|string',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoArray = [];


        if ($r->hasFile('foto')) {

            $r->validate([
                'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            foreach ($r->file('foto') as $foto) {

                $namaFoto = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
                $foto->storeAs('public/foto', $namaFoto);
                $fotoArray[] = $namaFoto;
            }

            $x['foto'] = json_encode($fotoArray);
        }

        $pesan = '';
        $rec = DB::table('tbstok')
            ->where('kode', $r->kode)
            ->first();

        if ($rec == null) {
            DB::table('tbstok')->insertGetId($x);
        } else {
            $pesan = "KODE INI SUDAH TERDAFTAR...!";
        }

        return redirect()->route('Stock.index')
            ->with('judul', 'Daftar Stock')
            ->with('pesan', $pesan);
    }


    public function show($id)
    {
        $barang = DB::table('tbstok')

            ->leftjoin('tbsatuan', 'tbsatuan.id', '=', 'tbstok.idsatuan')
            ->leftjoin('tbkategori', 'tbkategori.id', '=', 'tbstok.idkategori')
            ->select('tbstok.*', 'tbsatuan.nama as satuan', 'tbkategori.nama as kategori')
            ->where('tbstok.id', $id)
            ->first();

        // $images = $stok->foto ? json_decode($stok->foto, true) : [];

                // Decode the foto field into an array
                if ($barang && !empty($barang->foto)) {
                    $barang->fotoArray = json_decode($barang->foto, true);
                } else {
                    $barang->fotoArray = [];
                }

        $kategori = DB::table('tbkategori')->get();
        $satuan = DB::table('tbsatuan')->get();

        return view('Admin.Stock.detail')
            ->with('judul', 'Form Edit Stock')
            ->with('id', $id)
            ->with('barang', $barang)
            ->with('kategori', $kategori)
            ->with('satuan', $satuan)
            // ->with('images', $images)
        ;
    }

    public function edit($id) {
        $stok = DB::table('tbstok')

            ->leftjoin('tbsatuan', 'tbsatuan.id', '=', 'tbstok.idsatuan')
            ->leftjoin('tbkategori', 'tbkategori.id', '=', 'tbstok.idkategori')
            ->select('tbstok.*', 'tbsatuan.nama as satuan', 'tbkategori.nama as kategori')
            ->where('tbstok.id', $id)
            ->first();

        $images = $stok->foto ? json_decode($stok->foto, true) : [];

        $kategori = DB::table('tbkategori')->get();
        $satuan = DB::table('tbsatuan')->get();

        return view('Admin.Stock.formedit')
            ->with('judul', 'Form Edit Stock')
            ->with('id', $id)
            ->with('stok', $stok)
            ->with('kategori', $kategori)
            ->with('satuan', $satuan)
            ->with('images', $images)
        ;
    }


    public function update(Request $r, $id)
    {

        $record = DB::table('tbstok')->where('id', $id)->first();
        if (!$record) {
            return redirect()->route('Stock.index')->with('pesan', 'Record not found.');
        }

        $x = array(
            'kode' => $r->kode,
            'nama' => $r->nama,
            'idsatuan' => $r->idsatuan,
            'idkategori' => $r->idkategori,
            'saldoawal' => $r->saldoawal,
            'hargabeli' => $r->hargabeli,
            'hargajual' => $r->hargajual,
            'desc' => $r->desc,
        );


        $fotoArray = [];

        if ($r->hasFile('foto')) {
            $r->validate([
                'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if (!empty($record->foto)) {
                $existingFotos = json_decode($record->foto, true);
                if (is_array($existingFotos)) {
                    foreach ($existingFotos as $existingFoto) {
                        Storage::delete('public/foto/' . $existingFoto);
                    }
                }
            }

            foreach ($r->file('foto') as $foto) {

                $namaFoto = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();

                $foto->storeAs('public/foto', $namaFoto);

                $fotoArray[] = $namaFoto;
            }

            $x['foto'] = json_encode($fotoArray);
        } else {
            $x['foto'] = $record->foto;
        }

        DB::table('tbstok')->where('id', $id)->update($x);

        return redirect()->route('Stock.index')
            ->with('judul', 'Daftar Stock')
            ->with('pesan', 'Record updated successfully.');
    }


    public function destroy($id)
    {

        $stockItem = DB::table('tbstok')->where('id', $id)->first();


        if ($stockItem) {

            if ($stockItem->foto) {
                Storage::delete('public/foto/' . $stockItem->foto);
            }

            DB::table('tbstok')->where('id', $id)->delete();

            $pesan = 'Item successfully deleted.';
        } else {

            $pesan = 'Item not found.';
        }

        return redirect()->route('Stock.index')
            ->with('success', 'Product berhasil dihapus')
            ->with('judul', 'Daftar Stock')
            ->with('pesan', $pesan);
    }
}
