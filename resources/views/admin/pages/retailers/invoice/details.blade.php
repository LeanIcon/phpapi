@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
<!--  Modal content for the above examples -->
<style>.bg-black {
    background-color: #000 !important;
    color: #fff;
}</style>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="">
                                                    <h6 class="mb-0"><b>Order Date :</b> {{$purchaseOrder->created_at}}</h6>
                                                    <h6><b>Order ID :</b> PO-00{{$purchaseOrder->purchase_order_id}} </h6>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-md-3">
                                                <div class="float-left">
                                                    <address class="font-13"><strong class="font-14">Sent To :</strong>
                                                        <br><strong class="font-14">Name :</strong> {{$purchaseOrder->get_wholesaler->name}}<br><strong class="font-14">Email:</strong> {{$purchaseOrder->get_wholesaler->email}}<br>
                                                        <abbr title="Phone"><strong class="font-14">Phone Number:</strong></abbr> {{$purchaseOrder->get_wholesaler->phone}}
                                                    </address>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-md-3">
                                                <div class="">
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-md-3">
                                                <div>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive project-invoice">
                                                    <table class="table table-bordered mb-0">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Product Name</th>
                                                                <th>Manufacturer</th>
                                                                <th>Qty</th>
                                                                <th>Price</th>
                                                                <th>Sub Total</th>
                                                            </tr><!--end tr-->
                                                        </thead>
                                                        <tbody>
                                                            @if ($proformaInvoiceItems->isNotEmpty())
                                                            @foreach ($proformaInvoiceItems as $purchaseOrder)
                                                                <tr role="row" class="odd">
                                                                   <!-- <td class="sorting_1">
                                                                        <img src="../assets/images/products/img-2.png" alt="" height="52">
                                                                        <p class="d-inline-block align-middle mb-0">
                                                                            <a href="">
                                                                            <span class="badge badge-soft">{{$purchaseOrder->id}} </span>
                                                                            </a>
                                                                        </p>
                                                                    </td>-->
                                                                    <td> {{$purchaseOrder->info}}</td>
                                                                    <td>
                                                                        {{$purchaseOrder->manufacturer}}
                                                                    </td>

                                                                    <td> {{$purchaseOrder->quantity}}</td>
                                                                    <td> {{$purchaseOrder->price}}  </td>
                                                                    <td>{{$purchaseOrder->quantity*$purchaseOrder->price}} </td>

                                                                </tr>
                                                            @endforeach
                                                        @endif<!--end tr-->

                                                            <tr><td colspan="2" class="border-0"></td>
                                                                <td class="border-0"></td>
                                                                <td class="border-0 font-14 text-dark">
                                                                    <b>Sub Total</b>
                                                                </td>
                                                                <td class="border-0 font-14 text-dark"><b>₵{{$purchaseOrder->purchase_order->total}}</b>
                                                                </td></tr><!--end tr--><tr><th colspan="2" class="border-0"></th>
                                                                    <td class="border-0"></td>
                                                                <td class="border-0 font-14 text-dark"><b>Tax Rate</b>
                                                                </td><td class="border-0 font-14 text-dark"><b>₵0.00%</b></td>
                                                            </tr><!--end tr--><tr class="bg-black text-white">
                                                                <th colspan="2" class="border-0"></th>
                                                                <td class="border-0"></td>
                                                                <td class="border-0 font-14"><b>Total</b></td>
                                                                <td class="border-0 font-14"><b>₵{{$purchaseOrder->purchase_order->total}}</b></td></tr><!--end tr-->
                                                            </tbody>
                                                        </table><!--end table-->
                                                    </div><!--end /div-->
                                                </div><!--end col-->
                                            </div><!--end row-->
                                            <div class="row justify-content-center">
                                                <div class="col-lg-6"><h5 class="mt-4">Terms And Condition :</h5>
                                                    <ul class="pl-3"><li>
                                                        <small class="font-12">All accounts are to be paid within 7 days from receipt of invoice.</small>
                                                    </li>
                                                    <li><small class="font-12">To be paid by cheque or credit card or direct payment online.</small>
                                                    </li>
                                                    <li>
                                                        <small class="font-12">If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.</small>
                                                    </li>
                                                </ul>
                                            </div><!--end col-->
                                            <div class="col-lg-6 align-self-end">
                                                <div class="w-25 float-right"><strong class="font-14">Status :</strong> {{$purchaseOrder->purchase_order->status}}
                                                    <form id="updateProforma" method="POST" >
                                                        <select name="status" class="custom-select" id="selStats"  required >
                                                            <option value="" >Select</option>
                                                            <option value="approve">Approve</option>
                                                            <option value="cancel">Cancel</option>
                                                        </select> <br> <br>
                                                        <button id="updateBtn" type="submit" class="btn btn-primary">Approve</button>
                                                        <input type="text" name="profomId" hidden value="{{$order}}" class="form-control">
                                                    </form>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                        <hr>
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-12 col-xl-4 ml-auto align-self-center">
                                                <div class="text-center"><small class="font-12">Thank you very much for doing business with us. |  {{$purchaseOrder->purchase_order->wholesaler->name}}</small>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-lg-12 col-xl-4">
                                                <div class="float-right d-print-none">
                                                    <a href="javascript:window.print()" class="btn btn-info btn-sm">
                                                        <i class="fa fa-print"></i>
                                                    </a> 
                                                    <a href="#" onclick="history.go(-1)" class="btn btn-primary btn-sm">Back</a> 
                                                    <!--<a href="#" class="btn btn-danger btn-sm">Cancel</a>-->
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div>
@endsection
@section('page-js')
    <script>
        var selectedStatus;
        $(document).ready(function(){
            $("select#selStats").change(function(){
                selectedStatus = $(this).children("option:selected").val();
            });
            var formData = $("#updateProforma").serialize();
            $("#updateBtn").on('click', function(e){
                e.preventDefault(); e.stopPropagation();
                updateProforma(formData + '&status='+selectedStatus)
            })
        });

        function updateProforma(data) {
            console.log(data)
            $.ajax({
                data: data,
                url: "{{url('admin/retailer/proforma/process')}}",
                type: "POST",
                dataType: 'json',
                processData: false,
                success: function(data) {
                    console.log(data);
                    /*window.location.href = "{{route('dashboard.index')}}" */
                },
                error: function(error) {
                    console.log(error.responseJSON);
                }
            }) 
        }
    </script>
@endsection