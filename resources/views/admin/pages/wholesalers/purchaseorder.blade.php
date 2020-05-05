@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
<!--New Table start-->
@role('Wholesaler')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-4"><h6 class="mt-0">
                        <b>Retailer Name :</b> Donald Gardner</h6>
                        <h6 class="mt-0"><b>Address :</b> B28 University Street US</h6>
                        <h6 class="m-0"><b>Phone No :</b> +123 456 7890</h6>
                    </div><!--end col-->
                    <div class="col-md-3 mb-3 ml-auto align-self-center">
                        <h6 class="m-0"><b>Location :</b> Dr.Helen White</h6>
                        <h6 class="mb-0"><b>Pharmacy Name:</b> Orthopedic</h6>
                    </div><!--end col-->
                    <div class="col-md-3 ml-auto mb-4">
                        <h6 class="m-0"><b>Invoice No :</b> #1240</h6>
                        <h6 class="mb-0"><b>Admit Date :</b> 11/07/2020</h6>
                        <h6 class="mb-0"><b>Discharge Date :</b> 17/07/2020</h6>
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive project-invoice">
                            <table class="table table-bordered mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Description</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 100px;">Qty</th><th>Amount</th>
                                    </tr><!--end tr-->
                                </thead>
                                <tbody>
                                    <tr><td>1</td>
                                        <td><h5 class="mt-0 mb-1">Pharmacy</h5></td>
                                        <td><input class="form-control" type="number" value="3"></td><td>₵300.00</td></tr><!--end tr-->
                                        <tr><td>2</td>
                                            <td><h5 class="mt-0 mb-1">CT Scan</h5></td>
                                            <td><input class="form-control" type="number" value="1"></td><td>₵200.00</td></tr><!--end tr-->
                                            <tr><td>3</td>
                                                <td><h5 class="mt-0 mb-1">laboratory</h5></td>
                                                <td><input class="form-control" type="number" value="3"></td>
                                                <td>₵300.00</td>
                                            </tr><!--end tr-->
                                            <tr>
                                                <td>4</td>
                                                <td><h5 class="mt-0 mb-1">Medical/Surgical Supplies and Devices</h5></td>
                                                <td><input class="form-control" type="number" value="4"></td>
                                                <td>$5000.00</td></tr><!--end tr-->
                                                <tr><td colspan="2" class="border-0"></td>
                                                    <td class="border-0 font-14"><b>Sub Total</b></td>
                                                    <td class="border-0 font-14"><b>₵5800.00</b></td></tr><!--end tr-->
                                                    <tr><th colspan="2" class="border-0"></th>
                                                        <td class="border-0 font-14"><b>Tax Rate</b></td>
                                                        <td class="border-0 font-14"><b>₵0.00%</b></td></tr><!--end tr-->
                                                        <tr class="bg-black total-amount">
                                                            <th colspan="2" class="border-0"></th>
                                                            <td class="border-0 font-14 text-white"><b>Total</b></td
                                                                ><td class="border-0 font-14 text-white"><b>₵5800.00</b></td></tr><!--end tr-->
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
                                                        <li><small>If account is not paid within 7 days the credits details supplied as confirmation<br>of work undertaken will be charged the agreed quoted fee noted above.</small></li>
                                                    </ul></div><!--end col-->
                                                    <div class="col-lg-6 align-self-end">
                                                        <div class="w-25 float-right">
                                                            <small>Account Manager</small> 
                                                            <img src="../assets/images/signature.png" alt="" class="" height="48"><p class="border-top">Signature</p>
                                                        </div>
                                                    </div><!--end col-->
                                                </div><!--end row--><hr>
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-lg-12 col-xl-6 ml-auto align-self-center">
                                                        <div class="text-center text-muted"><small>Thank you very much for doing business with us. Thanks !</small>
                                                        </div>
                                                    </div><!--end col-->
                                                    <div class="col-lg-12 col-xl-4">
                                                        <div class="float-right d-print-none">
                                                            <a href="javascript:window.print()" class="btn btn-info btn-sm">
                                                                <i class="fa fa-print"></i>
                                                            </a> <a href="#" class="btn btn-primary btn-sm">Process</a> 
                                                            <a href="#" class="btn btn-danger btn-sm">Cancel</a>
                                                        </div>
                                                    </div><!--end col-->
                                                </div><!--end row-->
                                            </div><!--end card-body-->
                                        </div><!--end card-->
                                    </div><!--end col-->
                                </div>

<!--New Table end-->
@endrole


@endsection