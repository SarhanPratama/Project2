@extends('ecommerce.layouts.ecom')
@section('content')
            <!-- PAGE TITLE
        ================================================== -->
                @include('ecommerce.layouts.shared.title')

        <!-- ACCOUNT ORDERS
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
                                <h4 class="mb-0">My Profile</h4>
                                {{-- <p class="mb-0">Time for a Sharp My profile.</p> --}}
                            </div>

                            <form method="post">

                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Your Name</label>
                                            <input type="text" class="form-control" value="{{ $user->name}}" name="name" placeholder="Your name here" disabled>
                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Your User Name</label>
                                            <input type="text" class="form-control" name="username" placeholder="Your user name here">
                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" class="form-control" value="{{ $user->email}}" name="email" placeholder="Your email here" disabled>
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

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" value="" name="password" placeholder="Your password here">
                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Re-Password</label>
                                            <input type="password" class="form-control" name="re-password" placeholder="Your re-password here">
                                        </div>

                                    </div>

                                </div>
                                <button type="button" class="butn-style2 mt-4">Update Profile</button>

                            </form>

                        </div>

                    </div>
                    <!-- end right panel -->
                </div>
            </div>
        </section>

@endsection
