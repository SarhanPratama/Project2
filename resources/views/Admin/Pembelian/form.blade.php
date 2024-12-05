@extends('welcome3')
@section('content')


<div id="main-wrapper">
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 grid-margin">
            <div class="card card-white mb-3">
                <div class="card-heading clearfix">
                    <h4 class="card-title">Pembelian information</h4>
                </div>
                <div class="card-body">
    
                    <form action="{{url('Pembelian/')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="row">
                            {{-- <div class="col-6"> --}}
                                
                             <div class="col-md-6 ">

                            
                                <div class="d-flex">
                                    
                                <div class="col-md-6 ">
                                    <label for="validationCustom01">No Bukti</label>
                                    <input type="nobukti" class="form-control" value="{{ $nobukti }}" id="validationCustom01" name="nobukti" placeholder="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02">Tanggal</label>
                                    <input name="tgl" type="date" class="form-control" id="validationCustom02" name="tgl" placeholder=""  required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <label for="validationCustom03">Pemasok</label>
                                    <select name="idpemasok" id="" class="form-control">

                                        @foreach ($Pemasok as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom05">Keterangan</label>
                                    <input name="keterangan" type="text" class="form-control" id="validationCustom05" name="keterangan" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <label for="validationCustom03">Nama Barang</label>
                                    <select name="idstok" id="stok" class="form-control">
                                        @foreach ($stok as $item)
                                        <option value="{{ $item->id }}" data-harga="{{ $item->hargabeli }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom05">Jumlah</label>
                                    <input type="qty" class="form-control" id="validationCustom05" name="qty" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="validationCustom05">Harga</label>
                                    <input type="harga" id="harga" class="form-control" id="validationCustom05" name="harga" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                                

            
                            <div>

                                <button class="btn btn-primary mt-5" type="sudmit">Simpan</button>
                            </div>
                        </div>
                    </form>
    
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
                                    <th scope="col">
                                        <div class="custom-control custom-checkbox mb-0">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck">
                                        </div>
                                    </th>
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
                                @foreach ($rec as $item)
                                    
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

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var namaSelect = document.getElementById('stok');
        var hargaInput = document.getElementById('harga');

        namaSelect.addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var selectedHarga = selectedOption.getAttribute('data-harga');

            // Set the hargaInput value based on selectedHarga
            hargaInput.value = selectedHarga;
        });
    });
    </script>

@endsection

