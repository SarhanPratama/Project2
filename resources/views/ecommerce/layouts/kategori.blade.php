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

                    @foreach ($kategori as $item)
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
                    {{ $kategori->links('pagination::simple-bootstrap-5') }}
                </div>
                <!-- end pagination -->

            </div>
        </section>

        @include('ecommerce.layouts.shared.alert')

@endsection


<!-- PRODUCT GRID
================================================== -->
{{-- <section class="md">
    <div class="container">
        <div class="row">

            <!-- right panel section -->
            <div class="col-lg-9 col-12 ps-lg-1-9 order-1 order-lg-2 mb-1-9 mb-lg-0">

                <div class="row g-0 align-items-center bg-light rounded p-3 mb-1-9">

                    <div class="col-12 col-md my-1 my-md-0 text-center text-md-start font-weight-600">Showing 1–9 of 27 results</div>

                    <div class="col-12 col-md-auto">

                        <div class="row justify-content-center">

                            <div class="col-auto my-1 my-md-0">
                                <label class="m-0">Show:</label>
                                <select class="w-auto d-inline-block form-select">
                                    <option value="#?limit=24" selected="selected">24</option>
                                    <option value="#?limit=25">25</option>
                                    <option value="#?limit=50">50</option>
                                    <option value="#?limit=75">75</option>
                                    <option value="#?limit=100">100</option>
                                </select>
                            </div>

                            <div class="col-auto my-1 my-md-0">
                                <label class="m-0">Sort By:</label>
                                <select class="w-auto d-inline-block form-select">
                                    <option value="#?sort=p.sort_order&amp;order=ASC">Default</option>
                                    <option value="#?sort=pd.name&amp;order=ASC">Name (A - Z)</option>
                                    <option value="#?sort=pd.name&amp;order=DESC">Name (Z - A)</option>
                                    <option value="#?sort=p.price&amp;order=ASC" selected="">Price (Low &gt; High)</option>
                                    <option value="#?sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
                                    <option value="#?sort=rating&amp;order=DESC">Rating (Highest)</option>
                                    <option value="#?sort=rating&amp;order=ASC">Rating (Lowest)</option>
                                    <option value="#?sort=p.model&amp;order=ASC">Model (A - Z)</option>
                                    <option value="#?sort=p.model&amp;order=DESC">Model (Z - A)</option>
                                </select>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="row justify-content-center">

                    @foreach ($kategori as $item)

                    <div class="col-11 col-sm-6 col-xl-4 mb-1-9">
                        <div class="product-grid">
                            <div class="product-img">
                                <a href="{{ urL('detail/'.$item->id) }}">
                                    <div class="label-offer bg-red">Sale</div>
                                    @if($item->foto)
                                    @php
                                        $fotos = json_decode($item->foto);
                                    @endphp

                                    @if(isset($fotos[0]))
                                        <img src="{{ asset('storage/foto/' . $fotos[0]) }}" alt="Foto" class="img-fluid">
                                    @else
                                        <p>Tidak ada foto tersedia.</p>
                                    @endif
                                @else
                                    <p>Tidak ada foto tersedia.</p>
                                @endif
                                </a>
                            </div>
                            <div class="product-description">
                                <h3><a href="{{ urL('detail/'.$item->id) }}">{{ $item->nama }}</a></h3>
                                <h4 class="price">
                                                {{-- <span class="regular-price line-through">$99.00</span> --}}
                                                {{-- <span class="offer-price">Rp. {{ number_format($item->hargajual, 0, ',', '.') }}</span>
                                            </h4>
                            </div>
                            <div class="product-buttons">
                                <ul class="ps-0">
                                    <li><a href="#" class="btn-link" title="Add To Wishlist"><i class="far fa-heart"></i></a></li>
                                    <li><a href="{{ url('proseskeranjang/'. $item->id) }}" class="butn-style2" title="Add to Cart">Add to Cart</a></li>
                                    <li><a href="#" class="btn-link" title="Add To Compare"><i class="fas fa-random"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- pagination -->
                <div class="pagination text-small text-uppercase text-extra-dark-gray mt-4">
                    <ul>
                        <li><a href="#"><i class="fas fa-long-arrow-alt-left me-1 d-none d-sm-inline-block"></i> Prev</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Next <i class="fas fa-long-arrow-alt-right ms-1 d-none d-sm-inline-block"></i></a></li>
                    </ul>
                </div>
                <!-- end pagination -->

            </div>
            <!-- end right panel section -->

        </div>
    </div>
</section> --}} --}}


