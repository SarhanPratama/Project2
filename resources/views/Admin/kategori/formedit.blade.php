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

                        <form action="{{ url('kategori/'. $kategori->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div>
                                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="foto[]" multiple>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="nama" value="{{ $kategori->nama }}" required>
                                </div>



                            </div>
                            <button class="btn btn-primary" type="sudmit">Simpan</button>
                             </form>

                    </div>
            </div>
        </div>
    </div>
@endsection
