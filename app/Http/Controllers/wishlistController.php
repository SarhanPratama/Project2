<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class wishlistController extends Controller
{
    public function index()
    {
        $title = 'My Wishlist';
        $wishlists = DB::table('wishlist')
                        ->leftjoin('tbstok', 'wishlist.id_stok', '=', 'tbstok.id')
                        ->where('wishlist.id_user', Auth::id())
                        ->select(
                                    'wishlist.id', 'tbstok.nama as nama',
                                    'tbstok.id as id', 'tbstok.foto as foto',
                                    'tbstok.hargajual as hargajual'
                                )
                        ->get();

        return view('ecommerce.layouts.wishlist', compact('wishlists', 'title'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_stok' => 'required|exists:tbstok,id',
        ]);

        $existingWishlist = DB::table('wishlist')
            ->where('id_user', Auth::id())
            ->where('id_stok', $request->id_stok)
            ->exists();

        if (!$existingWishlist) {
            DB::table('wishlist')->insert([
                'id_user' => Auth::id(),
                'id_stok' => $request->id_stok,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Product added to wishlist!');
        }

        return redirect()->back()->with('error', 'Product is already in your wishlist.');
    }


    public function destroy($id)
    {

        $wishlist = DB::table('wishlist')
                        ->where('id_user', Auth::id())
                        ->where('id', $id)
                        ->first();

        if ($wishlist) {
            DB::table('wishlist')->where('id', $id)->delete();
            return redirect()->back()->with('success', 'Product removed from wishlist!');
        }

        return redirect()->back()->with('error', 'Product not found in your wishlist.');
    }

    public function clearWishlist()
{
    try {

        DB::table('wishlist')->where('id_user', auth()->id())->delete();

        return redirect()->back()->with('success', 'Wishlist cleared successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to clear wishlist. Please try again.');
    }
}
}
