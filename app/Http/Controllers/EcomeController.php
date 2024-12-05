<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EcomeController extends Controller
{
    public function index(){
        $stok = DB::table('tbstok')->get();

        $kategori = DB::table('tbkategori')->get();

        return view('index')
        ->with('stok', $stok)
        ->with('kategori', $kategori)
        ;
    }

    public function show($id)
    {
        $title = 'Shop Product Detail';


        $barang = DB::table('tbstok')
            ->leftJoin('tbsatuan', 'tbsatuan.id', '=', 'tbstok.idsatuan')
            ->leftJoin('tbkategori', 'tbkategori.id', '=', 'tbstok.idkategori')
            ->leftJoin('vsaldoakhir2', 'vsaldoakhir2.id', '=', 'tbstok.id')
            ->select('tbstok.*', 'tbsatuan.nama as satuan', 'tbkategori.nama as kategori', 'vsaldoakhir2.saldoakhir as saldoakhir')
            ->where('tbstok.id', $id)
            ->first();

            $relatedProducts = DB::table('tbstok')
            ->leftJoin('tbkategori', 'tbkategori.id', '=', 'tbstok.idkategori')
            ->select('tbstok.*', 'tbkategori.nama as kategori')
            ->where('tbkategori.id', $barang->idkategori)
            ->where('tbstok.id', '!=', $id)
            // ->limit(4)
            ->get();


        // Decode the foto field into an array
        if ($barang && !empty($barang->foto)) {
            $barang->fotoArray = json_decode($barang->foto, true);
        } else {
            $barang->fotoArray = [];
        }

        // Pass the record to the view
        return view('ecommerce.layouts.detail-product', compact('barang', 'title', 'relatedProducts'));
    }

    public function keranjang() {
        return view('homepage.layouts.shopcurt');
    }

    public function kategori($id) {
        $title = 'Product Category';

        $kategori = DB::table('tbstok')
        ->leftJoin('tbsatuan', 'tbsatuan.id', '=', 'tbstok.idsatuan')
        ->leftJoin('tbkategori', 'tbkategori.id', '=', 'tbstok.idkategori')
        ->select('tbstok.*', 'tbsatuan.nama as satuan', 'tbkategori.nama as kategori')
        ->where('tbkategori.id', $id)
        ->paginate(8);
    //    DD($kategori);

        return view('ecommerce.layouts.kategori')
        ->with('kategori', $kategori)
        ->with('title', $title)
        ;
    }

    public function shop(Request $request) {
        $title = 'Shop Product';

        $query = DB::table('tbstok');

        $sortBy = $request->input('sort_by', 'default');
        switch ($sortBy) {
            case 'name-asc':
                $query->orderBy('nama', 'asc');
                break;
            case 'name-desc':
                $query->orderBy('nama', 'desc');
                break;
            case 'price-asc':
                $query->orderBy('hargajual', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('hargajual', 'desc');
                break;
            default:

        }

        $products = $query->paginate(8);

        return view('ecommerce.layouts.shop')
            ->with('title', $title)
            ->with('products', $products)
            ->with('sortBy', $sortBy);

    }

    public function about() {
        $title = 'About Us';
        return view('ecommerce.layouts.about')
        ->with('title', $title)
        ;
    }

    public function contacts() {
        $title = 'Contact Us';
        return view('ecommerce.layouts.contacts')
        ->with('title', $title);
        ;
    }

    public function helpFaq() {
        $title = 'Help / FAQ';
        return view('ecommerce.layouts.help-faq')
        ->with('title', $title);
    }

}
