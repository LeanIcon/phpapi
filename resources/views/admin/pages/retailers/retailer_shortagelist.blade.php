@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? '']) 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body order-list">
              <!--  <button type="button" class="btn btn-primary btn-sm px-4 mt-0 mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg2">
                    <i class="mdi mdi-plus-circle-outline mr-2"></i>New Room Allotment</button>-->

                <h4 class="header-title mt-0 mb-3"><span class="badge badge-danger badge-pill noti-icon-badge"> Pending</span> Purchase Orders</h4>
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
                                <th class="border-top-0">Invoice Id</th>
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
                                    <span class="badge badge-md badge-boxed  badge-soft-danger">pending</span>
                                </td>
                            </tr><!--end tr--> <!--end tr-->
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
                                    <span class="badge badge-md badge-boxed  badge-soft-danger">pending</span>
                                </td>
                            </tr><!--end tr--> <!--end tr-->
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
                                    <span class="badge badge-md badge-boxed  badge-soft-danger">pending</span>
                                </td>
                            </tr><!--end tr--> <!--end tr-->
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
                                    <span class="badge badge-md badge-boxed  badge-soft-danger">pending</span>
                                </td>
                            </tr><!--end tr--> <!--end tr-->
                            
                                                                              
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
    
</div>end row-->

@endsection