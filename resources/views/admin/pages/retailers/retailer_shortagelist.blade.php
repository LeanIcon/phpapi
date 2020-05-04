@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? '']) 
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
        <a href="{{route('retailer.retailer_invoice')}}" class="custom-card">
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
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                            <td>Product (Ernest Chemist)</td>
                            <td>In stock</td>
                            <td><input class="form-control" type="number" value="1" /></td>
                            <td class="text-right">124,90 GHc</td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                        <tr>
                            <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                            <td>Product (Tobinco Chemist)</td>
                            <td>In stock</td>
                            <td><input class="form-control" type="number" value="1" /></td>
                            <td class="text-right">33,90 GHc</td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                        <tr>
                            <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                            <td>Drug  (Pokupharma Chemist)</td>
                            <td>In stock</td>
                            <td><input class="form-control" type="number" value="1" /></td>
                            <td class="text-right">70,00 GHc</td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right">255,90 Ghc</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right">6,90 GHc</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>346,90 GHc</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Add to P.O</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection