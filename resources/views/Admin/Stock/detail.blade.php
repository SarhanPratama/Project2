@extends('welcome3')

@section('content')
                <!-- PAGE INNER
            ================================================== -->
            <div class="page-inner">

                <!-- PAGE MAIN WRAPPER
                ================================================== -->
                <div id="main-wrapper">
                    <!-- row -->
                    <div class="row g-3">
                        <div class="grid-margin">
                            <div class="card card-white mb-3">
                                <div class="card-heading clearfix">
                                    <h4 class="card-title">Product information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="card card-white mb-3">
                                        <div class="card-heading clearfix">
                                            <h4 class="card-title">Media</h4>
                                        </div>
                                        <div class="card-body">

                                            <div class="row grid-margin gallery">
                                                @if (!empty($barang->fotoArray) && is_array($barang->fotoArray))
                                                @foreach ($barang->fotoArray as $foto)
                                                    {{-- <a href="{{ asset('storage/foto/' . $foto) }}">
                                                        <a href=""><img class="xzoom-gallery5" width="80" src="{{ asset('storage/foto/' . $foto) }}" xpreview="{{ asset('storage/foto/' . $foto) }}" title="The description goes here"></a>
                                                    </a> --}}

                                                <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
                                                    <div class="card">
                                                        <img src="{{ asset('storage/foto/' . $foto) }}" width="80" class="card-img-top" alt="...">
                                                        <div class="card-body row text-center">
                                                            <div class="col border-end">
                                                                <a href="{{ asset('storage/foto/' . $foto) }}" class="popimg" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                                    <i class="far fa-eye text-primary"></i>
                                                                </a>
                                                            </div>
                                                            {{-- <div class="col">
                                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                                    <i class="far fa-trash-alt text-danger"></i>
                                                                </a>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                            {{-- <div class="row">
                                                <div class="col-md-12">
                                                    <div>
                                                        <input class="form-control form-control-lg" id="formFileLg" type="file">
                                                    </div>
                                                </div>
                                            </div> --}}

                                        </div>
                                    </div>

                                    <form class="needs-validation" novalidate>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">Kode Produk</label>
                                                <input type="text" class="form-control" value="{{ $barang->kode}}" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">Nama Produk</label>
                                                <input type="text" class="form-control" value="{{ $barang->nama}}" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02">Satuan Produk</label>
                                                <input type="text" class="form-control" id="validationCustom02" placeholder="124617209" value="{{ $barang->satuan}}" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03">Kuantitas</label>
                                                <input type="text" class="form-control" value="{{ $barang->saldoawal}}" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom04">Harga Beli</label>
                                                <input type="text" class="form-control"  value="{{ $barang->hargabeli}}" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom05">Harga Jual</label>
                                                <input type="text" class="form-control" id="validationCustom05" value="{{ $barang->hargajual}}" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom05">Kategori Produk</label>
                                                <input type="text" class="form-control" id="validationCustom05" value="{{ $barang->kategori}}" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                                                <textarea class="form-control" id="desc" name="desc" rows="4" placeholder="Masukkan desc produk" required> {{ $barang->desc}}</textarea>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>

                    </div>
                    <!-- end row -->
                </div>

                <div class="page-footer">
                    <p>Copyright &copy; <span class="current-year"></span> Smartshop All rights reserved.</p>
                </div>
            </div>
@endsection
