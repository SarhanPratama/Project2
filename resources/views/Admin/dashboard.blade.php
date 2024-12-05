@extends('welcome3')

@section('content')
          <!-- PAGE INNER
            ================================================== -->
            <div class="page-inner">

                <!-- PAGE MAIN WRAPPER
                ================================================== -->
                <div id="main-wrapper">

                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6 half-gutter grid-margin">
                            <div class="card card-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <h4 class="mb-0 text-blue">{{ $productSold->total_products_sold}}</h4>
                                            <p class="text-muted mb-0">Products Sold</p>
                                        </div>
                                        <div>
                                            <i class="fas fa-shopping-cart text-blue fs-2"></i>
                                        </div>
                                    </div>
                                    <div class="custom-progress bg-blue progress mb-0">
                                        <div class="animated custom-bar progress-bar slideInLeft" style="width:70%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 half-gutter grid-margin">
                            <div class="card card-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <h4 class="mb-0 text-orange">Rp. {{ number_format($netprofit->profit, 0, ',', '.')}}</h4>
                                            <p class="text-muted mb-0">Net Profit</p>
                                        </div>
                                        <div>
                                            <i class="fas fa-chart-pie text-orange fs-2"></i>
                                        </div>
                                    </div>
                                    <div class="custom-progress bg-orange progress mb-0">
                                        <div class="animated custom-bar progress-bar slideInLeft" style="width:80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 half-gutter grid-margin">
                            <div class="card card-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <h4 class="mb-0 text-green">{{ $newCustomers->new_customers}}</h4>
                                            <p class="text-muted mb-0">New Customers</p>
                                        </div>
                                        <div>
                                            <i class="far fa-user text-green fs-2"></i>
                                        </div>
                                    </div>
                                    <div class="custom-progress bg-green progress mb-0">
                                        <div class="animated custom-bar progress-bar slideInLeft" style="width:60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 half-gutter grid-margin">
                            <div class="card card-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <h4 class="mb-0 text-pink">99.89 %</h4>
                                            <p class="text-muted mb-0">Customer Satisfaction</p>
                                        </div>
                                        <div>
                                            <i class="far fa-heart text-pink fs-2"></i>
                                        </div>
                                    </div>
                                    <div class="custom-progress bg-pink progress mb-0">
                                        <div class="animated custom-bar progress-bar slideInLeft" style="width:90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-12 half-gutter grid-margin">
                            <div class="card card-white h-100">
                                <div class="card-heading clearfix">
                                    <h4 class="card-title">Market Value</h4>
                                </div>
                                <div class="card-body">
                                    <div id="apexchart1"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                </div>


            </div>


@endsection
