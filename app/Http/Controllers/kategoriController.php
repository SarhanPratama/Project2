<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index()
    {
        $title = 'Product Category';

        $kategori = DB::table('tbkategori')->get();

        return view('Admin.kategori.list', compact('kategori', 'title'));
    }

    public function create()
    {
        return view('Admin.kategori.form');
    }

    public function store(Request $r)
    {
        $r->validate([
            'nama' => 'required|string|max:255',
            'foto.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nama' => $r->nama,
        ];

        // Upload foto jika ada
        if ($r->hasFile('foto')) {
            $fotoArray = [];
            foreach ($r->file('foto') as $foto) {
                $namaFoto = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
                $foto->storeAs('public/kategori', $namaFoto);
                $fotoArray[] = $namaFoto;
            }
            $data['foto'] = json_encode($fotoArray);
        }

        // Periksa apakah kategori dengan nama yang sama sudah ada
        if (DB::table('tbkategori')->where('nama', $r->nama)->exists()) {
            return redirect()->route('kategori.index')
                ->with('judul', 'Daftar Kategori')
                ->with('pesan', 'Kategori ini sudah terdaftar.');
        }

        DB::table('tbkategori')->insert($data);

        return redirect()->route('kategori.index')
            ->with('judul', 'Daftar Kategori')
            ->with('pesan', 'Kategori berhasil ditambahkan.');
    }

    public function show($id)
    {
        $kategori = DB::table('tbkategori')->find($id);

        if (!$kategori) {
            return redirect()->route('kategori.index')->with('pesan', 'Kategori tidak ditemukan.');
        }

        return view('Admin.kategori.formedit', compact('kategori'));
    }

    public function update(Request $r, $id)
    {
        $r->validate([
            'nama' => 'required|string|max:255',
            'foto.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $record = DB::table('tbkategori')->find($id);

        if (!$record) {
            return redirect()->route('kategori.index')->with('pesan', 'Kategori tidak ditemukan.');
        }

        $data = [
            'nama' => $r->nama,
        ];

        // Update foto jika ada
        if ($r->hasFile('foto')) {
            // Hapus foto lama jika ada
            if (!empty($record->foto)) {
                $existingFotos = json_decode($record->foto, true);
                if (is_array($existingFotos)) {
                    foreach ($existingFotos as $existingFoto) {
                        Storage::delete('public/kategori/' . $existingFoto);
                    }
                }
            }

            $fotoArray = [];
            foreach ($r->file('foto') as $foto) {
                $namaFoto = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
                $foto->storeAs('public/kategori', $namaFoto);
                $fotoArray[] = $namaFoto;
            }
            $data['foto'] = json_encode($fotoArray);
        }

        DB::table('tbkategori')->where('id', $id)->update($data);

        return redirect()->route('kategori.index')
            ->with('judul', 'Daftar Kategori')
            ->with('pesan', 'Kategori berhasil diperbarui.');
    }
}
