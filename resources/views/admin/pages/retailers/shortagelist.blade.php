@extends('admin.index')

@section('content')
{{--@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])--}}
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
                                <tr>
                                    <td>PO 0012</td>
                                   
                                    <td>Retailer John</td>
                                    <td>Paid</td>
                                    <td>
                                                    <a href="{{route('retailer.invoicedetails')}}"><i class="far fa-eye text-danger"></i></a>
                                                </td>
                                    
                                </tr>
                                <tr>
                                    <td>PO 0013</td>
                                    
                                    <td>Retailer John</td>
                                    <td>Unpaid</td>
                                    <td>
                                                    <a href=""><i class="far fa-eye text-danger"></i></a>
                                                </td>
                                    
                                </tr>
                                
                                
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