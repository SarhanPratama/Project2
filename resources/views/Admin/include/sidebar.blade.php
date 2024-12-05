
<div class="page-sidebar">
    <a class="logo-box" href="{{ url('/dashboard')}}" >
        <img src="{{ asset('assets/img/logos/logo2.png') }}" alt="..." style="width: 100%">
        {{-- <i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i> --}}
        <i class="icon-close" id="sidebar-toggle-button-close"></i>
    </a>
    <div class="page-sidebar-inner">
        <div class="page-sidebar-menu">
            <ul class="accordion-menu">
                <li>
                    <a href="{{ url('dashboard')}}"> <i class="menu-icon icon-home4"></i><span>Dashboard</span> </a>
                </li>
                <li>
                    <a href="#">
                        <i class="menu-icon icon-inbox"></i><span>Category</span><i class="accordion-icon fa fa-angle-left"></i>
                    </a>
                    <ul>
                        <li><a href="{{ url('kategori') }}">Category</a></li>
                        <li><a href="{{ url('kategori/create') }}">Add Categories</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="menu-icon icon-layers"></i><span>Products</span><i class="accordion-icon fa fa-angle-left"></i>
                    </a>
                    <ul>
                        <li><a href="{{ url('Stock')}}">Products</a></li>
                        <li><a href="{{url('/Stock/create')}}">Add Products</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ url('customer')}}"> <i class="menu-icon icon-code"></i><span>Customers</span> </a>
                </li>

                <li>
                    <a href="#">
                        <i class="menu-icon icon-flash_on"></i><span>Daftar Transaksi</span><i class="accordion-icon fa fa-angle-left"></i>
                    </a>
                    <ul>
                        <li><a href="{{ url('Penjualan') }}">Data Penjualan</a></li>
                        <li><a href="{{ url('Pembelian') }}">Data Pembelian</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="menu-icon icon-settings"></i><span>Settings</span><i class="accordion-icon fa fa-angle-left"></i>
                    </a>
                    <ul>
                        <li><a href="{{ url('staff')}}">Staff Members</a></li>
                        <li><a href="{{ url('staff/create')}}">Add Staff Members</a></li>
                        {{-- <li><a href="site-settings.html">Site Settings</a></li> --}}
                    </ul>
                </li>
                <li class="menu-divider"></li>
                <li>
                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()";>
                        <i class="menu-icon icon-public"></i><span>Logout</span>
                    </a>
                </li>



            </ul>
        </div>
    </div>
</div>
