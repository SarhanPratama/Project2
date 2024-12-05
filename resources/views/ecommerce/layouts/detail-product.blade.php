@extends('ecommerce.layouts.ecom')
@section('content')
        <!-- PAGE TITLE
        ================================================== -->
        @include('ecommerce.layouts.shared.title')

        <!-- PRODUCT DETAILS
        ================================================== -->
        <section class="md">
            <div class="container">

                <!-- product section -->
                <div class="row mb-6 mb-md-7 mb-lg-9">
                    <div class="col-lg-5 text-center text-lg-start mb-1-9 mb-lg-0">

                        <!-- product left start -->
                        <div class="xzoom-container">
                            @if (!empty($barang->fotoArray) && is_array($barang->fotoArray) && isset($barang->fotoArray[0]))
                            <img class="xzoom5 mb-1-9" id="xzoom-magnific" src="{{ asset('storage/foto/' . $barang->fotoArray[0]) }}"
                            xoriginal="{{ asset('storage/foto/' . $barang->fotoArray[0]) }}" alt="..."/>

                        @else
                            <p>No image available</p>
                        @endif
                            <div class="xzoom-thumbs no-margin">
                                @if (!empty($barang->fotoArray) && is_array($barang->fotoArray))
                                @foreach ($barang->fotoArray as $foto)
                                    <a href="{{ asset('storage/foto/' . $foto) }}">
                                        <a href="{{ asset('storage/foto/' . $foto) }}"><img class="xzoom-gallery5" width="80" src="{{ asset('storage/foto/' . $foto) }}" xpreview="{{ asset('storage/foto/' . $foto) }}" title="The description goes here"></a>
                                    </a>
                                @endforeach
                            @endif

                            </div>
                        </div>
                        <!-- product left end -->

                    </div>
                    <div class="col-lg-7 ps-lg-2-3">
                        <div class="product-detail">
                            <h2 class="mb-1">{{ $barang->nama }}<span class="label-sale bg-primary text-white text-uppercase display-31">New</span></h2>
                            <div class="bg-primary separator-line-horrizontal-full mb-4"></div>

                            <p class="rating-text"><span>Stock : {{ $barang->saldoakhir }}</span> <span class="font-500 theme-color">{{ $barang->satuan }}</span></p>
                            <p>Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.</p>

                            <div class="mb-4">

                                <div class="d-inline-block me-3 pe-3 borders-end border-color-extra-medium-gray">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>

                                {{-- <div class="d-inline-block">
                                    <a class="text-primary" href="#">Write a review</a>
                                </div> --}}

                            </div>
                            <div class="mb-4">
                                {{-- <span class="me-3 display-26 font-weight-600 offer-price">$21.00</span> --}}
                                <span class="display-26 font-weight-700 text-primary">Rp. {{ number_format($barang->hargajual, 0, ',', '.')}}</span>
                            </div>

                            {{-- <div class="row">

                                <div class="col-5 col-md-3">
                                    <div class="product-color">
                                        <label>Color:</label>
                                        <select class="mb-4 form-control medium form-select">
                                            <option value="Red">Red</option>
                                            <option value="Black">Black</option>
                                            <option value="Beige">Beige</option>
                                            <option value="White">White</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-4 col-lg-2">
                                    <form id="form1" action="{{ url('proseskeranjang/'.$barang->id) }}" method="get">
                                        @csrf
                                    <label>Qty:</label>
                                    <input type="number" min="1" value="1" name="jumlah"  placeholder="1" class="form-control medium mb-4">
                                    </form>
                                </div>

                            </div>

                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <button class="butn-style2 me-3 mb-2 mb-md-0" id="submitAllForms" ><span><i class="fas fa-shopping-cart me-1"></i> Add to Cart</span></button>
                                    <button class="butn-style2 dark" id="submitwishlist"><span><i class="fas fa-heart me-1"></i> Add to wishlist</span></button>
                                    <form id="wishlist" action="{{ url('wishlist/') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="id_stok" value="{{ $barang->id }}">
                                    </form>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-7">

                                    <label class="font-weight-600">Share on:</label>
                                    <ul class="social-icon-style1 ps-0">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end product section -->

                <!-- product description -->
                <div class="row justify-content-center mb-6 mb-md-7">

                    <div class="col-12">
                        <div class="horizontaltab tab-style-two">
                            <ul class="resp-tabs-list hor_1 text-start">
                                <li><i class="ti-line-dashed d-md-block d-none"></i>Description</li>
                                <li><i class="ti-more d-md-block d-none"></i>Additional Info</li>
                                <li><i class="ti-star d-md-block d-none"></i>Reviews (2)</li>
                            </ul>
                            <div class="resp-tabs-container hor_1">
                                <div>

                                    <p> {{ $barang->desc }}</p>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-1-9 mb-lg-0">

                                            <h3 class="display-29">Information:</h3>
                                            <ul class="primary-list mb-1-9">
                                                <li><strong>Weight:</strong> 15 grams</li>
                                                <li><strong>Dimensions:</strong> 8.03 x 1.27 x 2.54 Cm</li>
                                                <li><strong>Size:</strong> 64 GB</li>
                                                <li><strong>Color:</strong> White</li>
                                                <li><strong>Guarantee:</strong> 5 Years</li>
                                            </ul>

                                            <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto in ea voluptate velit.</p>

                                        </div>
                                        <div class="col-lg-6 ps-lg-1-9">

                                            <div class="table-responsive">
                                                <table class="table bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Shipping Options</th>
                                                            <th>Delivery Time</th>
                                                            <th>Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                Standard Shipping
                                                            </td>
                                                            <td>
                                                                Delivery in 5 - 7 working days
                                                            </td>
                                                            <td>
                                                                $8.00
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Express Shipping
                                                            </td>
                                                            <td>
                                                                28 August 2022
                                                            </td>
                                                            <td>
                                                                $12.00
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                1 - 2 day Shipping
                                                            </td>
                                                            <td>
                                                                27 August 2022
                                                            </td>
                                                            <td>
                                                                $12.00
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Free Shipping
                                                            </td>
                                                            <td>
                                                                25 August 2022
                                                            </td>
                                                            <td>
                                                                $0.00
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div>
                                    <div class="row">

                                        <div class="col-lg-6 order-lg-2 mb-1-9 mb-lg-0">
                                            <div class="common-block">

                                                <div class="mb-2-3 pb-2-3 border-bottom">

                                                    <div class="media mb-4 product-review">
                                                        <img class="me-3 rounded-circle w-60px" src="img/avatar/t-1.jpg" alt="...">
                                                        <div class="media-body">
                                                            <a href="#" class="mb-1 font-weight-600 text-extra-dark-gray">Jonal Doe</a>
                                                            <span class="d-block text-primary">Sep 15, 2018</span>
                                                        </div>

                                                        <span class="text-primary">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                        </span>

                                                    </div>

                                                    <p class="mb-0">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>

                                                </div>

                                                <div class="pb-4">

                                                    <div class="media mb-4 product-review">
                                                        <img class="me-3 rounded-circle w-60px" src="img/avatar/t-2.jpg" alt="...">
                                                        <div class="media-body">
                                                            <a href="#" class="mb-1 font-weight-600 text-extra-dark-gray">Marina Modra</a>
                                                            <span class="d-block text-primary">Sep 15, 2018</span>
                                                        </div>

                                                        <span class="text-primary">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                        </span>

                                                    </div>

                                                    <p class="mb-0">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>

                                                </div>

                                                <div class="text-start">
                                                    <a href="#" class="butn-style2 small">Load More Reviews</a>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-6 order-lg-1">

                                            <div class="common-block">

                                                <div class="inner-title">
                                                    <h4 class="mb-0">Leave Review</h4>
                                                    <p class="mb-0">Leave review takes it to the next level.</p>
                                                </div>

                                                <form>

                                                    <div class="row">

                                                        <div class="col-sm-6">

                                                            <div class="form-group">
                                                                <label>Your Name</label>
                                                                <input type="text" class="form-control" name="name" placeholder="Your name here">
                                                            </div>

                                                        </div>

                                                        <div class="col-sm-6">

                                                            <div class="form-group">
                                                                <label>Your Email</label>
                                                                <input type="email" class="form-control" name="email" placeholder="Your email here">
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-sm-12 mb-2">

                                                            <div class="form-group">
                                                                <label>Rating</label>
                                                                <select class="form-control form-select">
                                                                    <option>5 Stars</option>
                                                                    <option>4 Stars</option>
                                                                    <option>3 Stars</option>
                                                                    <option>2 Stars</option>
                                                                    <option>1 Star</option>
                                                                </select>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-12 mb-4">

                                                            <label>Comment</label>
                                                            <div class="form-group mb-1">
                                                                <textarea rows="2" class="form-control" placeholder="Tell us a few words"></textarea>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <button type="button" class="butn-style2">Submit Review</button>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end product description -->

                <!-- related product -->
                <div class="inner-title">
                    <h3 class="mb-0">Related Products</h3>
                </div>

                <div class="product-grid-slide owl-carousel owl-theme">
                    @foreach ($relatedProducts as $item)


                    <div class="product-grid">
                        <div class="product-img">
                            <a href="shop-product-detail.html">
                                <div class="label-offer bg-red">Sale</div>
                                @php
                                $images = json_decode($item->foto, true);
                            @endphp
                            @if (!empty($images) && is_array($images))

                            <img src="{{ asset('storage/foto/' . $images[0]) }}" alt="..." >
                            @else
                                <p>Tidak ada gambar</p>
                            @endif


                            </a>
                        </div>
                        <div class="product-description">
                            <h3><a href="shop-product-detail.html">{{ $item->nama}}</a></h3>
                            <h4 class="price">
                                <span class="offer-price">Rp. {{ number_format($item->hargajual, 0, ',', '.')}}</span>
                            </h4>
                        </div>
                        <div class="product-buttons">
                            <ul class="ps-0">
                                <li><a id="submitAllForms" class="btn-link" title="Add To Wishlist"><i class="far fa-heart"></i></a></li>
                                <li><a href="#" class="butn-style2" title="Add to Cart">Add to Cart</a></li>
                                <li><a href="#" class="btn-link" title="Add To Compare"><i class="fas fa-random"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- end related product -->

            </div>
        </section>



<script>
    document.getElementById('submitAllForms').addEventListener('click', function() {
        // Submit form pertama
        document.getElementById('form1').submit();


    });

    document.getElementById('submitwishlist').addEventListener('click', function() {
        // Submit form wishlist
        document.getElementById('wishlist').submit();


    });
</script>

@include('ecommerce.layouts.shared.alert')

    @endsection
