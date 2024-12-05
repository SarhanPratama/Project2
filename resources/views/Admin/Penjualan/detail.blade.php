@extends('welcome3')
@section('content')
<div id="main-wrapper">
    <!-- row -->
    <div class="row g-xl-3">
        <div class="col-xl-8 grid-margin">
            <div class="card card-white">
                <div class="card-heading clearfix">
                    <h4 class="card-title">Detail Penjualan</h4>
                </div>

                <div class="row">

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label>No. Bukti</label>
                            <input type="text" class="form-control" value="{{ $data->nobukti}}" name="username" placeholder="Your user name here" disabled>
                        </div>
                        <div class="form-group ">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="{{ $data->pelanggan }}" name="name" placeholder="Your name here" disabled>
                        </div>

                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label>Alamat </label>
                            <input type="text" class="form-control" value="{{ $data->alamat}}" name="username" placeholder="Your user name here" disabled>
                        </div>
                        <div class="form-group ">
                            <label>Tanggal Pesanan</label>
                            <input type="text" class="form-control" value="{{ $data->tgl }}" name="name" placeholder="Your name here" disabled>
                        </div>

                    </div>

                </div>
                <div class="card-body mt-5">

                    <div class="table-responsive mb-5">
                        <table class="table table-centered mb-0 table-nowrap product-cart">
                            <thead class="bg-light">
                                <tr>
                                    <th class="product">Img</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th colspan="2">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Penjualan as $item)
                                <tr>
                                    <td>
                                        @if($item->foto)
                                        @php
                                            $fotos = json_decode($item->foto);
                                        @endphp

                                        @foreach($fotos as $foto)
                                            <img src="{{ asset('storage/foto/' . $foto) }}" alt="...">
                                        @endforeach
                                    @else
                                        <p>Tidak ada foto tersedia.</p>
                                    @endif
                                    </td>
                                    <td>
                                        <h6 class="mb-1"><a href="{{ url('Stock/' . $item->id)}}">{{ $item->nama}}</a></h6>
                                        {{-- <p class="mb-0 text-muted">SKU: 290397</p> --}}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($item->hargajual, 0, ',', '.')}}
                                    </td>
                                    <td>
                                        <div style="width: 150px;">
                                            <input class="form-control text-center"  id="" type="text" value="{{ $item->qty}}" disabled  name="">
                                        </div>
                                    </td>
                                    <td>
                                        Rp. {{ number_format($item->qty * $item->hargajual, 0, ',', '.')}}
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ url('penjualanDeleteProduct', $item->idmutasi) }}"  id="delete-form-{{ $item->idmutasi }}">
                                            @csrf
                                            @method('delete')

                                            <button data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="btn btn-default delete-btn"  data-id="{{ $item->idmutasi }}">
                                                <i class="far fa-trash-alt text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Add a Note:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $data->note}}
                        </textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        @if ($item->status == 'Process')
                        <div>
                        <form action="{{ route('verify', $item->nobukti) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="status" value="Complete">

                            <button class="btn btn-success btn-rounded"><i class="fas fa-cart-plus f-s-12 me-1 align-middle"></i> Complete</button>
                        </form>
                    </div>
                    @elseif ($item->status == 'Complete')

                    <span class="fas fa-circle text-success mr-1"> Complete</span>
                        @else

                        <div>
                            <form action="{{ route('verify', $item->nobukti) }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="status" value="Reject">

                                <button class="btn btn-danger btn-rounded"><i class="fas fa-cart-plus f-s-12 me-1 align-middle"></i> Reject</button>
                            </form>
                            {{-- <a href="#"><i class="fas fa-arrow-left f-s-12 me-1 align-middle"></i> Continue Shopping</a> --}}
                        </div>
                        <div>
                            <form action="{{ route('verify', $item->nobukti) }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="status" value="Process">

                                <button class="btn btn-primary btn-rounded"><i class="fas fa-cart-plus f-s-12 me-1 align-middle"></i> Process</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <a href="{{ url('Penjualan/') }}" class="btn btn-primary mt-4" title="Edit">Kembali</a>
        </div>


        <div class="col-xl-4 grid-margin">
            <div class="card card-white mb-3">
                <div class="card-heading clearfix">
                    <h4 class="card-title">Order Summary</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td>Grand Total :</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Discount : </td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Shipping Charge :</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Estimated Tax : </td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <th>Total Belanja:</th>
                                    <th>Rp. {{ number_format($item->total, 0, ',', '.' )}}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card card-white">
                <div class="card-heading clearfix">
                    <h4 class="card-title">Bukti Pembayaran</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('storage/buktipem/' . $item->buktipem) }}" class="card-img-top" alt="...">
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

@include('ecommerce.layouts.shared.alert')

@endsection
