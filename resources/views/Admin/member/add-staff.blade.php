@extends('welcome3')
@section('content')
<div class="page-inner">

    <!-- PAGE MAIN WRAPPER
    ================================================== -->
    <div id="main-wrapper">
        <!-- row -->
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card card-white">
                    <div class="card-heading clearfix">
                        <h4 class="card-title">Add staff necessary</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('staff/') }}">
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
                            <button type="submit" class="btn btn-primary butn-style2 mt-4">Daftar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>


</div>
@endsection
