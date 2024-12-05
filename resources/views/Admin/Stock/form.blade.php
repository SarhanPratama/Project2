@extends('welcome3')
@section('content')
    <div id="main-wrapper">
        <!-- row -->
        <div class="row g-xl-3">
            <div class="grid-margin">
                <div class="card card-white mb-3">
                    <div class="card-heading clearfix">
                        <h4 class="card-title">Product information</h4>
                    </div>
                    <div class="card-body">

                        {{-- <form action="{{ url('Stock/') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01">kode</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="kode"
                                        placeholder="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Nama</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="nama"
                                        placeholder="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Id Satuan</label>
                                    <input type="text" class="form-control" id="validationCustom03" name="idsatuan"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Kategori</label>
                                    <select class="form-control" name="idkategori" id="">
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom05">Saldo Awal</label>
                                    <input type="text" class="form-control" id="validationCustom05" name="saldoawal"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom05">Harga Belik</label>
                                    <input type="text" class="form-control" id="validationCustom05" name="hargabeli"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom05">Harga Jual</label>
                                    <input type="text" class="form-control" id="validationCustom05" name="hargajual"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom05">Harga Modal</label>
                                    <input type="text" class="form-control" id="validationCustom05" name="hargamodal"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom05">Desc</label>
                                    <input type="text" class="form-control" id="validationCustom05" name="desc"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>



                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom05">Pajang</label>
                                    <input type="text" class="form-control" id="validationCustom05" name="pajang"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div>

                                    <input class="form-control form-control-lg" id="formFileLg" type="file"
                                        name="foto[]" multiple>
                                </div>
                            </div>
                            <button type="sudmit">Simpan</button>
                        </form> --}}

                        <form class="needs-validation" novalidate action="{{ url('Stock/') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <!-- Kode Produk -->
                                <div class="col-md-6">
                                    <label for="kode" class="form-label">Kode Produk</label>
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode') }}" placeholder="Masukkan kode produk" required>
                                    @error('kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Nama Produk -->
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama produk" required>
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
                                        <option hidden>Pilih Satuan Produk</option>
                                        @foreach ($satuan as $item)
                                        <option value="{{ $item->id }}" {{ old('idsatuan') == $item->id ? 'selected' : '' }}>
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
                                    <input type="number" class="form-control @error('saldoawal') is-invalid @enderror" id="saldoawal" name="saldoawal" value="{{ old('saldoawal') }}" placeholder="Masukkan jumlah produk tersedia" required>
                                    @error('saldoawal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Harga Beli -->
                                <div class="col-md-6">
                                    <label for="hargabeli" class="form-label">Harga Beli</label>
                                    <input type="number" class="form-control @error('hargabeli') is-invalid @enderror" id="hargabeli" name="hargabeli" value="{{ old('hargabeli') }}" placeholder="Masukkan harga beli produk" required>
                                    @error('hargabeli')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Harga Jual -->
                                <div class="col-md-6">
                                    <label for="hargajual" class="form-label">Harga Jual</label>
                                    <input type="number" class="form-control @error('hargajual') is-invalid @enderror" id="hargajual" name="hargajual" value="{{ old('hargajual') }}" placeholder="Masukkan harga jual produk" required>
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
                                        <option value="{{ $item->id }}" {{ old('idkategori') == $item->id ? 'selected' : '' }}>
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
                                    <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" rows="4" placeholder="Masukkan desc produk" required>{{ old('desc') }}</textarea>
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

                            <!-- Tombol Submit -->
                            <div class="mt-4">
                                <button class="btn btn-primary px-3" type="submit">Simpan Produk</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
        <!-- end row -->
    </div>

    @include('ecommerce.layouts.shared.alert')
@endsection
