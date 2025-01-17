@extends('ecommerce.layouts.ecom')
@section('content')

@php
      $kategori = DB::table('tbkategori')->get();
      $product = DB::table('tbstok')->get();
@endphp


<section class="full-screen p-0 top-position">
    <div class="slider-fade2 owl-carousel owl-theme w-100">
        <div class="item bg-img h-100 w-100 cover-background" data-overlay-dark="0" data-background="{{ url('assets/img/slider/slide-10.jpg')}}">
            <div class="container h-100 d-table">
                <div class="row d-table-cell align-middle h-100">
                    <div class="col-lg-5">
                        <h3 class="alt-font mb-2 h6 text-uppercase">New Arrivals</h3>
                        <h1 class="display-16 display-sm-8 display-md-5 display-lg-3 mb-1-6 mb-lg-2-9">Decor Inspiration</h1>
                        <a href="shop-product-grid.html" class="butn-style4">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="item bg-img h-100 w-100 cover-background" data-overlay-dark="0" data-background="{{ url('assets/img/slider/slide-11.jpg')}}">
            <div class="container h-100 d-table">
                <div class="row d-table-cell align-middle h-100">
                    <div class="col-lg-5">
                        <h3 class="alt-font mb-2 h6 text-uppercase">Offer</h3>
                        <h1 class="display-16 display-sm-8 display-md-5 display-lg-3 mb-1-6 mb-lg-2-9">Sofa Up to 50% OFF</h1>
                        <a href="shop-product-grid.html" class="butn-style4">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="item bg-img h-100 w-100 cover-background" data-overlay-dark="0" data-background="{{ url('assets/img/slider/slide-13.jpg')}}">
            <div class="container h-100 d-table">
                <div class="row d-table-cell align-middle h-100">
                    <div class="col-lg-5">
                        <h3 class="alt-font mb-2 h6 text-uppercase">Collection</h3>
                        <h1 class="display-16 display-sm-8 display-md-5 display-lg-3 mb-1-6 mb-lg-2-9">Special Collection</h1>
                        <a href="shop-product-grid.html" class="butn-style4">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- CATEGORY
================================================== -->
<section>
    <div class="container text-center">
        <h2 class="mb-4">Category</h2>
        <div class="row mt-n1-9 d-flex justify-content-center">
            @foreach ($kategori as $item)

            <div class="col-sm-6 col-md-4 col-lg-2 mt-1-9">
                <a href="{{ url('/ecom/kategori/' . $item->id)}}" class="categoty-style2">
                    <div class="category-icon mb-4 ">
                        @if($item->foto)
                            @php
                                $fotos = json_decode($item->foto);
                            @endphp

                            @foreach($fotos as $foto)
                                <img src="{{ asset('storage/kategori/' . $foto) }}" alt="Foto" class="img-fluid" width="50px">
                            @endforeach
                        @else
                            <p>Tidak ada foto tersedia.</p>
                        @endif

                    </div>
                    <h3 class="font-weight-500 mb-0">{{ $item->nama}}</h3>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS
================================================== -->
<section>
    <div class="container">
        <div class="text-center mb-1-9 mb-lg-2-3">
            <h2 class="mb-0">Featured Products</h2>
        </div>
        <div class="row mt-n1-9">
            @foreach ($product as $item)

            <div class="col-sm-6 col-lg-3 mt-1-9">
                <div class="product-grid-four">
                    <div class="product-img">
                        <a href="{{ url('detail/'. $item->id)}}">
                            @php
                            $images = json_decode($item->foto, true);
                        @endphp
                        @if (!empty($images) && is_array($images))

                        <img src="{{ asset('storage/foto/' . $images[0]) }}" alt="..." >
                        @else
                            <p>Tidak ada gambar</p>
                        @endif

                        </a>
                        <div class="action-butn">
                            <a href="{{ url('proseskeranjang/' . $item->id)}}"><i class="ti-shopping-cart"></i></a>
                            <a href="{{ url('detail/' . $item->id)}}"><i class="ti-eye"></i></a>

                            <a id="submitwishlist1" style="cursor: pointer;"><i class="ti-heart"></i></a>
                            <form id="wishlist" action="{{ url('wishlist/') }}" method="POST">
                                @csrf

                                <input  type="hidden" name="id_stok" value="{{ $item->id }}">
                            </form>

                        </div>
                    </div>
                    <h3 class="h6"><a href="{{ url('detail/' . $item->id)}}">{{ $item->nama}}</a></h3>
                    <span class="font-weight-600 display-29 text-muted">Rp. {{ number_format($item->hargajual, 0, ',', '.')}}</span>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<script>
    document.getElementById('submitwishlist1').addEventListener('click', function() {
    // Submit form wishlist
    document.getElementById('wishlist').submit();


});
</script>

@include('ecommerce.layouts.shared.alert')

