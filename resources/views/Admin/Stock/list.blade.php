@extends('welcome3')
@section('content')

<div class="page-inner">

	<!-- PAGE MAIN WRAPPER
	================================================== -->
	<div id="main-wrapper">
		<!-- row -->
		<div class="row g-3">
			<div class="col-xl-3">
				<div class="card card-white mb-3">
					<div class="card-body product-form">
                        <form method="GET"> <!-- Ubah method jadi GET -->
                            <input type="search" name="search" placeholder="Cari barang..." value="{{ $search ?? '' }}">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            @if(request()->has('kategori'))
                                @foreach(request()->kategori as $kategoriId)
                                    <input type="hidden" name="kategori[]" value="{{ $kategoriId }}">
                                @endforeach
                            @endif
                        </form>
					</div>
				</div>
				<div class="card card-white">
					<div class="card-body">

                        <div class="mb-4 pb-4">
                            <h6 class="text-uppercase fw-bold mb-4">Kategori</h6>
                            <ul class="list-unstyled product-sidebar mb-0 ps-0">
                                @foreach ($kategori as $item)
                                    <li class="custom-control custom-checkbox ps-0">
                                        <input
                                            class="custom-control-input kategori-checkbox"
                                            type="checkbox"
                                            name="kategori[]"
                                            value="{{ $item->id }}"
                                            id="kategori-{{ $item->id }}"
                                            @if(request()->has('kategori') && in_array($item->id, request('kategori'))) checked @endif>
                                        <label class="custom-control-label text-start" for="kategori-{{ $item->id }}">
                                            {{ $item->nama }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- <div class="mb-4 pb-4">
                            <h6 class="text-uppercase fw-bold mb-4">Price Range</h6>
                            <input type="text" class="price-range" name="my_range" value="{{ $selected_price_range }}">
                        </div> --}}

					</div>
				</div>
			</div>
			<div class="col-xl-9">
				<div class="row gx-3">
				@foreach ($barang as $item)
						<div class="col-md-6 col-xxl-3 grid-margin">
							<div class="product-grid h-100">
								<div class="product-img">
									<a href="#">
										<div class="label-offer bg-danger">{{ $item->kategori }}</div>
                                @php
                                    $images = json_decode($item->foto, true); // Decode JSON ke array
                                @endphp
                                @if (!empty($images) && is_array($images))
                                    <img src="{{ asset('storage/foto/' . $images[0]) }}" alt="First Image" class="img-fluid" style="width: 200px; height: 250px; object-fit: cover; display: block; margin: 0 auto;">
                                @else
                                    <p>Tidak ada gambar</p>
                                @endif
									</a>
								</div>
								<div class="product-description">
									<h3><a href="{{ url('Stock/' . $item->id)}}" class="right-sidebar-toggle butn-header" data-sidebar-id="main-right-sidebar">{{ $item->nama }}</a></h3>
									<h4 class="price">
										<span class="regular-price line-through">Rp. <?= number_format($item->hargajual, 0, ',', '.') ?></span>
										{{-- <span class="offer-price">$90.00</span> --}}
									</h4>
								</div>
								<div class="product-buttons">
									<ul class="ps-0">
										<li><a href="{{ url('Stock/'. $item->id . '/edit') }}" class="btn-link" title="Edit"><i class="far fa-edit me-1"></i> Edit</a></li>
										<li>
                                            <form action="{{ url('Stock/'. $item->id)}}" method="POST"  id="delete-form-{{ $item->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button  class="btn btn-link delete-btn"  data-id="{{ $item->id }}">
                                                    <i class="far fa-trash-alt me-1"></i> Delete
                                                </button>
                                            </form>
                                        </li>
									</ul>
								</div>
							</div>
						</div>

				@endforeach
					{{-- <div class="col-12 mt-4 grid-margin">
						<nav aria-label="Page navigation example">
							<ul class="pagination justify-content-center">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
									<a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</nav>
					</div> --}}
				</div>
                <div class="mt-4 d-flex justify-content-center">
                    {{ $barang->links('pagination::simple-bootstrap-5') }}
                </div>
			</div>
		</div>
		<!-- end row -->
	</div>

	{{-- <div class="page-footer">
		<p>Copyright &copy; <span class="current-year"></span> Smartshop All rights reserved.</p>
	</div> --}}
</div>

<script>

document.querySelectorAll('.kategori-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        // Ambil semua checkbox yang dipilih
        const selectedCategories = Array.from(document.querySelectorAll('.kategori-checkbox:checked'))
            .map(checkbox => checkbox.value);

        // Buat URL baru dengan parameter kategori
        const baseUrl = "{{ route('Stock.index') }}"; // Pastikan route ini ada
        const queryString = selectedCategories.map(cat => `kategori[]=${cat}`).join('&');
        const newUrl = `${baseUrl}?${queryString}`;

        // Arahkan browser ke URL baru
        window.location.href = newUrl;
    });
});

    document.getElementById('submit').addEventListener('click', function() {
    document.getElementById('delete').submit();


    });

</script>

@include('ecommerce.layouts.shared.alert')
@endsection
