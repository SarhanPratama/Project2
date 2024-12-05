
@extends('welcome3')
@section('content')

<div id="main-wrapper">
    <!-- row -->
    <div class="row g-xl-3">
        <div class="grid-margin">
            <div class="card card-white mb-3">
                <div class="card-heading clearfix">
                    <h4 class="card-title">Form Kategori</h4>
                </div>
                <div class="card-body">

                    <form action="{{url('kategori/')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">


                            <div class="col-md-12 mb-3 mt-3">
                                <label for="validationCustom02">Nama Kategori</label>
                                <input type="text" class="form-control" id="validationCustom02" name="nama" placeholder=""  required>
                            </div>

                            <div>
                                <label for="">Image</label>
                                <input class="form-control form-control-lg mb-5" id="formFileLg" type="file" name="foto[]" multiple>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="sudmit">Simpan</button>
                    </form>

                </div>
            </div>

        </div>

    </div>
    <!-- end row -->
</div>

@endsection
