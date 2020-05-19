@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle])
<div class="row">
    <div class="col-lg-3">
        <a href="{{ route('wholesaler_products.index') }}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Total Products</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-purple">{{$approvedPurchaseOrders->count()}}</h3>
                    <i class="dripicons-user-group card-eco-icon bg-icon-purple align-self-center"></i>
                </div>
               <!-- <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span>Up From Yesterday</p>
               --></div><!--end card-body-->
        </div><!--end card--></a>
    </div><!--end col-->
    <div class="col-lg-3">
        <a href="{{ route('wholesaler.purchaseorderlist') }}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
               <h4 class="title-text mt-0">Purchase Orders Received</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-purple">{{$purchaseOrders->count()}}</h3>
                        <i class="dripicons-cart card-eco-icon bg-icon-pink align-self-center"></i>
                </div>
                <!--<p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>1.5%</span> Up From Last Week</p>
                --></div><!--end card-body-->
        </div><!--end card--></a>
    </div><!--end col-->
    <div class="col-lg-3">
        <a href="{{ route('wholesaler.purchaseorderinvoice') }}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Invoice</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-purple">{{$approvedPurchaseOrders->count()}}</h3>
                    <i class="dripicons-jewel card-eco-icon bg-icon-secondary align-self-center"></i>
                </div>
                <!--<p class="mb-0 text-muted text-truncate"><span class="text-danger"><i class="mdi mdi-trending-down"></i>3%</span> Down From Last Month</p>
                --></div><!--end card-body-->
        </div><!--end card--></a>
    </div><!--end col-->
    <div class="col-lg-3">
        <a href="{{ route('wholesaler.pendingpurchaseorder') }}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
              <h4 class="title-text mt-0">Pending</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-purple">{{$approvedPurchaseOrders->count()}}</h3>
                    <i class="dripicons-wallet card-eco-icon bg-icon-warning  align-self-center"></i>
                </div>
                <!--<p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>10.5%</span> Up From Yesterday</p>
                --></div><!--end card-body-->
        </div><!--end card--></a>
    </div><!--end col-->
</div><!--end row-->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body order-list">
              <!--  <button type="button" class="btn btn-primary btn-sm px-4 mt-0 mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg2">
                    <i class="mdi mdi-plus-circle-outline mr-2"></i>New Room Allotment</button>-->

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
                        <div id="datatable_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable"></label>
                        </div>
                    </div>
                </div>                <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 285px;"> Purchase ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 110px;">Reatailer Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">View Purchase Order Details</th>
                                        
                                        
                                        
                                    </tr>
                                </thead>

                                <tbody>

                                    @if ($purchaseOrders->isNotEmpty())
                                        @foreach ($purchaseOrders as $purchaseOrder)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    {{-- <img src="../assets/images/products/img-2.png" alt="" height="52"> --}}
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <a href="{{route('wholesaler.order_details', $purchaseOrder->id)}}">
                                                        <span class="badge badge-soft">PO-00{{$purchaseOrder->id}} </span>
                                                        </a>
                                                    </p>
                                                </td>
                                                <td>{{$purchaseOrder->retailer->name}}</td>
                                                <td><span class="badge badge-soft-warning">{{$purchaseOrder->status}}</span></td>
                                                <td>
                                                    <a href="{{route('wholesaler.order_details', $purchaseOrder->id)}}"><i class="far fa-eye text-danger"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
<!--New Table start-->

<!--Map Dashboard-->
<!--<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="float-right eco-revene-history justify-content-end">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Today</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Yesterday</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Last Week</a>
                        </li>                                     
                    </ul>
                </div>
                <h4 class="header-title mt-0">Revenue</h4>
                <div class="apexchart-wrapper">
                    <div id="eco-dash1" class="chart-gutters"></div>
                </div>
            </div>--><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    <!--<div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0">Top Globle Sales</h4>
                <div id="world-map-markers" class="dashboard-map drop-shadow-map"></div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="mt-3">
                            <span class="text-info">USA</span>
                            <small class="float-right text-muted ml-3 font-14">81%</small>
                            <div class="progress mt-2" style="height:3px;">
                                <div class="progress-bar bg-pink" role="progressbar" style="width: 81%; border-radius:5px;" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <span class="text-info">Greenland</span>
                            <small class="float-right text-muted ml-3 font-14">68%</small>
                            <div class="progress mt-2" style="height:3px;">
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 68%; border-radius:5px;" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>--><!--end col-->
               <!--     <div class="col-md-5 ml-auto">                                            
                        <div class="mt-3">
                            <span class="text-info">Australia</span>
                            <small class="float-right text-muted ml-3 font-14">48%</small>
                            <div class="progress mt-2" style="height:3px;">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 48%; border-radius:5px;" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <span class="text-info">Brazil</span>
                            <small class="float-right text-muted ml-3 font-14">32%</small>
                            <div class="progress mt-2" style="height:3px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 32%; border-radius:5px;" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>--><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->

@endsection