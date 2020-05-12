@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])

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
                </div>                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-top-0">PO Id</th>
                                <th class="border-top-0">Retailer</th>
                                <th class="border-top-0">Location</th>
                                <th class="border-top-0">Order Date/Time</th>
                                <th class="border-top-0">Qty</th>                                    
                                <th class="border-top-0">Amount (₵)</th>
                                <th class="border-top-0">Status</th>
                            </tr><!--end tr-->
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="{{route('wholesaler.purchaseorder')}}" class="d-inline-block align-middle mb-0 product-name">001</a>                                 </td>
                                <td>
                                    <a href="{{route('wholesaler.purchaseorder')}}" class="d-inline-block align-middle mb-0 product-name">Darko Oscar</a> 
                                </td>
                                <td>   
                                   Accra                                                            
                                </td>
                                <td>3/03/2019 4:29 PM</td>
                                <td>200</td>                                   
                                <td> ₵750</td>
                                <td>                                                                        
                                    <span class="badge badge-md badge-boxed  badge-soft-success">Shipped</span>
                                </td>
                            </tr><!--end tr-->
                            <tr>
                                <td>
                                    <a href="{{route('wholesaler.purchaseorder')}}" class="d-inline-block align-middle mb-0 product-name">002</a>                                 </td>

                                </td>
                                <td>
                                    <a href="{{route('wholesaler.purchaseorder')}}" class="d-inline-block align-middle mb-0 product-name">Darko Oscar</a> 

                                </td>
                                <td>   
                                    Accra                                                            
                                </td>
                                <td>3/03/2019 4:29 PM</td>
                                <td>200</td>                                   
                                <td> ₵750</td>
                                <td>                                                                        
                                    <span class="badge badge-md badge-boxed  badge-soft-danger">Delivered</span>
                                </td>
                            </tr><!--end tr--> <tr>
                                <td>
                                    <a href="{{route('wholesaler.purchaseorder')}}" class="d-inline-block align-middle mb-0 product-name">003</a>                                 </td>

                                </td>
                                <td>
                                    <a href="{{route('wholesaler.purchaseorder')}}" class="d-inline-block align-middle mb-0 product-name">Darko Oscar</a> 
                                </td>
                                <td>   
                                    Accra                                                            
                                </td>
                                <td>3/03/2019 4:29 PM</td>
                                <td>200</td>                                   
                                <td> ₵750</td>
                                <td>                                                                        
                                    <span class="badge badge-md badge-boxed badge-soft-warning">Pending</span>
                                </td>
                            </tr><!--end tr--> <tr>
                                <td>
                                    <a href="{{route('wholesaler.purchaseorder')}}" class="d-inline-block align-middle mb-0 product-name">004</a>                                 </td>

                                </td>
                                <td>
                                    <a href="{{route('wholesaler.purchaseorder')}}" class="d-inline-block align-middle mb-0 product-name">Darko Oscar</a> 
                                </td>
                                <td>   
                                    Accra                                                            
                                </td>
                                <td>3/03/2019 4:29 PM</td>
                                <td>200</td>                                   
                                <td> ₵750</td>
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