@extends('admin.index')

@section('content')
{{-- @include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? '']) --}}
<div class="card-header text-center">
    NNURO
  </div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body order-list">
              <!--  <button type="button" class="btn btn-primary btn-sm px-4 mt-0 mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg2">
                    <i class="mdi mdi-plus-circle-outline mr-2"></i>New Room Allotment</button>-->
                    <button type="button" onclick="history.back()" class="btn btn-sm btn-danger">Back</button>

                <h4 class="header-title mt-0 mb-3"><span class="badge badge-danger badge-pill noti-icon-badge">New</span> Orders Received</h4>
                     
                        <div class="col-sm-12">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 285px;"> Purchase ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 110px;">Reatailer Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;"></th>
                                         
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
                     
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
<!--New Table start-->

@endsection

@section('page-js') 
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>
@endsection