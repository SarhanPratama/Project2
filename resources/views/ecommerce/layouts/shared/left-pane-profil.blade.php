@php
    $user = auth()->user()->id;
    $user = DB::table('users')->where('id', $user)->first();

    $total_wishlist = DB::table('wishlist')
        ->where('id_user', Auth::id())
        ->count();

    $total_belanja = DB::table('tbjual')
        ->where('idpelanggan', Auth::id())
        ->count();
@endphp

<div class="col-lg-4 col-sm-9 mb-2-3 mb-lg-0">

    <div class="account-pannel">

        <div class="p-4">


            <div class="text-center">
                <div class="pb-3">
                    <img class="img-fluid rounded-circle img-thumbnail" src="{{ url('assets/img/avatar/t-3.jpg')}}" alt="...">
                </div>
                <h6 class="mb-0 display-28">{{ $user->name }}</h6>
                {{-- <small>Joined February 06, 2017</small> --}}
                <div class="reward-points">
                    <i class="ti-star text-primary pe-1"></i> Points: 7386
                </div>
            </div>

        </div>

        <div class="list-group">
            <a class="list-group-items {{ Request::is('order') ? 'active' : '' }}" href="{{ url('order') }}">
                <i class="ti-bag pe-2"></i>Orders<span class="badge badge-pill">{{ $total_belanja}}</span>
            </a>
            <a class="list-group-items {{ Route::is('profil.show') ? 'active' : '' }}" href="{{ url('profil/' . $user->id)}}">
                <i class="ti-user pe-2"></i>Profile
            </a>
            <a class="list-group-items {{ Request::is('address') ? 'active' : '' }}" href="{{ url('address') }}">
                <i class="ti-location-pin pe-2"></i>Addresses
            </a>
            <a class="list-group-items" {{ Request::is('wishlist') ? 'active' : '' }}" href="{{ url('wishlist') }}">
                <i class="ti-heart pe-2"></i>Wishlist
                <span class="badge badge-pill">{{ $total_wishlist}}</span>
            </a>
        </div>


    </div>

</div>
