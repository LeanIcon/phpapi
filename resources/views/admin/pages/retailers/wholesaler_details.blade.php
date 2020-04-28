@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
<div class="container-fluid">
    <!-- Page-Title -->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body  met-pro-bg">
                    <div class="met-profile">
                        <div class="row">
                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                <div class="met-profile-main">
                                    <div class="met-profile-main-pic">
                                        <img src="{{url('admin/assets/images/users/user-4.jpg')}}" alt="" class="rounded-circle">
                                        <span class="fro-profile_main-pic-change">
                                                            <i class="fas fa-camera"></i>
                                                        </span>
                                    </div>
                                    <div class="met-profile_user-detail">
                                        <h5 class="met-user-name">{{$wholesaler->name}}</h5>
                                        <p class="mb-0 met-user-name-post">{{$wholesaler->type}}</p>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-4 ml-auto">
                                <ul class="list-unstyled personal-detail">
                                    <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> phone </b> :{{$wholesaler->phone}}</li>
                                    <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : {{$wholesaler->email}}</li>
                                    <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Location</b> : USA</li>
                                </ul>
                                <div class="button-list btn-social-icon">
                                    <button type="button" class="btn btn-blue btn-round">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" class="btn btn-secondary btn-round ml-2">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end f_profile-->
                </div>
                <!--end card-body-->
                <div class="card-body">
                    <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general_detail_tab" data-toggle="pill" href="#general_detail">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="education_detail_tab" data-toggle="pill" href="#education_detail">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="portfolio_detail_tab" data-toggle="pill" href="#portfolio_detail">News Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="settings_detail_tab" data-toggle="pill" href="#settings_detail">Settings</a>
                        </li>
                    </ul>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-12">
            <div class="tab-content detail-list" id="pills-tabContent">
                <div class="tab-pane fade show active" id="general_detail">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">

                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end general detail-->

                <div class="tab-pane fade" id="education_detail">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card e-co-product">
                                <a href="">
                                    <img src="{{url('admin/assets/images/products/img-1.png')}}" alt="" class="img-fluid">
                                </a>
                                <div class="card-body product-info">
                                    <a href="" class="product-title">Chloroquin</a>
                                    <div class="d-flex justify-content-between my-2">
                                        <p class="product-price"> &cent; 29.00 <span class="ml-2"><del>&cent;49.00</del></span></p>
                                        <ul class="list-inline mb-0 product-review align-self-center">
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-gradient-primary btn-round px-3 btn-sm waves-effect waves-light"><i class="mdi mdi-cart mr-1"></i> Add To Purchase Order</button>
                                    {{--  <button class="btn btn-gradient-pink  btn-sm waves-effect waves-light wishlist" data-toggle="tooltip" data-placement="top" title="" data-original-title="Wishlist"><i class="mdi mdi-heart"></i></button>
                                    <button class="btn btn-gradient-secondary  btn-sm waves-effect waves-light quickview" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quickview"><i class="mdi mdi-magnify"></i></button>  --}}
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <div class="col-lg-3">
                            <div class="card e-co-product">
                                <a href="">
                                    <img src="{{url('admin/assets/images/products/img-1.png')}}" alt="" class="img-fluid">
                                </a>
                                <div class="card-body product-info">
                                    <a href="" class="product-title">Chloroquin</a>
                                    <div class="d-flex justify-content-between my-2">
                                        <p class="product-price"> &cent; 29.00 <span class="ml-2"><del>&cent;49.00</del></span></p>
                                        <ul class="list-inline mb-0 product-review align-self-center">
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-gradient-primary btn-round px-3 btn-sm waves-effect waves-light"><i class="mdi mdi-cart mr-1"></i> Add To Purchase Order</button>
                                    {{--  <button class="btn btn-gradient-pink  btn-sm waves-effect waves-light wishlist" data-toggle="tooltip" data-placement="top" title="" data-original-title="Wishlist"><i class="mdi mdi-heart"></i></button>
                                    <button class="btn btn-gradient-secondary  btn-sm waves-effect waves-light quickview" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quickview"><i class="mdi mdi-magnify"></i></button>  --}}
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <div class="col-lg-3">
                            <div class="card e-co-product">
                                <a href="">
                                    <img src="{{url('admin/assets/images/products/img-1.png')}}" alt="" class="img-fluid">
                                </a>
                                <div class="card-body product-info">
                                    <a href="" class="product-title">Chloroquin</a>
                                    <div class="d-flex justify-content-between my-2">
                                        <p class="product-price"> &cent; 29.00 <span class="ml-2"><del>&cent;49.00</del></span></p>
                                        <ul class="list-inline mb-0 product-review align-self-center">
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-gradient-primary btn-round px-3 btn-sm waves-effect waves-light"><i class="mdi mdi-cart mr-1"></i> Add To Purchase Order</button>
                                    {{--  <button class="btn btn-gradient-pink  btn-sm waves-effect waves-light wishlist" data-toggle="tooltip" data-placement="top" title="" data-original-title="Wishlist"><i class="mdi mdi-heart"></i></button>
                                    <button class="btn btn-gradient-secondary  btn-sm waves-effect waves-light quickview" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quickview"><i class="mdi mdi-magnify"></i></button>  --}}
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <div class="col-lg-3">
                            <div class="card e-co-product">
                                <a href="">
                                    <img src="{{url('admin/assets/images/products/img-1.png')}}" alt="" class="img-fluid">
                                </a>
                                <div class="card-body product-info">
                                    <a href="" class="product-title">Chloroquin</a>
                                    <div class="d-flex justify-content-between my-2">
                                        <p class="product-price"> &cent; 29.00 <span class="ml-2"><del>&cent;49.00</del></span></p>
                                        <ul class="list-inline mb-0 product-review align-self-center">
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-gradient-primary btn-round px-3 btn-sm waves-effect waves-light"><i class="mdi mdi-cart mr-1"></i> Add To Purchase Order</button>
                                    {{--  <button class="btn btn-gradient-pink  btn-sm waves-effect waves-light wishlist" data-toggle="tooltip" data-placement="top" title="" data-original-title="Wishlist"><i class="mdi mdi-heart"></i></button>
                                    <button class="btn btn-gradient-secondary  btn-sm waves-effect waves-light quickview" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quickview"><i class="mdi mdi-magnify"></i></button>  --}}
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->

                    </div>
                </div>
                <!--end education detail-->

                <div class="tab-pane fade" id="portfolio_detail">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <!-- End portfolio  -->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->

                            <div class="card">
                                <div class="card-body">
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                        <div class="col-lg-4">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4><i class="fas fa-quote-left text-primary"></i></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <!--end portfolio detail-->

                <div class="tab-pane fade" id="settings_detail">
                    <div class="row">
                        <div class="col-lg-12 col-xl-9 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end settings detail-->
            </div>
            <!--end tab-content-->

        </div>
        <!--end col-->
    </div>
    <!--end row-->

</div>

@endsection