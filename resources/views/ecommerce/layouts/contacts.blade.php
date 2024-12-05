@extends('ecommerce.layouts.ecom')
@section('content')
            <!-- PAGE TITLE
        ================================================== -->
        @include('ecommerce.layouts.shared.title')
        <!-- CONTACT
        ================================================== -->
        <section class="md">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="contact-info rounded h-100">
                            <div class="contact-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <h3 class="display-29 font-weight-500 mb-2">Phone Numbers</h3>
                            <ul class="mb-0 list-unstyled">
                                <li><a href="#">(+44) 123 456 789</a></li>
                                <li><a href="#">(+44) 987 654 321</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="contact-info rounded h-100">
                            <div class="contact-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <h3 class="display-29 font-weight-500 mb-2">Location</h3>
                            <p class="mb-0">3389 Eglinton Avenue,
                                <br> Windermere, London, SK 8GH.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-info rounded h-100">
                            <div class="contact-icon">
                                <i class="ti-email"></i>
                            </div>
                            <h3 class="display-29 font-weight-500 mb-2">Email Address</h3>
                            <ul class="mb-0 list-unstyled">
                                <li><a href="#">addyour@emailhere</a></li>
                                <li><a href="#">email@youradress.com</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ADDRESS
        ================================================== -->
        <section class="pt-0">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6 mb-1-9 mb-md-0">

                        <div class="store-details">
                            <div class="contact-img">
                                <img src="img/content/contact-1.jpg" alt="...">
                            </div>
                            <div class="info-box">
                                <h5>Houston, USA</h5>
                                <ul class="mb-0 list-unstyled">
                                    <li class="mb-4">
                                        <div class="d-flex align-top">
                                            <div class="info-icon">
                                                <i class="ti-location-pin"></i>
                                            </div>
                                            <div class="ps-4">
                                                <h6 class="info-label">Find us</h6>
                                                <a href="#">3445 Circle Drive, H3 Gambler Lane, Houston, USA</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-4">
                                        <div class="d-flex align-top">
                                            <div class="info-icon">
                                                <i class="ti-mobile"></i>
                                            </div>
                                            <div class="ps-4">
                                                <h6 class="info-label">Call us</h6>
                                                <a href="#">123-456-7890</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-top">
                                            <div class="info-icon">
                                                <i class="ti-email"></i>
                                            </div>
                                            <div class="ps-4">
                                                <h6 class="info-label">Write us</h6>
                                                <a href="#">addyour@emailaddreshere</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="store-details">
                            <div class="contact-img">
                                <img src="img/content/contact-2.jpg" alt="...">
                            </div>
                            <div class="info-box">
                                <h5>Boston, USA</h5>
                                <ul class="mb-0 list-unstyled">
                                    <li class="mb-4">
                                        <div class="d-flex">
                                            <div class="info-icon">
                                                <i class="ti-location-pin"></i>
                                            </div>
                                            <div class="ps-4">
                                                <h6 class="info-label">Find us</h6>
                                                <a href="#" class="info-link">1054 Margaret Street, IT  Werninger Street,Boston, USA</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-4">
                                        <div class="d-flex">
                                            <div class="info-icon">
                                                <i class="ti-mobile"></i>
                                            </div>
                                            <div class="ps-4">
                                                <h6 class="info-label">Call us</h6>
                                                <a href="#">098-765-4321</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <div class="info-icon">
                                                <i class="ti-email"></i>
                                            </div>
                                            <div class="ps-4">
                                                <h6 class="info-label">Write us</h6>
                                                <a href="#">addyour@emailhere</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- CONTACT FORM
        ================================================== -->
        <section class="pt-0 md">
            <div class="container">

                <div class="text-center mb-1-9 mb-lg-2-3">
                    <h2 class="mb-0">Get In Touch</h2>
                </div>

                <div class="row">
                    <div class="col-lg-10 mx-auto">

                        <form>

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Your name here">
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Your Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Your email here">
                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" class="form-control" name="companyname" placeholder="Your company name">
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="text" class="form-control" name="phone" placeholder="+40-123 456 789">
                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12 mb-4">

                                    <label>Message</label>
                                    <div class="form-group mb-1">
                                        <textarea rows="3" class="form-control" placeholder="Tell us a few words"></textarea>
                                    </div>

                                </div>

                            </div>

                            <button type="button" class="butn-style2">Send Message</button>

                        </form>

                    </div>
                </div>
            </div>
        </section>

        <!-- MAP
        ================================================== -->
        <div class="row position-relative">
            <div class="col-12">
                <iframe width="100%" height="350" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.633980187904!2d101.437411!3d0.512844!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aead9af954b9%3A0x5cbd18b673591d0d!2sUniversitas%20Muhammadiyah%20Riau%20Kampus%201!5e0!3m2!1sen!2sid!4v1733219839378!5m2!1sen!2sid" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>
@endsection
