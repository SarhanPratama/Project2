@extends('welcome3')
@section('content')

    <div id="main-wrapper">
        <!-- row -->
        <div class="row g-3">
            <div class="grid-margin">
                <div class="card card-white mb-3">
                    <div class="card-heading clearfix">
                        <h4 class="card-title">Product information</h4>
                    </div>
                    <div class="card-body">

                        {{-- <form action="{{ url('Stock/'. $stok->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>Kode</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="kode" value="{{ $stok->kode }}" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="nama" value="{{ $stok->nama }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Satuan</label>
                                    <input type="text" class="form-control" id="validationCustom03" name="idsatuan" value="{{ $stok->idsatuan }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Kategori</label>
                                   <select class="form-control" name="idkategori" id="">
                                    @foreach ($kategori as $item)

                                    <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                                    @endforeach
                                   </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom04">Saldo Awal</label>
                                    <input type="text" class="form-control" id="validationCustom04" name="saldoawal" value="{{ $stok->saldoawal }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom05">Harga Beli</label>
                                    <input type="text" class="form-control" id="validationCustom05" name="hargabeli" value="{{ $stok->hargabeli }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom05">Harga Jual</label>
                                    <input type="text" class="form-control" id="validationCustom05" name="hargajual" value="{{ $stok->hargajual }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom05">Harga Modal</label>
                                    <input type="text" class="form-control" id="validationCustom05" name="hargamodal" value="{{ $stok->hargamodal }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom05">Desc</label>
                                    <input type="text" class="form-control" id="validationCustom05" name="desc" value="{{ $stok->desc }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom05">Pajang</label>
                                    <input type="text" class="form-control" id="validationCustom05" name="pajang" value="{{ $stok->pajang }}" required>
                                </div>



                                <div>

                                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="foto[]" multiple>
                                </div>

                            </div>
                            <button type="sudmit">Simpan</button>
                        </form> --}}

                        <form class="needs-validation" novalidate action="{{ url('Stock/'. $stok->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <!-- Kode Produk -->
                                <div class="col-md-6">
                                    <label for="kode" class="form-label">Kode Produk</label>
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode', $stok->kode) }}" placeholder="Masukkan kode produk" required>
                                    @error('kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Nama Produk -->
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $stok->nama) }}" placeholder="Masukkan nama produk" required>
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Satuan Produk -->
                                <div class="col-md-6">
                                    <label for="idsatuan" class="form-label">Satuan Produk</label>
                                    <select class="form-select @error('idsatuan') is-invalid @enderror" id="idsatuan" name="idsatuan" required>
                                        <option value="" hidden>Pilih kategori</option>
                                        @foreach ($satuan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('idkategori', $stok->idsatuan) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('idsatuan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Kuantitas -->
                                <div class="col-md-6">
                                    <label for="saldoawal" class="form-label">Kuantitas</label>
                                    <input type="number" class="form-control @error('saldoawal') is-invalid @enderror" id="saldoawal" name="saldoawal" value="{{ old('saldoawal', $stok->saldoawal) }}" placeholder="Masukkan jumlah produk tersedia" required>
                                    @error('saldoawal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Harga Beli -->
                                <div class="col-md-6">
                                    <label for="hargabeli" class="form-label">Harga Beli</label>
                                    <input type="number" class="form-control @error('hargabeli') is-invalid @enderror" id="hargabeli" name="hargabeli" value="{{ old('hargabeli', $stok->hargabeli) }}" placeholder="Masukkan harga beli produk" required>
                                    @error('hargabeli')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Harga Jual -->
                                <div class="col-md-6">
                                    <label for="hargajual" class="form-label">Harga Jual</label>
                                    <input type="number" class="form-control @error('hargajual') is-invalid @enderror" id="hargajual" name="hargajual" value="{{ old('hargajual', $stok->hargajual) }}" placeholder="Masukkan harga jual produk" required>
                                    @error('hargajual')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <!-- Kategori Produk -->
                                <div class="col-md-12">
                                    <label for="idkategori" class="form-label">Kategori Produk</label>
                                    <select class="form-select @error('idkategori') is-invalid @enderror" id="idkategori" name="idkategori" required>
                                        <option value="" hidden>Pilih kategori</option>
                                        @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('idkategori', $stok->idkategori) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('idkategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Deskripsi Produk -->
                                <div class="col-md-12">
                                    <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                                    <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" rows="4" placeholder="Masukkan desc produk" required>{{ old('desc', $stok->desc) }}</textarea>
                                    @error('desc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Gambar Produk -->
                                <div class="col-md-12">
                                    <label for="gambar" class="form-label">Unggah Gambar Produk</label>
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto[]" multiple>
                                    @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="product-images d-flex gap-2">
                                @if (!empty($images) && is_array($images))
                                    @foreach ($images as $image)
                                        <div class="product-image">
                                            <img src="{{ asset('storage/foto/' . $image) }}" alt="Product Image" style="width: 150px; height: auto; margin: 10px;">
                                        </div>
                                    @endforeach
                                @else
                                    <p>Tidak ada gambar untuk produk ini.</p>
                                @endif
                            </div>


                            <!-- Tombol Submit -->
                            <div class="mt-4">
                                <button class="btn btn-primary px-3" type="submit">Simpan Produk</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>

    @include('ecommerce.layouts.shared.alert')
@endsection
