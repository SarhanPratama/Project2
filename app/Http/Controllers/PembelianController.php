<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{

    public function index()
    {
        $Pembelian = DB::table('tbbeli')
        ->leftJoin('tbpemasok', 'tbpemasok.id', '=', 'tbbeli.idpemasok')
        ->leftJoin('tbstok', 'tbstok.id', '=', 'tbbeli.idstok')
        ->select('tbbeli.nobukti', 'tbbeli.tgl', 'tbbeli.keterangan', 'tbbeli.harga', 'tbbeli.qty as qty', 'tbbeli.total as total','tbpemasok.nama',
        'tbstok.nama as namastok', 'tbstok.foto as foto')
        ->groupBy('tbbeli.nobukti', 'tbbeli.tgl', 'tbbeli.keterangan', 'tbbeli.harga', 'tbbeli.qty', 'tbbeli.total',
        'tbpemasok.nama', 'tbstok.nama', 'tbstok.foto', 'tbstok.nama')

        ->get(); 
        // DD($Pembelian);
        return view('Admin.Pembelian.list')
        ->with('Pembelian',$Pembelian)
        ;
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $nobukti = $request->session()->get('nobukti');
        if (!$nobukti) {
            $nobukti = 'B'. $user->id . now()->format('YmdHis');
            $request->session()->put('nobukti', $nobukti);
        }
        $rec = DB::table('tbbeli')
        ->leftJoin('tbpemasok', 'tbpemasok.id', '=', 'tbbeli.idpemasok')
        ->leftJoin('tbstok', 'tbstok.id', '=', 'tbbeli.idstok')
        ->select('tbbeli.nobukti', 'tbbeli.tgl', 'tbbeli.keterangan', 'tbbeli.harga', 'tbbeli.qty as qty', 'tbbeli.total as total','tbpemasok.nama',
        'tbstok.nama as namastok', 'tbstok.foto as foto')
        ->groupBy('tbbeli.nobukti', 'tbbeli.tgl', 'tbbeli.keterangan', 'tbbeli.harga', 'tbbeli.qty', 'tbbeli.total',
        'tbpemasok.nama', 'tbstok.nama', 'tbstok.foto', 'tbstok.nama')

        ->where('nobukti', $nobukti)
        ->get();  
       

        $stok = DB::table('tbstok')
            ->get();

            $Pemasok = DB::table('tbpemasok')
            ->get();

        return view('Admin.Pembelian.form')
        ->with('nobukti', $nobukti)
        ->with('rec', $rec)
        ->with('stok', $stok)
        ->with('Pemasok', $Pemasok)
        ;

    }

    public function store(Request $r)
    {
        $nobukti = $r->input('nobukti');
        $Pemasok = $r->input('idpemasok');
        $stok = $r->input('idstok');
        $tgl = $r->input('tgl');
        $x = array(
            'nobukti' => $r->nobukti,
            'idpemasok' => $Pemasok,
            'idstok' => $stok,
            'tgl' => $tgl,
            'keterangan' => $r->keterangan,
            'qty' => $r->qty,
            'harga' => $r->harga,
            'total' => ($r->harga * $r->qty),
        );

            DB::table('tbbeli')->insertgetId($x);
      
            DB::table('tbmutasi')->insert([
                'nobukti' => $nobukti,
                'idstok' => $stok,
                'quantity' => $r->qty,
                'mk' => 'M',
                'harga' => $r->harga,

            ]);

        return redirect ('Pembelian/create')
            ->with('Pembelian', 'Daftar Pembelian')
            ->with(['nobukti' => $nobukti]);
    }

    public function update(Request $r)
    {
        $x = array(
            'idstok' => $r->idstok,
            'qty' => $r->qty,
            'harga' => $r->harga,
            'total' => ($r->harga * $r->qty),
        );

        DB::table('tbbeli')
            ->where('nobukti', $r->nobukti)
            ->update($x);

        return view('Admin.Pembelian.list')
            ->with('judul', 'Daftar barang');
    }

    public function show($id)
    {
        $Pembelian = DB::table('tbbeli')->find($id);
        $Pemasok = DB::table('tbpemasok')->get();
        $stok = DB::table('tbstok')->get();

        return view('Admin.Pembelian.edit', compact('Pembelian', 'Pemasok','stok'))
            ->with('Pembelian', 'Form Edit Data barang')
            ->with('id', $id);
    }

    public function resetNobukti(Request $request){
        $request->session()->forget('nobukti');
        return redirect('Pembelian/create');
    }


    public function destroy(Request $r)
    {
        DB::table('tbbeli')
            ->where('id', $r->id)
            ->delete();

        return view('Admin.Pembelian.list')
            ->with('Pembelian', 'Daftar Pembelian');
    }

    public function deletebeli($id){
        DB::table('tbbeli')
        ->where('id', $id)
        ->delete();

        return view ('Admin.Pembelian.form')
        ->with('Pembelian', 'Daftar Pembelian');
    }

}
