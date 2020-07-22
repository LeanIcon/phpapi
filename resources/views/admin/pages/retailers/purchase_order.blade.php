@extends('admin.index')

@section('content')
{{--@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? '']) --}}
<div class="card-header text-center">
    NNURO
  </div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <h4 class="header-title mt-0 mb-3">All {{$pageTitle ?? 'Current Page'}}</h4> 
                
                <h4 class="mt-0 header-title">Orders</h4>
                

                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                     
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 285px;"> Purchase ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 110px;">Wholesaler Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">View Details</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    @if ($purchaseOrders->isNotEmpty())
                                        @foreach ($purchaseOrders as $purchaseOrder)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    {{-- <img src="../assets/images/products/img-2.png" alt="" height="52"> --}}
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <a href="{{route('retailer.order_details', $purchaseOrder->id)}}">
                                                        <span class="badge badge-soft">PO-00{{$purchaseOrder->id}} </span>
                                                        </a>
                                                    </p>
                                                </td>
                                                <td>{{$purchaseOrder->wholesaler->name}}</td>
                                                <td><span class="badge badge-soft-warning">{{$purchaseOrder->status}}</span></td>
                                                <td>
                                                    <a href="{{route('retailer.order_details', $purchaseOrder->id)}}"><i class="far fa-eye text-danger"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                     
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!--  Modal content for the above example -->
 
@endsection
@section('page-js') 
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>
@endsection
