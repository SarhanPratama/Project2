@extends('ecommerce.layouts.ecom')

@section('content')


        <!-- PAGE TITLE
        ================================================== -->
        @include('ecommerce.layouts.shared.title')

        <!-- ABOUT
        ================================================== -->
        <section class="md">
            <div class="container">

                <!-- who we are -->
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-10 text-center">

                        <div class="text-center mb-1-9">
                            <h2 class="mb-0">Who We Are</h2>
                        </div>

                        <p class="lead mb-1-9 w-md-80 w-95 mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor.</p>
                        <img src="{{ url('assets/img/content/about-store.jpg')}}" alt="..." class="img-style"></div>
                </div>
                <!-- end who we are -->

                <!-- service -->
                <div class="row text-center">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="border px-1-6 py-1-9 p-lg-1-9 h-100">
                            <i class="ti-headphone-alt display-18"></i>
                            <h3 class="h5 my-3 letter-spacing-1">24/7 Free Support</h3>
                            <p class="w-lg-80 mx-auto mb-0">Please feel free to contact us and we provide best service.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="border px-1-6 py-1-9 p-lg-1-9 h-100">
                            <i class="ti-money display-18"></i>
                            <h3 class="h5 my-3 letter-spacing-1">Money Back Return</h3>
                            <p class="w-lg-80 mx-auto mb-0">If you are not satisfied with product then we provide refunds.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border px-1-6 py-1-9 p-lg-1-9 h-100">
                            <i class="ti-truck display-18"></i>
                            <h3 class="h5 my-3 letter-spacing-1">Free Worldwide Shipping</h3>
                            <p class="w-lg-80 mx-auto mb-0">We're very pleased to be able to worldwide shipping.</p>
                        </div>
                    </div>
                </div>
                <!-- end service -->

            </div>
        </section>

        <!-- COUNTER
        ================================================== -->
        <section class="bg-light md">

            <div class="container">

                <div class="row">
                    <div class="col-lg-4 col-sm-4 counter-style-one mb-1-9 mb-sm-0">
                        <div class="text-center">
                            <div class="icon mb-2 mb-md-0"><span class="ti-thumb-up"></span></div>
                            <div class="title">
                                <h4 class="countup mb-0 font-weight-600 display-15">86</h4>
                                <span>Best Brands</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 counter-style-one mb-1-9 mb-sm-0">
                        <div class="text-center">
                            <div class="icon mb-2 mb-md-0"><span class="ti-flag-alt"></span></div>
                            <div class="title">
                                <h4 class="countup mb-0 font-weight-600 display-15">36</h4>
                                <span>Total Categories</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 counter-style-one">
                        <div class="text-center">
                            <div class="icon mb-2 mb-md-0"><span class="ti-medall"></span></div>
                            <div class="title">
                                <h4 class="countup mb-0 font-weight-600 display-15">99</h4>
                                <span>Quality Products</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- VISION AND MISSION
        ================================================== -->
        <section>

            <div class="container">

                <div class="row align-items-center mb-6 mb-lg-8">
                    <div class="col-md-6 col-lg-5 mb-19 mb-md-0">
                        <img src="{{ url('assets/img/content/our-vision.jpg')}}" alt="..." class="img-style">
                    </div>
                    <div class="col-md-6 col-lg-6 offset-lg-1">

                        <h3 class="display-24">Our Vision</h3>
                        <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor.</p>

                    </div>
                </div>
                <!-- end aboutus -->

                <!-- aboutus -->
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-6 order-2 order-md-1">

                        <h3 class="display-24">Our Mission</h3>
                        <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor.</p>

                    </div>
                    <div class="col-md-6 col-lg-5 offset-lg-1 mb-1-9 mb-md-0 order-1 order-md-2">
                        <img src="{{ url('assets/img/content/our-mission.jpg')}}" alt="..." class="img-style">
                    </div>
                </div>
                <!-- end aboutus -->

            </div>

        </section>

        <!-- TESTIMONIAL
        ================================================== -->
        <section class="bg-light md" data-scroll-index="4">
            <div class="container">

                <div class="text-center mb-1-9 mb-lg-2-3">
                    <h2 class="mb-0">Feedback</h2>
                </div>

                <div class="owl-carousel owl-theme" id="testmonials-carousel">
                    <div class="text-center">
                        <div class="item-icon-quote mb-4">
                            <span class="display-22 opacity2"><i class="fas fa-quote-right"></i></span>
                        </div>
                        <p class="mb-1-9 mb-lg-6 display-29 w-xl-50 w-lg-60 w-md-75 w-sm-90 mx-auto lh-lg">Exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <div class="media align-items-center d-inline-flex">
                            <img src="{{url('assets/img/avatar/t-4.jpg')}}" alt="..." class="rounded-circle border">
                            <div class="media-body text-start ms-4">
                                <h4 class="display-29 letter-spacing-1 mb-0">Alivin Corondo</h4>
                                <h6 class="m-0 display-32 text-uppercase letter-spacing-2 d-inline-block">Networking Lead</h6>
                            </div>
                        </div>

                    </div>
                    <div class="text-center">
                        <div class="item-icon-quote mb-4">
                            <span class="display-22 opacity2"><i class="fas fa-quote-right"></i></span>
                        </div>
                        <p class="mb-1-9 mb-lg-6 display-29 w-xl-50 w-lg-60 w-md-75 w-sm-90 mx-auto lh-lg">Developer ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur voluptate.</p>
                        <div class="media align-items-center d-inline-flex">
                            <img src="{{url('assets/img/avatar/t-5.jpg')}}" alt="..." class="rounded-circle border">
                            <div class="media-body text-start ms-4">
                                <h4 class="display-29 letter-spacing-1 mb-0">Finley Walkeror</h4>
                                <h6 class="m-0 display-32 text-uppercase letter-spacing-2 d-inline-block">App Developer</h6>
                            </div>
                        </div>

                    </div>
                    <div class="text-center">
                        <div class="item-icon-quote mb-4">
                            <span class="display-22 opacity2"><i class="fas fa-quote-right"></i></span>
                        </div>
                        <p class="mb-1-9 mb-lg-6 display-29 w-xl-50 w-lg-60 w-md-75 w-sm-90 mx-auto lh-lg">Designer ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur commodo consequat.</p>
                        <div class="media align-items-center d-inline-flex">
                            <img src="{{url('assets/img/avatar/t-6.jpg')}}" alt="..." class="rounded-circle border">
                            <div class="media-body text-start ms-4">
                                <h4 class="display-29 letter-spacing-1 mb-0">Niamah Hower</h4>
                                <h6 class="m-0 display-32 text-uppercase letter-spacing-2 d-inline-block">Sales Designer</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- TEAM
        ================================================== -->
        <section class="md">
            <div class="container">

                <div class="text-center mb-1-9 mb-lg-2-3">
                    <h2 class="mb-0">Our Team</h2>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6 text-center mb-1-9 mb-lg-0">
                        <img src="{{ url('assets/img/team/1.jpg')}}" alt="..." class="img-style">
                        <h3 class="mb-0 mt-4 display-27">Keir Prestonly</h3>
                        <p class="mb-0">Founder</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 text-center mb-1-9 mb-lg-0">
                        <img src="{{ url('assets/img/team/2.jpg')}}" alt="..." class="img-style">
                        <h3 class="mb-0 mt-4 display-27">Jeviyol Keror</h3>
                        <p class="mb-0">Co-Founder</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 text-center mb-1-9 mb-sm-0">
                        <img src="{{ url('assets/img/team/3.jpg')}}" alt="..." class="img-style">
                        <h3 class="mb-0 mt-4 display-27">Jamara Karle</h3>
                        <p class="mb-0">Designer</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 text-center">
                        <img src="{{ url('assets/img/team/4.jpg')}}" alt="..." class="img-style">
                        <h3 class="mb-0 mt-4 display-27">Lenethi Miloler</h3>
                        <p class="mb-0">Designer</p>
                    </div>
                </div>
            </div>
        </section>
@endsection
