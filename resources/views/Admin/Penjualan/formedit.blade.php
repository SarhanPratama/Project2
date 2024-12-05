@extends('welcome3')
@section('content')

    <div id="main-wrapper">
        <!-- row -->
        <div class="row g-3">
            <div class="col-xl-8 grid-margin">
                <div class="card card-white mb-3">
                    <div class="card-heading clearfix">
                        <h4 class="card-title">Product information</h4>
                    </div>
                    <div class="card-body">
    
                        <form action="{{ url('Penjualan/'. $Penjualan->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                
                                <div class="col-md-12 mb-3">
                                    <label>NO BUKTI</label>
                                    <input type="text" class="form-control" id="validationCustom01"  name="nobukti" value="{{ $Penjualan->nobukti }}" required>
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <label>TANGGAL</label>
                                    <input type="date" class="form-control" id="validationCustom01"  name="tanggal" value="{{ $Penjualan->formatted_tgl }}" required>
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <label>PELANGGAN</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="pelanggan" value="{{ $Penjualan->pelanggan }}" required>
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <label>KETERANGAN</label>
                                    <input type="text" class="form-control" id="validationCustom01"  name="keterangan" value="{{ $Penjualan->keterangan }}" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>TOTAL</label>
                                    <input type="text" class="form-control" id="validationCustom01"  name="total" value="{{ $Penjualan->total }}" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>BUKTI PEMBAYARAN</label>
                                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="foto[]" multiple>
                                </div>
                                
                                

                            </div>
                            <button type="sudmit">Simpan</button>
                             </form>
    
                    </div>
            </div>
        </div>
    </div>
@endsection