@extends('welcome3')

@section('content')

<!-- PAGE INNER
================================================== -->
<div class="page-inner">

    <!-- PAGE MAIN WRAPPER
    ================================================== -->
    <div id="main-wrapper">
        <!-- row -->
        <div class="row align-items-center grid-margin">
            <div class="col-12">
                <div class="card card-white">
                    <div class="card-body row align-items-center">
                        <div class="col-12 col-md-5 mb-4 mb-md-0">
                            <h4 class="mb-0">Customers</h4>
                        </div>

                        {{-- <div class="col-12 col-md-7">

                            <div class="row">

                                <div class="col-md-8 mb-3 mb-md-0">
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="exampleInputEmail1" placeholder="search by name">
                                </div>

                                <div class="col-md-4">
                                    <select class="form-control form-select">
                                        <option>Order Amount</option>
                                        <option>Highest To Lowest</option>
                                        <option>Lowest To Highest</option>
                                    </select>
                                </div>

                            </div>

                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- Row -->
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card card-white">
                    <div class="card-body">
                        <table class="table">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Contacts</th>
                                    <th scope="col">Total Orders</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Joining Date</th>
                                    <th scope="col" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersPerCustomer as $item)

                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            {{-- <div class="me-4">
                                                <img src="img/avatars/avatar-02.jpg" class="rounded-circle" alt="...">
                                            </div> --}}
                                            <div>
                                                <h6>{{$item->nama}}</h6>
                                                {{-- <span>ID : #SK2541</span> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->nohp}}</td>
                                    <td>{{ $item->total_orders}}</td>
                                    <td><span class="badge rounded-pill bg-soft-green">Active</span></td>
                                    <td>Rp. {{ number_format($item->total_order_amount, 0, ',', '.')}}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                                    <td>
                                        <a href="#" class="me-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="far fa-edit text-primary"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ url('customer/destroy/' . $item->id) }}" method="post" id="delete-form-{{ $item->id }}">
                                            @csrf
                                            @method('delete')
                                            <button data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="btn btn-default delete-btn"  data-id="{{ $item->id }}">
                                                <i class="far fa-trash-alt text-danger"></i>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>


</div>

@include('ecommerce.layouts.shared.alert')
@endsection
