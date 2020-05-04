@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
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
                                    <th>Purchase Order Invoice</th>
                                    <th>Payment Type</th>
                                    <th>Paid Date</th>
                                    <th>Amount</th>
                                    <th>Transaction</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>NNU-33443</td>
                                   
                                    <td>Cash</td>
                                    <td>5/8/2018</td>
                                    <td>GHc15,000</td>
                                    <td><span class="badge badge-boxed badge-soft-warning">pending</span></td>
                                </tr>
                                <tr>
                                    <td>NNU-33443</td>
                                    
                                    <td>Cash</td>
                                    <td>15/7/2018</td>
                                    <td>GHc35,000</td>
                                    <td><span class="badge badge-boxed badge-soft-primary">Success</span></td>
                                </tr>
                                <tr>
                                    <td>NNU-33443</td>
                                    
                                    <td>Pioneer</td>
                                    <td>30/9/2018</td>
                                    <td>GHc45,000</td>
                                    <td><span class="badge badge-boxed badge-soft-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>NNU-33443</td>
                                    
                                    <td>Paypal</td>
                                    <td>2/6/2018</td>
                                    <td>GHc70,000</td>
                                    <td><span class="badge badge-boxed badge-soft-warning">Success</span></td>
                                </tr>
                                <tr>
                                    <td>NNU-33443</td>
                                    
                                    <td>Paypal</td>
                                    <td>5/8/2018</td>
                                    <td>GHc15,000</td>
                                    <td><span class="badge badge-boxed badge-soft-primary">pending</span></td>
                                </tr>
                                <tr>
                                    <td>NNU-33443</td>
                                    
                                    <td>Paypal</td>
                                    <td>15/7/2018</td>
                                    <td>GHc35,000</td>
                                    <td><span class="badge badge-boxed badge-soft-primary">Success</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end table-responsive-->
                    <div class="pt-3 border-top text-right"><a href="#" class="text-primary">View all <i class="mdi mdi-arrow-right"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div
@endsection