<!-- OFFER BANNER
================================================== -->
{{-- <section class="pt-0">
    <div class="container-fluid px-lg-1-9 px-xl-6 px-xxl-13">
        <div class="row mt-n4">
            <div class="col-md-6 mt-4">
                <div class="offer-style02">
                    <img src="{{ url('assets/img/bg/bg-5.jpg')}}" alt="...">
                    <div class="text-center position-absolute top-10 start-0 end-0">
                        <span class="text-uppercase font-weight-500 text-white letter-spacing-2 d-block mb-2 mb-sm-3">new arrivals</span>
                        <h2 class="h1 mb-2 text-white">Featured Deals</h2>
                        <p class="text-white font-weight-600 display-29 d-none d-sm-block">Save on what's hot right now.</p>
                        <a href="shop-product-grid.html" class="butn-style4 sm">Shop Now<span></span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="offer-style02">
                    <img src="img/bg/bg-6.jpg" alt="...">
                    <div class="text-center position-absolute top-10 start-0 end-0">
                        <span class="text-uppercase font-weight-600 text-white letter-spacing-2 d-block mb-2 mb-sm-3">up to 50% off</span>
                        <h2 class="h1 mb-2 text-white">Summer Sale</h2>
                        <p class="text-white font-weight-600 display-29 d-none d-sm-block">Save on what's hot right now.</p>
                        <a href="shop-product-grid.html" class="butn-style4 sm">Shop Now<span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- SERVICES
================================================== -->
{{-- <section class="p-0">
    <div class="container">
        <div class="row mt-n4">
            <div class="col-sm-6 col-lg-3 mt-4">
                <div class="text-center">
                    <img src="{{ url('assets/img/icons/icon-10.png')}}" class="mb-3" alt="...">
                    <h3 class="h5">Free Shipping</h3>
                    <p class="mb-0">Free shipping over $100</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mt-4">
                <div class="text-center">
                    <img src="img/icons/icon-11.png" class="mb-3" alt="...">
                    <h3 class="h5">Money Return</h3>
                    <p class="mb-0">Guarantee under 7 days</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mt-4">
                <div class="text-center">
                    <img src="img/icons/icon-12.png" class="mb-3" alt="...">
                    <h3 class="h5">Gift Voucher</h3>
                    <p class="mb-0">Get $15 off your order</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mt-4">
                <div class="text-center">
                    <img src="img/icons/icon-13.png" class="mb-3" alt="...">
                    <h3 class="h5">Support 24 / 7</h3>
                    <p class="mb-0">Support online 24 hours a day</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LOOKBOOk
================================================== -->
<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-1-9 mb-lg-0">
                <div class="pe-xl-1-9 position-relative">
                    <img src="img/content/01.jpg" alt="...">
                    <div class="lookbook d-none d-sm-block">
                        <span class="lookbook-icon"><i class="fa-solid fa-plus"></i></span>
                        <div class="lookbook-content">
                            <div class="d-flex">
                                <img src="img/content/lookbook-01.jpg" alt="...">
                                <div class="ms-3">
                                    <h3 class="h6 mb-0"><a href="shop-product-detail.html">Light Lamp</a></h3>
                                    <p class="mb-0">$100.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lookbook second">
                        <span class="lookbook-icon"><i class="fa-solid fa-plus"></i></span>
                        <div class="lookbook-content">
                            <div class="d-flex">
                                <img src="img/content/lookbook-02.jpg" alt="...">
                                <div class="ms-3">
                                    <h3 class="h6 mb-0"><a href="shop-product-detail.html">Dining Chair</a></h3>
                                    <p class="mb-0">$200.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="ps-xl-6">
                    <h2 class="h1 w-xl-80 mb-1-6 mb-lg-1-9">Discover the furniture design of your dreams</h2>
                    <p class="mb-1-6 mb-lg-1-9">From curvaceous armchairs finished in sumptuous soft velvet, to statement art deco inspired console tables, bar trolleys and stylish side tables</p>
                    <a href="shop-product-detail.html" class="text-uppercase small border-bottom border-color-black text-dark">shop the look</a>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- INSTAGRAM IMAGES
================================================== -->
{{-- <section class="p-0">
    <div class="container-fluid px-0">
        <div class="row g-0 portfolio-gallery">
            <div class="col-sm-4 col-lg" data-src="{{ url('assets/img/gallery/06.jpg')}}" data-sub-html="<h4 class='text-white'>#01</h4>">
                <div class="instagram-block rounded-0">
                    <img src="{{ url('assets/img/gallery/06.jpg')}}" alt="...">
                </div>
            </div>
            <div class="col-sm-4 col-lg" data-src="img/gallery/07.jpg" data-sub-html="<h4 class='text-white'>#02</h4>">
                <div class="instagram-block rounded-0">
                    <img src="img/gallery/07.jpg" alt="...">
                </div>
            </div>
            <div class="col-sm-4 col-lg" data-src="img/gallery/08.jpg" data-sub-html="<h4 class='text-white'>#03</h4>">
                <div class="instagram-block rounded-0">
                    <img src="img/gallery/08.jpg" alt="...">
                </div>
            </div>
            <div class="col-sm-6 col-lg" data-src="img/gallery/09.jpg" data-sub-html="<h4 class='text-white'>#04</h4>">
                <div class="instagram-block rounded-0">
                    <img src="img/gallery/09.jpg" alt="...">
                </div>
            </div>
            <div class="col-sm-6 col-lg" data-src="img/gallery/10.jpg" data-sub-html="<h4 class='text-white'>#05</h4>">
                <div class="instagram-block rounded-0">
                    <img src="img/gallery/10.jpg" alt="...">
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection
