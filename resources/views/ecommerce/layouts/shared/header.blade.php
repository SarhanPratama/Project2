<?php

// $iduser = auth()->user()->id;

if (!auth()->check()) {
   $totalCart = 0;

} else {
 $idpelanggan = auth()->user()->id;
        $shopcart = DB::table('keranjang')
            ->leftJoin('tbstok', 'tbstok.id', '=', 'keranjang.idstok')
            ->leftJoin('tbsatuan', 'tbsatuan.id', '=', 'tbstok.idsatuan')
            ->select('keranjang.*', 'tbstok.*', 'tbsatuan.nama as namaSatuan')
            ->where('keranjang.idpelanggan', $idpelanggan)
            ->get();

            $totalCart = $shopcart->count();

            $total = 0;
            foreach ($shopcart as $stock) {
                $total += $stock ->harga;
                $stock->fotoArray = json_decode($stock->foto, true);
            }
            }
?>

<header class="header-light-nav">

    <div class="navbar-default">

        <!-- top search -->
        <div class="top-search bg-primary">
            <div class="container-fluid">
                <form class="search-form" action="#" method="GET">
                    <div class="input-group">
                        <span class="input-group-addon cursor-pointer">
                            <button class="search-form_submit fas fa-search display-27 text-white" type="submit"></button>
                        </span>
                        <input type="text" class="search-form_input form-control" name="s" autocomplete="off" placeholder="Type & hit enter...">
                        <span class="input-group-addon close-search"><i class="fas fa-times display-27 mt-2"></i></span>
                    </div>
                </form>
            </div>
        </div>
        <!-- end top search -->

        <div class="container">
            <div class="row align-items-center g-0">
                <div class="col-12 col-lg-12">
                    <div class="menu_area alt-font">
                        <nav class="navbar navbar-expand-md p-0">

                            <div class="navbar-header navbar-header-custom">
                                <!-- logo -->
                                <a href="{{ url('/')}}" class="navbar-brand logodefault"><img id="logo" src="{{ asset('assets/img/logos/logo2.png')}}" alt="logo"></a>
                                <!-- end logo -->
                            </div>

                            <!-- menu toggler -->
                            <div class="navbar-toggler"></div>
                            <!-- end menu toggler -->

                            <!-- menu area -->
                            <ul class="navbar-nav mx-auto" id="nav" style="display: none;">

                                <li>
                                    <a href="{{ url('/')}}">Home</a>
                                </li>

                                <li>
                                    <a href="{{ url('shop')}}">Shop</a>
                                    <ul>
                                        <li><a href="{{ url('shop/')}}">All Product</a></li>
                                        <li><a href="{{ url('cart')}}">Shop Cart</a></li>
                                        <li><a href="shop-checkout-address.html">Shop Checkout</a></li>
                                    </ul>
                                </li>

                                <li><a href="#">Pages</a>
                                    <ul>
                                        <li><a href="{{ url('about/')}}">About Us</a></li>
                                        <li><a href="{{ url('contacts/')}}">Contacts</a></li>
                                        <li><a href="{{ url('help-faq/')}}">Help / FAQ</a></li>
                                    </ul>
                                </li>


                            </ul>
                            <!-- end menu area -->

                            <!-- attribute navigation -->
                            <div class="attr-nav">
                                <ul>
                                    <li class="dropdown me-3 me-lg-0">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <i class="ti-bag"></i>
                                            <span class="badge bg-primary">{{ $totalCart }}</span>
                                        </a>
                                        <ul class="dropdown-menu cart-list mt-3">
                                            @auth
                                            @foreach ($shopcart as $item)

                                            <li>
                                                <a href="{{ url('detail/'. $item->id) }}" class="photo">
                                                @if (!empty($item->fotoArray) && is_array($item->fotoArray) && isset($item->fotoArray[0]))
                                                    {{-- <img src="{{ asset('storage/foto/' . $item->fotoArray[0]) }}" alt="First Image" class="img-fluid"> --}}
                                                    <img src="{{ asset('storage/foto/' . $item->fotoArray[0]) }}" class="cart-thumb" alt="..." /></a>
                                                @else
                                                    <p>No image available</p>
                                                @endif
                                                <p><a href="{{ url('detail/'. $item->id) }}">{{ $item->nama }}</a></p>
                                                <p class="text-dark">{{ $item->jumlah }}x - <span class="price">Rp. {{ number_format($item->jumlah * $item->hargajual, 0, ',', '.') }}</span></p>
                                            </li>

                                            @endforeach
                                            @else
                                            <li>
                                                <p class="text-dark">Silahkan Login Terlebih dahulu</p>
                                            </li>
                                            @endauth
                                            <li class="total bg-primary">
                                                <span class="float-start ">
                                                    @auth
                                                    <strong>Total :</strong><br>
                                                     Rp.
                                                     {{ number_format($total, 0, ',', '.') }}
                                                     @endauth
                                                </span>
                                                <a href="{{ url('cart') }}" class="butn-style2 small white float-end w-auto"><span>View Cart</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="search"><a href="#"><i class="ti-search"></i></a></li>


                                    <li class="nav-item dropdown">

                                        <a href="#" data-bs-toggle="dropdown" class="dropdown-toggle"><i class="far fa-user"></i></a>
                                        <ul class="dropdown-menu p-3 mt-3">
                                            <li class="mb-2">
                                                @if (auth()->check())
                                                <div class="media align-items-center">

                                                    <img class="w-40px rounded-circle me-3" src="{{ url('assets/img/avatar/01.png')}}" alt="...">

                                                    <div class="media-body text-nowrap">{{ auth()->user()->name }}</div>


                                                </div>
                                            </li>
                                            <li>
                                                <a href="{{ url('profil/' . $idpelanggan)}}" class="dropdown-item">My Profile</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('order')}}" class="dropdown-item">Order List</a>
                                            </li>
                                            <li>

                                                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()";>Log Out</a>
                                                @else
                                                <li class="d-flex">
                                                    <div>

                                                        <a href="{{ url('login/')}}" class="dropdown-item font-weight-500">Login</a>
                                                    </div>
                                                    <div>|</div>
                                                    <div>
                                                        <a href="{{ url('register/')}}" class="dropdown-item font-weight-500">Register</a>
                                                    </div>
                                                </li>
                                                @endif
                                            </li>
                                        </ul>


                                    </li>

                                </ul>
                            </div>
                            <!-- end attribute navigation -->
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>

</header>
