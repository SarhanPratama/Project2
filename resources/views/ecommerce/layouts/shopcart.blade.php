@extends('ecommerce.layouts.ecom')
@section('content')
    @include('ecommerce.layouts.shared.title')
    <section class="md">
        <div class="container">

            <!-- button set -->
            <div class="col-12 border-bottom py-1-9 py-lg-2-3 mb-3 mb-md-4 mb-lg-0">
             <a href="{{ url('shop')}}" class="butn-style2 small bg-color mb-2 mb-md-0"><span>Continue Shopping</span></a>
         </div>
         <!-- end button set -->
            <div class="row">


                <!-- product table -->
                <div class="col-12 shop-cart-table">
                    <table class="table shop-cart text-center">
                        <colgroup>
                            <col width="100">
                            <col>
                            <col width="1">
                            <col>
                            <col width="100">
                            <col width="1">
                        </colgroup>

                        <thead>

                            <tr>
                                <th class="first"></th>
                                <th class="text-start text-uppercase font-weight-500">Product</th>
                                <th class="text-start text-uppercase font-weight-500">Price</th>
                                <th class="text-center text-uppercase font-weight-500">Jumlah</th>
                                <th class="text-start text-uppercase font-weight-500 text-nowrap">Sub Total</th>
                                <th></th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($shopcart as $cart)
                                <tr>
                                    <td class="product-thumbnail text-start">
                                        <a href="{{ url('detail/' . $cart->id) }}">
                                            @if (!empty($cart->fotoArray) && is_array($cart->fotoArray) && isset($cart->fotoArray[0]))
                                                <img src="{{ asset('storage/foto/' . $cart->fotoArray[0]) }}"
                                                    alt="First Image" class="img-fluid">
                                            @else
                                                <p>No image available</p>
                                            @endif
                                        </a>

                                    </td>
                                    <td class="text-start">
                                        <a href="{{ url('detail/' . $cart->idstok) }}">{{ $cart->nama }}</a>
                                        <span class="text-lowercase d-block">Stock : {{ $cart->saldoawal }}</span>
                                        <a href="#" class="display-31"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                    <td class="text-start text-nowrap">
                                        Rp. <?= number_format($cart->hargajual, 0, ',', '.') ?>
                                    </td>

                                    <td class="product-quantity">
                                        <form action="{{ route('update.jumlah', $cart->id) }}" method="POST">
                                            @csrf
                                            <div class="input-group">
                                                <button type="button"
                                                    class="jumlah-left-minus btn btn-outline-black decrease btn-minus">&minus;</button>
                                                <input type="text" name="jumlah"
                                                    class="jumlah form-control text-center jumlah-amount" max="100"
                                                    value="{{ $cart->jumlah }}" min="1"
                                                    aria-describedby="button-addon1" style="width: 20px;" />
                                                <button type="button"
                                                    class="jumlah-right-plus btn btn-outline-black btn-plus">&plus;</button>
                                            </div>
                                        </form>
                                    </td>

                                    <td class="product-subtotal text-start text-nowrap">Rp.
                                        <?= number_format($cart->jumlah * $cart->hargajual, 0, ',', '.') ?>
                                    </td>
                                    <td class="product-remove text-center">
                                        <form method="POST" action="{{ url('deletecart', $cart->idstok) }}"  id="delete-form-{{ $cart->id }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger delete-btn"  data-id="{{ $cart->id }}"><i
                                                    class="fas fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- end product table -->
                <!-- end button set -->
                <div class="col-12 cart-total pt-1-9 pt-lg-2-3">
                    <div class="row">

                        <div class="col-lg-11 offset-lg-1 col-md-7 offset-md-0 float-end">
                            <table class="table cart-sub-total">
                                <tbody>
                                    {{-- <tr>
                                    <th class="text-end pe-0 text-uppercase">Cart Subtotal</th>
                                    <td class="text-uppercase text-end pe-0">$44.70</td>
                                </tr> --}}
                                    <tr>
                                        <th class="text-end pe-0 text-uppercase">Shipping and Handling</th>
                                        <td class="text-uppercase text-end pe-0">Free</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-0 p-0" colspan="2">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr class="total">
                                        <th class="text-uppercase text-end pe-0 p-0">Order Total</th>
                                        <td class="text-end pe-0 p-0">Rp.
                                            {{ number_format($total, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-0 p-0" colspan="2">
                                            <hr class="mb-0">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a class="butn-style2 float-end" href="{{ url('checkout') }}"><span>Proceed to
                                    Checkout</span></a>
                        </div>
                    </div>
                </div>
                <!-- total block set -->


            </div>

        </div>
    </section>
    @include('ecommerce.layouts.shared.alert')
@endsection
