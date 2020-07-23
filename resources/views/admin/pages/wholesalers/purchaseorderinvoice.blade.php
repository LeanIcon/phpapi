@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body order-list">
                <!--  <button type="button" class="btn btn-primary btn-sm px-4 mt-0 mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg2">
                      <i class="mdi mdi-plus-circle-outline mr-2"></i>New Room Allotment</button>-->
                      <button type="button" onclick="history.back()" class="btn btn-sm btn-danger">Back</button>

                <h4 class="header-title mt-0 mb-3"><span
                            class="badge badge-danger badge-pill noti-icon-badge"> Orders</span> Purchase Invoice</h4>
               
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="datatable">
                        <thead class="thead-light">
                        <tr>
                            <th class="border-top-0">Invoice</th>
                            <th class="border-top-0">Retailer</th>
                            <th class="border-top-0">Order Date/Time</th>
                            <th class="border-top-0">Delivey Status</th>
                        </tr><!--end tr-->
                        </thead>
                        <tbody>
                            @if ($purchaseInvoices->isNotEmpty())
                                @foreach ($purchaseInvoices as $item)
                        <tr>
                            <td>
                                <a href="{{route('wholesaler.orderinvoicedetails', $item->id)}}"
                                class="d-inline-block align-middle mb-0 product-name">Pro-00{{$item->id}}</a></td>
                            </td>
                            <td>
                                <a href="{{route('wholesaler.orderinvoicedetails')}}"
                                class="d-inline-block align-middle mb-0 product-name">{{$item->get_retailer->name}}</a>
                            </td>
                            <td>{{$item->created_at->format('Y-M-d')}}</td>
                            <td>
                                <span class="badge badge-md badge-boxed  badge-soft-danger">{{$item->devlivery_status}}</span>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        <!--end tr-->

                        </tbody>
                    </table> <!--end table-->
                </div><!--end /div-->
            </div><!--end card-body-->
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
