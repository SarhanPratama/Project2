@extends('ecommerce.layouts.ecom')

@section('content')


        <!-- PAGE TITLE
        ================================================== -->
            @include('ecommerce.layouts.shared.title')

        <!-- LOGIN REGISTER
        ================================================== -->
        <section class="md">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 mb-1-9 mb-lg-0">

                        <div class="common-block">

                            <div class="inner-title">
                                <h4 class="mb-0">Login</h4>

                            </div>

                            <form method="post" action="{{ url('prosesLogin')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your user name here">
                                            @error('email')
                                            <span>
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>

                                    </div>

                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <label>Password </label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Your password here">
                                            @error('password')
                                            <span>
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-12 text-end">
                                        <a href="{{ url('forgot-password-view/')}}" class="m-link-muted">Forgot password?</a>
                                    </div>

                                </div>

                                <button type="submit" class="butn-style2 mt-4">Login</button>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- SCROLL TO TOP
    ================================================== -->
    <a href="#" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>



    @endsection
