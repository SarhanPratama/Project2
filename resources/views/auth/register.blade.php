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



                    <div class="col-lg-6">
                        <div class="common-block">
                            <div class="inner-title">
                                <h4 class="mb-0">Register</h4>
                            </div>

                            <form method="post" action="{{ url('proccessregister') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Your name here">
                                        @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" name="email" placeholder="Your email here">
                                        @if($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Your password here">
                                        @if($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Re-Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Your re-password here">
                                    </div>
                                </div>
                                <button type="submit" class="butn-style2 mt-4">Register</button>

                                <!-- Link ke halaman login -->
                                <p class="text-end">
                                    Already have an account?
                                    <a href="{{ url('login') }}" class="text-primary">Login here</a>
                                </p>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </section>

        
    </div>

    @endsection
