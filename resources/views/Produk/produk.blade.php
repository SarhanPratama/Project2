@extends('welcome3')
@section('content')


<div class="col-lg-3 col-12 side-bar order-2 order-lg-1">
    <div class="widget">
        <div class="widget-title">
            <h5>Categories</h5>
        </div>
        <div id="accordion" class="accordion-style2">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Shirts</button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a href="#">Casual Shirts</a></li>
                            <li><a href="#">Formal Shirts</a></li>
                            <li><a href="#">Longline Shirts</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Jeans
                </button>
              </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a href="#">Regular Jeans</a></li>
                            <li><a href="#">Denim Jeans</a></li>
                            <li><a href="#">Low Rise Jeans</a></li>
                            <li><a href="#">Mid Rise Denims</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Shoes
                </button>
              </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a href="#">Sports Shoes</a></li>
                            <li><a href="#">Wedding Shoes</a></li>
                            <li><a href="#">Loafers Shoes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingFour">
                    <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  T-Shirts
                </button>
              </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordion">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a href="#">Polo T-Shirt</a></li>
                            <li><a href="#">V-neck T-Shirt</a></li>
                            <li><a href="#">Striped T-Shirt</a></li>
                            <li><a href="#">Graphic T-Shirt</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingFive">
                    <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  Mobile
                </button>
              </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-bs-parent="#accordion">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a href="#">Intex</a></li>
                            <li><a href="#">Google</a></li>
                            <li><a href="#">Samsung</a></li>
                            <li><a href="#">Apple</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="widget">
        <div class="widget-title">
            <h5>Price Range</h5>
        </div>
        <input type="text" class="price-range" name="my_range" value="">
        <a href="#" class="butn-style2 small mt-1-9">Filter</a>
    </div>

    <div class="widget">

        <div class="widget-title">
            <h5>Popular Products</h5>
        </div>

        <div class="d-flex mb-4">
            <div class="flex-shrink-0">
                <img src="img/products/thumbs/thumb-06.jpg" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <a href="#" class="mb-1 font-weight-600 text-extra-dark-gray">Men's Football Boots</a>
                <span class="d-block">$15.00</span>
            </div>
        </div>

        <div class="d-flex mb-4">
            <div class="flex-shrink-0">
                <img src="img/products/thumbs/thumb-01.jpg" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <a href="#" class="mb-1 font-weight-600 text-extra-dark-gray">Leather Motorcycle Gloves</a>
                <span class="d-block">$12.10</span>
            </div>
        </div>

        <div class="d-flex">
            <div class="flex-shrink-0">
                <img src="img/products/thumbs/thumb-02.jpg" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <a href="#" class="mb-1 font-weight-600 text-extra-dark-gray"> Sun Protection Cap </a>
                <span class="d-block">$10.20</span>
            </div>
        </div>

    </div>

    <div class="widget">

        <div class="widget-title">
            <h5>Select by Discount</h5>
        </div>

        <ul class="list-discount list-unstyled">

            <li class="form-check text-start">
                <input class="form-check-input" type="checkbox" value="" id="ten_pecentage">
                <label class="form-check-label" for="ten_pecentage">10% off or more</label>
            </li>

            <li class="form-check text-start">
                <input class="form-check-input" type="checkbox" value="" id="twenty_pecentage">
                <label class="form-check-label" for="twenty_pecentage">20% off or more</label>
            </li>

            <li class="form-check text-start">
                <input class="form-check-input" type="checkbox" value="" id="thirty_pecentage">
                <label class="form-check-label" for="thirty_pecentage">30% off or more</label>
            </li>

            <li class="form-check text-start">
                <input class="form-check-input" type="checkbox" value="" id="fourty_pecentage">
                <label class="form-check-label" for="fourty_pecentage">40% off or more</label>
            </li>

        </ul>
    </div>

    <div class="offer-slider owl-carousel owl-theme">

        <div class="offer-banner-slider" style="background-image:url(img/offer-banner/offer-slide-01.jpg);">
            <div class="offer-text">
                <h6 class="mb-1 text-white font-weight-500">Men's</h6>
                <h4 class="font-weight-500"><a href="#">Up to 50% Off</a></h4>
                <p>Lorem ipsum dolor sit amet consectetur</p>
                <a class="butn-style1 fill small" href="#"><span>Buy Now</span></a>
            </div>
        </div>

        <div class="offer-banner-slider" style="background-image:url(img/offer-banner/offer-slide-02.jpg);">
            <div class="offer-text">
                <h6 class="mb-1 text-white font-weight-500">Women's</h6>
                <h4 class="font-weight-500"><a href="#" class="text-white">Up to 70% Off</a></h4>
                <p>Lorem ipsum dolor sit amet consectetur</p>
                <a class="butn-style1 fill small" href="#"><span>Buy Now</span></a>
            </div>
        </div>

        <div class="offer-banner-slider" style="background-image:url(img/offer-banner/offer-slide-03.jpg);">
            <div class="offer-text">
                <h6 class="mb-1 text-white font-weight-500">Electronics</h6>
                <h4 class="font-weight-500"><a href="#" class="text-white">Mega Sale</a></h4>
                <p>Lorem ipsum dolor sit amet consectetur</p>
                <a class="butn-style1 fill small" href="#"><span>Buy Now</span></a>
            </div>
        </div>

    </div>

</div>

@endsection