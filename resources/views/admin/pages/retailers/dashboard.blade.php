@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle])
<style>
.searchbar{
    margin-bottom: auto;
    margin-top: auto;
    height: 50px;
    background-color: white;
    border-radius: 30px;
    padding: 10px;
    }

    .search_input{
    color: white;
    border: 0;
    outline: 0;
    background: none;
    width: 0;
    caret-color:transparent;
    line-height: 40px;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
    padding: 0 10px;
    width: 200px;
    caret-color:green;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon{
    background: green;
    color: #e74c3c;
    }

    .search_icon{
    height: 40px;
    width: 40px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color:green;
    text-decoration:none;
    }

    i.fas {
  
  display: inline-block;
  border-radius: 60px;
  box-shadow: 0px 0px 2px #888;
  padding: 0.5em 0.6em;

}
    </style>
<div class="row">
<div class="col-lg-6 tags p-b-2">
<?php
    /* This sets the $time variable to the current hour in the 24 hour clock format */
    $time = date("H");
    /* Set the $timezone variable to become the current timezone */
    $timezone = date("e");
    /* If the time is less than 1200 hours, show good morning */
    if ($time < "12") {
        echo "<h3 style= font-family:lora;>".  "Good morning" . " ".Auth::user()->firstname .","."</h3>";
    } else
    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
    if ($time >= "12" && $time < "17") {
        echo "<h3 style= font-family:lora;>". "Good afternoon" . " " . Auth::user()->firstname .","."</h3>";
    } else
    /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
    if ($time >= "17" && $time < "19") {
        echo "Good evening";
    } else
    /* Finally, show good night if the time is greater than or equal to 1900 hours */
    if ($time >= "19") {
        echo "<h3 style= font-family:lora;>". "Good evening" . " " . Auth::user()->firstname .","."</h3>";
    }
    ?>

<h1 style="font-size: 50px; font-family:lora;"> Welcome Back! </h1>
                    
                </div>
    <div class="col-lg-3">
        <a href="{{route('retailer.purchase_order')}}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Purchase Orders</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-purple">{{$purchaseOrders->count()}}</h3>
                    <i class="dripicons-user-group card-eco-icon bg-icon-purple align-self-center"></i>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div>
</a>
    <div class="col-lg-3">
        <a href="{{route('retailer.orders')}}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Orders Confirmed</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-pink">{{$approvedPurchaseOrders->count()}}</h3>
                    <i class="dripicons-cart card-eco-icon bg-icon-pink align-self-center"></i>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</a>

<div class="col-lg-6 tags p-b-2">

                </div>
    <div class="col-lg-3">
        <a href="{{route('retailer.retailer_invoice')}}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Invoice Received</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-secondary">2</h3>
                    <i class="dripicons-document-new card-eco-icon bg-icon-secondary align-self-center"></i>
                </div>                                   
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end -->
</a>

    <div class="col-lg-3">
        <a href="{{route('retailer.retailer_shortagelist')}}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Shortage List</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-warning">4</h3>
                    <i class="dripicons-wallet card-eco-icon bg-icon-warning  align-self-center"></i>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div>
</a>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <h4 class="mt-0 header-title">Wholesalers</h4>
                <p class="text-muted mb-4 font-13">
                   Click on Wholesalers to raise Purchase Order.
                </p>

                <h4 class="header-title mt-0 mb-3"><span class="badge badge-danger badge-pill noti-icon-badge">New</span> Orders Received</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="datatable_length">
                            <label>Show <select name="datatable_length" aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="container h-100">
                        <div class="d-flex justify-content-center h-100">
                        <div class="searchbar">
                        <input class="search_input" type="text" name="" placeholder="Search...">
          <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                    </div>
                     </div>
                        </div>
                    </div>
                </div>       
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 285px;">Wholesaler Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 110px;">Location</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Category</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 83px;">View Products List</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($wholesalers->isNotEmpty())
                                        @foreach ($wholesalers as $wholesaler)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    <img src="../assets/images/products/img-2.png" alt="" height="52">
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <a href="{{route('retailer.wholesaler.show', $wholesaler->id)}}" class="d-inline-block align-middle mb-0 product-name">{{$wholesaler->name}}</a>
                                                    </p>
                                                </td>
                                                <td>Sports</td>
                                                <td>
                                                    <a href="{{route('retailer.wholesaler.show', $wholesaler->id)}}" >{{$wholesaler->product_category()}}</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('retailer.wholesaler.show', $wholesaler->id)}}"><i class="far fa-eye text-danger"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 14 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

@endsection