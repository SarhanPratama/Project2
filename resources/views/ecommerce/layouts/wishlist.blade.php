@extends('ecommerce.layouts.ecom')
@section('content')
            <!-- PAGE TITLE
        ================================================== -->
        @include('ecommerce.layouts.shared.title')

        <!-- ACCOUNT WISHLIST
        ================================================== -->
        <section class="md">
            <div class="container">
                <div class="row justify-content-center">

                    <!-- left panel -->
                    @include('ecommerce.layouts.shared.left-pane-profil')
                    <!-- end left panel -->

                    <!-- right panel -->
                    <div class="col-lg-8">

                        <div class="common-block">

                            <div class="inner-title">
                                <h4 class="mb-0">My Wishlist</h4>
                            </div>

                            <div class="table-responsive">
                                <table class="table v-align-middle">
                                    <thead>
                                        <tr>
                                            <th>Delete</th>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Stock Status</th>
                                            <th>Add To Cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wishlists as $item)


                                        <tr>
                                            <td>
                                                    <form action="{{ url('wishlist/' . $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a type="submit" style="cursor: pointer;" id="delete"><i class="fas fa-trash"></i></a>
                                                    </form>
                                            </td>
                                            <td>
                                                <a href="{{ url('detail/' . $item->id)}}">
                                                @php
                                                $images = json_decode($item->foto, true); // Decode JSON ke array
                                            @endphp
                                            @if (!empty($images) && is_array($images))
                                                <img src="{{ asset('storage/foto/' . $images[0]) }}" alt="First Image" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; display: block; margin: 0 auto;">
                                            @else
                                                <p>Tidak ada gambar</p>
                                            @endif
                                            </a>
                                            </td>
                                            <td><a href="{{ url('detail/' . $item->id)}}">{{ $item->nama}}</a></td>
                                            <td class="product-price">Rp. {{ number_format($item->hargajual, 0, ',', '.')}}</td>
                                            <td class="product-quantity">In Stock</td>
                                            <td><a href="{{ url('proseskeranjang/' . $item->id )}}" class="butn-style2 small">Add To Cart</a></td>
                                        </tr>
                                        @endforeach
                                        {{-- <tr>
                                            <td><a href="#"><i class="fas fa-trash"></i></a></td>
                                            <td>
                                                <a href="#"><img src="img/products/top-rated/2.jpg" alt="..." /></a>
                                            </td>
                                            <td><a href="#">Desktop Monitor Stand</a></td>
                                            <td class="product-price">$49.00</td>
                                            <td class="product-quantity">In Stock</td>
                                            <td><a href="#" class="butn-style2 small">Add To Cart</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#"><i class="fas fa-trash"></i></a></td>
                                            <td>
                                                <a href="#"><img src="img/products/top-rated/3.jpg" alt="..." /></a>
                                            </td>
                                            <td><a href="#">Virtual Reality Headset</a></td>
                                            <td class="product-price">$199.00</td>
                                            <td class="product-quantity">In Stock</td>
                                            <td><a href="#" class="butn-style2 small">Add To Cart</a></td>
                                        </tr> --}}

                                    </tbody>
                                </table>
                            </div>

                            <form action="{{ route('wishlist.clear') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="butn-style2 mt-3">
                                    <span>Clear Wishlist</span>
                                </button>
                            </form>
                        </div>

                    </div>
                    <!-- end right panel -->
                </div>
            </div>
        </section>

        <script>
                document.getElementById('delete').addEventListener('click', function() {
        document.getElementById('wishlist-delete').submit();


    });
        </script>

@endsection
