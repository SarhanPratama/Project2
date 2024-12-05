@extends('welcome3')
@section('content')


<div id="main-wrapper">
    <!-- row -->
    <div class="row align-items-center grid-margin">
        <div class="col-12">
            <div class="card card-white">
                <div class="card-body row align-items-center">
                    <div class="col-12 col-sm">
                        <h4 class="mb-4 mb-sm-0 text-center text-sm-start">PENJUALAN</h4>
                    </div>

                    <div class="col-12 col-sm-auto">

                        <div class="row justify-content-center">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="row">
    <div class="col-12 grid-margin">
        <div class="card card-white">
            <div class="card-body slimscroll">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">NO BUKTI</th>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">PELANGGAN</th>
                                {{-- <th scope="col">KETERANGAN</th> --}}
                                <th scope="col">TOTAL</th>
                                <th scope="col">METODE PEMBAYARAN</th>
                                <th scope="col">BUKTI PEMBAYARAN</th>
                                <th scope="col">STATUS</th>
                                <th scope="col" colspan="2" style="text-align: center;">AKSI</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Penjualan as $item)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->nobukti }}</td>

                                <td>{{ $item->tgl }}</td>

                                <td>{{ $item->pelanggan }}</td>

                                {{-- <td>{{ $item->keterangan }}</td> --}}

                                <td>Rp. {{ number_format($item->total, 0, ',', '.')}} </td>

                                <td>{{ $item->payment_method}}</td>

                                <td>

                                    <img src="{{ asset('storage/buktipem/' . $item->buktipem) }}" alt="buktipem" class="img-fluid" width="50px" data-toggle="modal" data-target="#imageModal" onclick="showImage('{{ asset('storage/buktipem/' . $item->buktipem) }}')">
                              </td>

                              <td class="px-6 py-3 text-primary font-medium whitespace-nowrap">
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

                                <td><a href="{{ url('Penjualan/'. $item->nobukti) }}" class="btn btn-success" title="Edit"><i class="far fa-edit"></i></a></td>
                                <td>
                                    <form action="{{ url('Penjualan/destroy/' . $item->nobukti) }}" method="post" id="delete-form-{{ $item->nobukti }}">
                                        @csrf
                                        @method('delete')
                                        <button data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="btn btn-danger delete-btn"  data-id="{{ $item->nobukti }}">
                                            <i class="far fa-trash-alt"></i>

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
</div>
<!-- end row -->
</div>

<div class="page-footer">
<p>Copyright &copy; <span class="current-year"></span> Smartshop All rights reserved.</p>
</div>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    function showImage(src) {
        document.getElementById('modalImage').src = src;
    }
</script>
@include('ecommerce.layouts.shared.alert')
@endsection

