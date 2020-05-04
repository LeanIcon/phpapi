@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle])
<div class="row">
    <div class="col-lg-3">
        <a href="" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Purchase Orders</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-purple">24</h3>
                    <i class="dripicons-user-group card-eco-icon bg-icon-purple align-self-center"></i>
                </div>                                     
                <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i></span>Up From Yesterday</p>
            </div><!--end card-body-->
        </div><!--end card-->
    </div>
</a>
    <div class="col-lg-3">
        <a href="" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Orders Confirmed</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-pink">15</h3>
                    <i class="dripicons-cart card-eco-icon bg-icon-pink align-self-center"></i>
                </div>                                     
                <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i></span> Up From Last Week</p>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</a>

    <div class="col-lg-3">
        <a href="" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Invoice Received</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-secondary">8</h3>
                    <i class="dripicons-jewel card-eco-icon bg-icon-secondary align-self-center"></i>
                </div>                                   
                <p class="mb-0 text-muted text-truncate"><span class="text-danger"><i class="mdi mdi-trending-down"></i>3%</span> Down From Last Month</p>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end -->
</a>

    <div class="col-lg-3">
        <a href="" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Shortage List</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-warning">4</h3>
                    <i class="dripicons-wallet card-eco-icon bg-icon-warning  align-self-center"></i>
                </div>
                <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i></span></p>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div>
