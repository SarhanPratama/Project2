@extends('welcome3')
@section('content')


<div id="main-wrapper">
    <!-- row -->
    <div class="row align-items-center grid-margin">
        <div class="col-12">
            <div class="card card-white">
                <div class="card-body row align-items-center">
                    <div class="col-12 col-sm">
                        <h4 class="mb-4 mb-sm-0 text-center text-sm-start">PEMBELIAN</h4>
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
                    <div>
                        <a class="btn btn-primary mb-5" href="{{ url('/resetpem') }}" type="submit">Tambah Data Pembelian</a>
                    </div>
                    <table class="table">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">NO BUKTI</th>
                                <th scope="col">PEMASOK</th>
                                <th scope="col">BARANG</th>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">KETERANGAN</th>
                                <th scope="col">JUMLAH</th>
                                <th scope="col">HARGA</th>
                                <th scope="col">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Pembelian as $item)

                            <tr>
                                <th scope="row">
                                    <div class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    </div>
                                </th>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->nobukti }}</td>

                                <td>{{ $item->nama }}</td>

                                <td>{{ $item->namastok }}</td>

                                <td>{{ $item->tgl }}</td>

                                <td>{{ $item->keterangan }}</td>

                                <td>{{ $item->qty }}</td>

                                <td>RP. {{ number_format($item->harga, 0, ',', '.') }}</td>

                                    <td>RP. {{ number_format($item->total, 0, ',', '.') }}</td>


                                                                {{-- <td><a href="{{ url('Pembelian/'. $item->id) }}" class="btn-link" title="Edit"><i class="far fa-edit me-1"></i></a></td>
                                                                <td>
                                                                    <form action="{{ url('Pembelian/destroy/' . $item->id) }}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                    <button class="btn-link" title="delete"><i class='bx bxs-trash-alt' ></i></button>
                                                                    </form>
                                                                </td> --}}

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

{{-- <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
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
</script> --}}

@endsection

