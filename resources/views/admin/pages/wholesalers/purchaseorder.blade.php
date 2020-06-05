@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
<!--<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <h4 class="header-title mt-0 mb-3">All {{$pageTitle ?? 'Current Page'}}</h4> 
                
                <h4 class="mt-0 header-title">Orders</h4>
                

                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="datatable_length">
                                <label>Show
                                    <select name="datatable_length" aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="datatable_filter" class="dataTables_filter">
                                <label>Search:
                                    <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 50px;"> Purchase ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Description</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Quantity</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Wholesaler</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Manufacturer</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Price</th>
                                        {{-- <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Status</th> --}}
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Created_at</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @if ($orderItems->isNotEmpty())
                                        @foreach ($orderItems as $purchaseOrder)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    <img src="../assets/images/products/img-2.png" alt="" height="52">
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <a href="">
                                                        <span class="badge badge-soft">{{$purchaseOrder->id}} </span>
                                                        </a>
                                                    </p>
                                                </td>
                                                <td> {{$purchaseOrder->info}}</td>
                                                <td> {{$purchaseOrder->quantity}}</td>
                                                <td>{{$purchaseOrder->purchase_order->wholesaler->name}}</td>
                                                <td>
                                                    {{$purchaseOrder->manufacturer}}
                                                </td>
                                                <td> {{$purchaseOrder->price}}  </td>
                                                {{-- <td><span class="badge badge-soft-warning">{{$purchaseOrder->status}}</span></td> --}}
                                                <td> {{$purchaseOrder->created_at}} </td>
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
    </div>-->
<!-- end col -->
</div>
<!--  Modal content for the above example -->
<!--New Table start-->
@role('Wholesaler')
<style>.bg-black {
        background-color: #000 !important;
        color: #fff;
    }</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-4"><h6 class="mt-0">
                            <b>Retailer Name :</b> {{$purchaseOrder->purchase_order->retailer->name}}</h6>
                        <h6 class="mt-0"><b>Email :</b> {{$purchaseOrder->purchase_order->retailer->email}}</h6>
                        <h6 class="m-0"><b>Phone No :</b> {{$purchaseOrder->purchase_order->retailer->phone}}</h6>
                    </div><!--end col-->

                    <div class="col-md-3 ml-auto mb-4">
                        <h6 class="m-0"><b>Invoice No :</b> PO-00{{$purchaseOrder->purchase_order_id}}</h6>
                        <h6 class="mb-0"><b> Date :</b> {{$purchaseOrder->created_at}}</h6>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive project-invoice">
                            <table class="table table-bordered mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th>Product Description</th>
                                    <th>manufacturer</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Price: activate to sort column ascending" style="width: 100px;">Qty
                                    </th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                </tr><!--end tr-->
                                </thead>
                                <tbody>
                                @if ($orderItems->isNotEmpty())
                                @foreach ($orderItems as $purchaseOrder)
                                <tr role="row" class="odd">
                                    <!-- <td class="sorting_1">
                                         <img src="../assets/images/products/img-2.png" alt="" height="52">
                                         <p class="d-inline-block align-middle mb-0">
                                             <a href="">
                                             <span class="badge badge-soft">{{$purchaseOrder->id}} </span>
                                             </a>
                                         </p>
                                     </td>-->
                                    <td><h6 class="mt-0 mb-1">{{$purchaseOrder->info}}</h6></td>
                                    <td><h6 class="mt-0 mb-1">{{$purchaseOrder->manufacturer}}</h6></td>
                                    <td><input class="form-control" type="number" value="{{$purchaseOrder->quantity}}">
                                    </td>
                                    <td> {{$purchaseOrder->price}}</td>
                                    <td>{{$purchaseOrder->quantity*$purchaseOrder->price}}</td>


                                    {{--
                                    <td><span class="badge badge-soft-warning">{{$purchaseOrder->status}}</span></td>
                                    --}}

                                </tr>
                                @endforeach
                                @endif<!--end tr-->
                                <tr>
                                    <td colspan="2" class="border-0"></td>
                                    <td class="border-0"></td>
                                    <td class="border-0 font-14"><b>Sub Total</b></td>
                                    <td class="border-0 font-14"><b>₵{{$purchaseOrder->purchase_order->total}}</b></td>
                                </tr><!--end tr-->
                                <tr>
                                    <th colspan="2" class="border-0"></th>
                                    <td class="border-0"></td>
                                    <td class="border-0 font-14"><b>Tax Rate</b></td>
                                    <td class="border-0 font-14"><b>₵0.00%</b></td>
                                </tr><!--end tr-->
                                <tr class="bg-black total-amount">
                                    <th colspan="2" class="border-0"></th>
                                    <td class="border-0"></td>
                                    <td class="border-0 font-14 text-white"><b>Total</b></td
                                    >
                                    <td class="border-0 font-14 text-white"><b>₵{{$purchaseOrder->purchase_order->total}}</b>
                                    </td>
                                </tr><!--end tr-->
                                </tbody>
                            </table><!--end table-->
                        </div><!--end /div-->
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row justify-content-center">
                    <div class="col-lg-6"><h5 class="mt-4">Terms And Condition :</h5>
                        <ul class="pl-3">
                            <li><small>All accounts are to be paid within 7 days from receipt of invoice.</small></li>
                            <li><small>To be paid by cheque or credit card or direct payment online.</small></li>
                            <li><small>If account is not paid within 7 days the credits details supplied as confirmation<br>of
                                    work undertaken will be charged the agreed quoted fee noted above.</small></li>
                        </ul>
                    </div><!--end col-->
                    <div class="col-lg-6 align-self-end">
                        <div class="w-25 float-right">
                        <form action="{{route('update.purchase.status', $purchaseOrder->purchase_order->id)}}" method="POST" >
                            @csrf
                            <label for="status-select" class="mr-2">Status</label>
                            <select name="status" class="custom-select" id="status-select">
                                <option selected="">{{$purchaseOrder->purchase_order->status}}</option>
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirm</option>
                                <option value="approved">Approve</option>
                                <option value="cancel">Cancel</option>
                            </select>
                            <!--<input class="form-control" value="{{$purchaseOrder->purchase_order->id}}" type="text">-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                <hr>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12 col-xl-6 ml-auto align-self-center">
                        <div class="text-center text-muted"><small>Thank you very much for doing business with us.
                                Thanks !</small>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-12 col-xl-4">
                        <div class="float-right d-print-none">
                            <a href="javascript:window.print()" class="btn btn-info btn-sm">
                                <i class="fa fa-print"></i>
                            </a> 
                            {{--  <a href="#" class="btn btn-primary btn-sm">Process</a>  --}}
                            <button type="submit" class="btn btn-primary" >Process</button>
                            <a href="javascript:history.back()" class="btn btn-danger btn-sm">Cancel</a>
                        </div>
                    </div><!--end col-->
                </form>
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div>

<!--New Table end-->
@endrole


@endsection