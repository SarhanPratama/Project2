@extends('ecommerce.layouts.ecom')

@section('content')
            <!-- PAGE TITLE
        ================================================== -->
        @include('ecommerce.layouts.shared.title')

        <!-- PRODUCT FOUR COLUMN
        ================================================== -->
        <section class="md">
            <div class="container">

                <div class="row g-0 align-items-center bg-light rounded p-3 mb-1-9">

                            <div class="col-12 col-md-auto">

                                <div class="row justify-content-center">
                                    <div class="col-auto my-1 my-md-0">
                                        <label class="m-0" for="sort-by">Sort By:</label>

                                            <select name="sort_by" id="sort-by" onchange="window.location.href = '{{ route('products.index.sorted', ['sort_by' => '__sort_by__']) }}'.replace('__sort_by__', this.value);">
                                                <option value="default">Default</option>
                                                <option value="name-asc">Nama (A - Z)</option>
                                                <option value="name-desc">Nama (Z - A)</option>
                                                <option value="price-asc">Harga (Rendah > Tinggi)</option>
                                                <option value="price-desc">Harga (Tinggi > Rendah)</option>
                                                </select>

                                        </select>
                                    </div>

                                </div>

                            </div>

                        </div>

                <div class="row justify-content-center">

                    @foreach ($products as $item)
                    <div class="col-11 col-sm-6 col-lg-4 col-xl-3 mb-1-9">
                        <div class="product-grid">
                            <div class="product-img">
                                <a href="{{ url('detail/'. $item->id)}}">
                                    <div class="label-offer left-align bg-primary">New</div>
                                    @php
                                    $images = json_decode($item->foto, true); // Decode JSON ke array
                                @endphp
                                @if (!empty($images) && is_array($images))
                                    <img src="{{ asset('storage/foto/' . $images[0]) }}" alt="Image Product" >
                                @else
                                    <p>Tidak ada gambar</p>
                                @endif
                                    {{-- <img src="img/products/product-grid/product-03.jpg" alt="..."></a> --}}
                            </div>
                            <div class="product-description">
                                <h3><a href="{{ url('detail/' . $item->id)}}">{{ $item->nama}}</a></h3>
                                <h4 class="price">
                                    {{-- <span class="regular-price line-through"></span> --}}
                                    <span class="offer-price">Rp. {{ number_format($item->hargajual, 0, ',', '.')}}</span>
                                </h4>
                            </div>
                            <div class="product-buttons">
                                <ul class="ps-0">

                                    <li><a href="#" class="btn-link" title="Add To Wishlist" onclick="event.preventDefault(); document.getElementById('add-to-wishlist').submit();">
                                        <i class="far fa-heart"></i>
                                        </a>
                                    </li>

                                    <form id="add-to-wishlist" action="{{ url('wishlist/'. $item->id) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    <li><a href="{{ url('proseskeranjang/' . $item->id)}}" class="butn-style2" title="Add to Cart">Add to Cart</a></li>
                                    <li><a href="#" class="btn-link" title="Add To Compare"><i class="fas fa-random"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- pagination -->
                <div class="mt-4 d-flex justify-content-center">
                    {{ $products->links('pagination::simple-bootstrap-5') }}
                </div>
                <!-- end pagination -->

            </div>
        </section>

        @include('ecommerce.layouts.shared.alert')

@endsection
