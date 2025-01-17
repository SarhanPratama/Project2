@extends('ecommerce.layouts.ecom')
@section('content')
            <!-- PAGE TITLE
        ================================================== -->
        @include('ecommerce.layouts.shared.title')

        <!-- PASSWORD RECOVERY
        ================================================== -->
        <section class="md">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-6">

                        <div class="common-block">

                            <div class="inner-title">
                                <h4 class="mb-0">Forgot your password?</h4>
                                {{-- <p class="mb-0">Forgot your password empowers you.</p> --}}
                            </div>

                            <form method="post" action="{{ route('password.email') }}">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-12 mb-2">

                                        <div class="form-group">
                                            <label>Enter Your Email Address</label>
                                            <input type="email" class="form-control" name="email" @error('email') is-invalid @enderror placeholder="Enter your email address">
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="login-register.html" class="m-link-muted">Back to Login</a>
                                    </div>

                                </div>
                                <button type="submit" class="butn-style2 mt-4">Reset my password</button>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </section>
@endsection
