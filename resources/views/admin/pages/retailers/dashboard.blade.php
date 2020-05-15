@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle])
<div class="row">
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
        <a href="" class="custom-card">
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

    <div class="col-lg-3">
        <a href="" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Invoice Received</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-secondary">8</h3>
                    <i class="dripicons-jewel card-eco-icon bg-icon-secondary align-self-center"></i>
                </div>                                   
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
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div>
</a>

<div class="row">
                        <div class="col-sm-12">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 285px;">Wholesaler Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 110px;">Location</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Wholesaler Products</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 81px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 83px;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($wholesalers ?? ''->isNotEmpty())
                                        @foreach ($wholesalers as $wholesaler)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    <img src="../assets/images/products/img-2.png" alt="" height="52">
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <a href="" class="d-inline-block align-middle mb-0 product-name">{{$wholesaler->name}}</a>
                                                    </p>
                                                </td>
                                                <td>Sports</td>
                                                <td>
                                                    <a href="{{route('retailer.wholesaler.show', $wholesaler->id)}}" >{{$wholesaler->product_category()}}</a>
                                                </td>
                                                <td><span class="badge badge-soft-warning">Stock</span></td>
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
@endsection