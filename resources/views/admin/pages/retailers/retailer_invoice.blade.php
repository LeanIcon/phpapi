@extends('admin.index')

@section('content')
{{--@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? '']) --}}
<div class="card-header text-center">
    NNURO
  </div>
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Payments</h5>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr class="align-self-center">
                                    <th>Purchase Order ID</th>
                                    <th>Wholesaler Name</th>
                                    <th>Status</th>
                                    <th>View Invoice details</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if ($purchaseInvoices->isNotEmpty())
                                    @foreach ($purchaseInvoices as $item)
                            <tr>
                                <td>
                                    <a href="{{route('retailer.orderinvoicedetails', $item->id)}}"
                                    class="d-inline-block align-middle mb-0 product-name">Inv-00{{$item->id}}</a></td>
                                </td>
                                <td>
                                    <a href="{{route('retailer.orderinvoicedetails')}}"
                                    class="d-inline-block align-middle mb-0 product-name">{{$item->get_wholesaler->name}}</a>
                                </td>
                                <td>3/03/2019 4:29 PM</td>
                                <td>
                                    <span class="badge badge-md badge-boxed  badge-soft-danger">{{$item->devlivery_status}}</span>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            <!--end tr-->
    
                            </tbody>
                        </table>
                    </div>
                    <!--end table-responsive-->
                    
                </div>
            </div>
        </div>
    </div>
</div
@endsection