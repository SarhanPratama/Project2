
@extends('ecommerce.layouts.ecom')
@section ('content')

<section class="page-title-section bg-img cover-background" data-background="img/bg/page-title.jpg">
    <div class="container">

        <div class="title-info">
            <h1>Shop Checkout</h1></div>
        <div class="breadcrumbs-info">
            <ul class="ps-0">
                <li><a href="home-shop-1.html">Home</a></li>
                <li><a href="#">Shop Checkout</a></li>
            </ul>
        </div>

    </div>
</section>

<!-- CHECKOUT
================================================== -->
<section class="md">
    <div class="container">
        <div class="row">


            <!-- left pannel section -->
            <div class="col-lg-9 col-12 pe-lg-2-3 mb-1-9 mb-lg-0">

                <div class="common-block">

                    <div class="inner-title">
                        <h4 class="mb-0">Billing Address</h4>
                    </div>

                    <form id="form" action="{{ url('prosescheckout') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-sm-12">

                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" name="firstname" value="{{ Auth::user()->name}}"  placeholder="Your name here" disabled>
                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label>Kota </label>
                                    <input type="text" class="form-control" name="city" placeholder="Your city name here">
                                </div>

                            </div>

                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label>No Hp</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Your phone number here">
                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label>Alamat </label>
                                    <input type="text" class="form-control" name="address" placeholder="Your address here">
                                </div>

                            </div>

                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="text" class="form-control" name="zipcode" placeholder="Your zip code here">
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="payment_method">Metode Pembayaran</label>
                                <select class="form-control" name="payment_method" id="payment_method" onchange="showPaymentDetails(this.value)">
                                    <option value="">Pilih Metode Pembayaran</option>
                                    <option value="bri">BRI</option>
                                    <option value="bni">BNI</option>
                                    <option value="mandiri">Mandiri</option>
                                    <option value="gopay">GoPay</option>
                                </select>
                            </div>

                            <div id="payment_details" style="display: none; margin-top: 10px;">
                                <div id="bri_details" style="display: none;">
                                    <p><strong>BRI:</strong> 1234-5678-9012 (a.n Nama Pemilik)</p>
                                </div>
                                <div id="bni_details" style="display: none;">
                                    <p><strong>BNI:</strong> 2345-6789-0123 (a.n Nama Pemilik)</p>
                                </div>
                                <div id="mandiri_details" style="display: none;">
                                    <p><strong>Mandiri:</strong> 3456-7890-1234 (a.n Nama Pemilik)</p>
                                </div>
                                <div id="gopay_details" style="display: none;">
                                    <p><strong>GoPay:</strong> 0812-3456-7890 (Scan QR di aplikasi GoPay)</p>
                                </div>
                            </div>

                            <div>
                                <label for="">Bukti Pembayaran</label>
                                <input class="form-control form-control-lg" id="formFileLg" type="file" name="buktipem" multiple>
                            </div>

                            <div class="mt-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Add a Note (optional):</label>
                                <textarea class="form-control" name="note"  id="exampleFormControlTextarea1" placeholder="Write some note..." rows="3"></textarea>
                            </div>
                        </div>


                        <div class="buttons-set">
                            <a href="{{ url('cart')}}" class="butn-style2 wide"><i class="fas fa-arrow-left me-1"></i> Back</a>
                            <button id="submitall" class="butn-style2 wide">Continue <i class="fas fa-arrow-right ms-1"></i></button>
                        </div>

                    </form>

                </div>

            </div>
            <!-- end left pannel section -->

            <!-- right pannel section -->
            <div class="col-lg-3 col-12 side-bar">

                <div class="widget">

                    <div class="widget-title">
                        <h5>Order Summary</h5>
                    </div>

                    <table class="table classic">
                        <tbody>
                            <tr>
                                <th>Cart Subtotal:</th>
                                <td class="text-gray-dark">Rp. {{ number_format($total, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Pengiriman:</th>
                                <td class="text-gray-dark">-</td>
                            </tr>
                            {{-- <tr>
                                <th>:</th>
                                <td class="text-gray-dark">$9.72</td>
                            </tr> --}}
                            <tr>
                                <th>Total:</th>
                                <td class="text-lg text-gray-dark">Rp. {{ number_format($total, 0, ',', '.')  }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- end right pannel section -->
        </div>
    </div>
</section>

<script>

function showPaymentDetails(method) {
        document.getElementById('payment_details').style.display = 'none';
        document.getElementById('bri_details').style.display = 'none';
        document.getElementById('bni_details').style.display = 'none';
        document.getElementById('mandiri_details').style.display = 'none';
        document.getElementById('gopay_details').style.display = 'none';

        if (method) {
            document.getElementById('payment_details').style.display = 'block';
            document.getElementById(`${method}_details`).style.display = 'block';
        }
    }

    document.getElementById('submitall').addEventListener('click', function() {
    document.getElementById('form').submit();
    });

</script>
@include('ecommerce.layouts.shared.alert')
@endsection