</a>

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8 align-self-center">
                        <div class="">
                            <h4 class="mt-0 header-title">This Month Revenue</h4>
                            <h2 class="mt-0">$57k</h2> 
                            <p class="mb-0 text-muted"><span class="text-success"><i class="mdi mdi-arrow-up"></i>14.5%</span> Up From Last Month</p>
                        </div>
                    </div><!--end col-->
                    <div class="col-4 align-self-center">
                        <div class="icon-info text-right">
                            <i class="dripicons-wallet bg-soft-info"></i>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
            <div class="card-body overflow-hidden p-0">
                <div class="d-flex mb-0 h-100 dash-info-box">
                    <div class="w-100">
                        <div class="apexchart-wrapper">
                            <div id="eco_dash_2" class="chart-gutters"></div>
                        </div>
                    </div>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title mb-3">New Customers</h4>
                <div class="row">
                    <div class="col-8">
                       <div class="align-self-center">
                            <div id="re_customers" class="apex-charts mb-n4"></div>
                       </div>
                    </div><!--end col-->
                    <div class="col-4 align-self-center">
                        <div class="re-customers-detail">
                            <h3 class="mb-0">21,546</h3>
                            <p class="text-muted"><i class="mdi mdi-circle text-pink mr-1"></i>New Customers</p>
                        </div>
                        <div class="re-customers-detail">
                            <h3 class="mb-0">1535</h3>
                            <p class="text-muted"><i class="mdi mdi-circle text-primary mr-1"></i>Repeated</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->

    <div class="col-lg-4">
        <div class="card carousel-bg-img">
            <div class="card-body dash-info-carousel">
                <h4 class="mt-0 header-title">Popular Product</h4>
                <div id="carousel_2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="media">
                                <img src="../assets/images/products/img-2.png" height="200" class="mr-4" alt="...">
                                <div class="media-body align-self-center"> 
                                    <span class="badge badge-primary mb-2">354 sold</span>
                                    <h4 class="mt-0">Important Watch</h4>
                                    <p class="text-muted mb-0">$99.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="media">
                                <img src="../assets/images/products/img-3.png" height="200" class="mr-4" alt="...">
                                <div class="media-body align-self-center"> 
                                    <span class="badge badge-primary mb-2">654 sold</span>
                                    <h4 class="mt-0">Wireless Headphone</h4>
                                    <p class="text-muted mb-0">$39.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="media">
                                <img src="../assets/images/products/img-1.png" height="200" class="mr-4" alt="...">
                                <div class="media-body align-self-center"> 
                                    <span class="badge badge-primary mb-2">551 sold</span>
                                    <h4 class="mt-0">Leather Bag</h4>
                                    <p class="text-muted mb-0">$49.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel_2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel_2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body order-list">
                <h4 class="header-title mt-0 mb-3">Order List</h4>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-top-0">Product</th>
                                <th class="border-top-0">Pro Name</th>
                                <th class="border-top-0">Country</th>
                                <th class="border-top-0">Order Date/Time</th>
                                <th class="border-top-0">Pcs.</th>
                                <th class="border-top-0">Amount ($)</th>
                                <th class="border-top-0">Status</th>
                            </tr><!--end tr-->
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img class="" src="../assets/images/products/img-1.png" alt="user"> </td>
                                <td>
                                    Beg
                                </td>
                                <td>                                                                
                                    <img src="../assets/images/flags/us_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle">
                                </td>
                                <td>3/03/2019 4:29 PM</td>
                                <td>200</td>                                   
                                <td> $750</td>
                                <td>                                                                        
                                    <span class="badge badge-md badge-boxed  badge-soft-success">Shipped</span>
                                </td>
                            </tr><!--end tr-->
                            <tr>
                                <td>
                                    <img class="" src="../assets/images/products/img-2.png" alt="user"> </td>
                                <td>
                                    Watch
                                </td>
                                <td>                                                                
                                    <img src="../assets/images/flags/french_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle">
                                </td>
                                <td>13/03/2019 1:09 PM</td>
                                <td>180</td>                                   
                                <td> $970</td>
                                <td>
                                    <span class="badge badge-md badge-boxed  badge-soft-danger">Delivered</span>
                                </td>
                            </tr><!--end tr-->
                            <tr>
                                <td>
                                    <img class="" src="../assets/images/products/img-3.png" alt="user"> </td>
                                <td>
                                    Headphone
                                </td>
                                <td>                                                                
                                    <img src="../assets/images/flags/spain_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle">
                                </td>
                                <td>22/03/2019 12:09 PM</td>
                                <td>30</td>                                   
                                <td> $2800</td>
                                <td>
                                    <span class="badge badge-md badge-boxed badge-soft-warning">Pending</span>
                                </td>
                            </tr><!--end tr-->
                            <tr>
                                <td>
                                    <img class="" src="../assets/images/products/img-4.png" alt="user"> </td>
                                <td>
                                    Purse
                                </td>
                                <td>                                                                
                                    <img src="../assets/images/flags/russia_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle">
                                </td>
                                <td>14/03/2019 8:27 PM</td>
                                <td>100</td>                                   
                                <td> $520</td>
                                <td>                                                                                                                                              
                                    <span class="badge badge-md badge-boxed  badge-soft-success">Shipped</span>                                                                    
                                </td>
                            </tr><!--end tr-->
                            <tr>
                                <td>
                                    <img class="" src="../assets/images/products/img-5.png" alt="user"> </td>
                                <td>
                                    Shoe
                                </td>
                                <td>                                                                
                                    <img src="../assets/images/flags/italy_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle">
                                </td>
                                <td>18/03/2019 5:09 PM</td>
                                <td>100</td>                                   
                                <td> $1150</td>
                                <td>
                                    <span class="badge badge-md badge-boxed badge-soft-warning">Pending</span>
                                </td>
                            </tr><!--end tr-->
                            <tr>
                                <td>
                                    <img class="" src="../assets/images/products/img-6.png" alt="user"> </td>
                                <td>
                                    Boll
                                </td>
                                <td>                                                                
                                    <img src="../assets/images/flags/us_flag.jpg" alt="" class="img-flag thumb-xxs rounded-circle">
                                </td>
                                <td>30/03/2019 4:29 PM</td>
                                <td>140</td>                                   
                                <td> $ 650</td>
                                <td>                                                                        
                                    <span class="badge badge-md badge-boxed  badge-soft-success">Shipped</span>
                                </td>
                            </tr><!--end tr-->                                                    
                        </tbody>
                    </table> <!--end table-->                                               
                </div><!--end /div-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
@endsection