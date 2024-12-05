@extends('ecommerce.layouts.ecom')
@section('content')

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
                        <h4 class="mb-0">My Orders</h4>
                    </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Penjualan as $item)
                            <tr>
                                <th>
                                    {{ $item->nobukti }}
                                </th>
                                <td>
                                    {{ $item->tgl}}
                                </td>
                                <td>
                                    @if ($item->status == 'Complete')
                                <span class="fas fa-circle text-success small mr-1"></span> {{ $item->status}}
                                @elseif ($item->status == 'Process')
                                <span class="fas fa-circle text-primary small mr-1"></span> {{ $item->status}}
                                @elseif ($item->status == 'Cencelled')
                                <span class="fas fa-circle text-danger small mr-1"></span> {{ $item->status}}
                                @else

                                <span class="fas fa-circle text-info small mr-1"></span> {{ $item->status}}
                                @endif
                                </td>
                                <td>Rp. {{ number_format($item->total, 0, ',', '.') }}</td>
                                <td>
                                    <a href="#" class="text-primary">Pay</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a class="butn-style2 mt-3" href="#"><span>Show All Orders</span></a>
                </div>

            </div>
            <!-- end right panel -->
        </div>
    </div>
</section>

@endsection
