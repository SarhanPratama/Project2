@extends('ecommerce.layouts.ecom')
@section('content')
            <!-- PAGE TITLE
        ================================================== -->
        @include('ecommerce.layouts.shared.title')

        <!-- CHECKOUT COMPLETE
        ================================================== -->
        <section class="md">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <div class="common-block text-center">

                            <div class="inner-title">
                                <h3 class="mb-0">Thank you for your order!</h3>
                            </div>

                            <p class="lead mb-4">
                                Thank you for your payment. An automated payment receipt will be sent to your registered email.
                            </p>

                            <a href="order-tracking.html" class="butn-style2 wide m-1">Track your order</a>
                            <a href="{{ url('/')}}" class="butn-style2 wide m-1">Back to home</a>

                        </div>

                    </div>
                </div>
            </div>
        </section>
        @include('ecommerce.layouts.shared.alert')
@endsection
