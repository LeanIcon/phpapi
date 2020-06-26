@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle])
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
<script type="text/javascript">
   var window:Window 
    window.onload = notifyMe;
    </script>
 <style>
.searchbar{
    margin-bottom: auto;
    margin-top: auto;
    height: 50px;
    background-color: white;
    border-radius: 30px;
    padding: 10px;
    }
https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css
    .search_input{
    color: white;
    border: 0;
    outline: 0;
    background: none;
    width: 0;
    caret-color:transparent;
    line-height: 40px;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
    padding: 0 10px;
    width: 200px;
    caret-color:green;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon{
    background: green;
    color: #e74c3c;
    }

    .search_icon{
    height: 40px;
    width: 40px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color:green;
    text-decoration:none;
    }

    i.fas {
  
  display: inline-block;
  border-radius: 60px;
  box-shadow: 0px 0px 2px #888;
  padding: 0.5em 0.6em;

}

.card-eco .card-eco-icon.bg-icon-warning {
    background-color: red;
    -webkit-box-shadow: 0px 5px 5px 0.25px rgba(255, 184, 34, 0.5);
    box-shadow: 0px 5px 5px 0.25px rgba(255, 184, 34, 0.5);
}

.page-wrapper {
    padding-top: 50px;
}
    </style>


<div class="row">
<div class="col-lg-6 tags p-b-2">
    <?php
    /* This sets the $time variable to the current hour in the 24 hour clock format */
    $time = date("H");
    /* Set the $timezone variable to become the current timezone */
    $timezone = date("e");
    /* If the time is less than 1200 hours, show good morning */
    if ($time < "12") {
        echo "<h3 style= font-family:lora;>".  "Good morning" . " ".Auth::user()->firstname .","."</h3>";
    } else
    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
    if ($time >= "12" && $time < "17") {
        echo "<h3 style= font-family:lora;>". "Good afternoon" . " " . Auth::user()->firstname .","."</h3>";
    } else
    /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
    if ($time >= "17" && $time < "19") {
        echo "Good evening";
    } else
    /* Finally, show good night if the time is greater than or equal to 1900 hours */
    if ($time >= "19") {
        echo "<h3 style= font-family:lora;>". "Good evening" . " " . Auth::user()->firstname .","."</h3>";
    }
    ?>
                    <h1 style="font-size: 50px; font-family:lora;"> Welcome! </h1>
                   <!-- <span class="badge badge-danger badge-pill noti-icon-badge"><a href="{{ route('wholesaler_expiryproducts') }}">Expiring Products</a></span> -->
                </div>
    <div class="col-lg-3">
        <a href="{{route('wholesaler_products.index')}}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Total Products</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-purple">{{$products->count()}}</h3>
                    <i class="dripicons-user-group card-eco-icon bg-icon-purple align-self-center"></i>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div>
</a>
    <div class="col-lg-3">
        <a href="{{route('wholesaler.purchaseorderlist') }}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Purchase Orders Received</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-pink">{{$purchaseOrders->count()}}</h3>
                    <i class="dripicons-cart card-eco-icon bg-icon-pink align-self-center"></i>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</a>

<div class="col-lg-6 tags p-b-2">

                </div>
    <div class="col-lg-3">
        <a href="{{ route('wholesaler.purchaseorderinvoice') }}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Pro forma-Invoice</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-purple">{{$proforminvoices->count()}}</h3>
                    <i class="dripicons-document-new card-eco-icon bg-icon-secondary align-self-center"></i>
                </div>                                   
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end -->
</a>

   <div class="col-lg-3">
        <a href="{{ route('wholesaler.invoice') }}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Invoices</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-purple"></h3>
                    <i class="dripicons-wallet card-eco-icon bg-icon-warning  align-self-center"></i>
                </div>
            </div><!--end card-body-->
        </div><!--end card--></a>
    </div><!--end col-->
</div> 
<!--NOTIFICATION SYSTEM-->

<button onclick="notifyMe()">Notify me!</button>
@if (Session::get('notify') == 0)
    @if ($pendingPurchaseOrders->isNotEmpty())
    @foreach ($pendingPurchaseOrders as $pendingPurchaseOrder)
<script>
var retailers = @json($pendingPurchaseOrder->retailer->name);
            var options = {
                    body: "New Order from "+ retailers,
                    icon: "https://nnuro.com/assets/img/logo.png",
                    dir : "ltr"
                    
                 };
              
 notification = new Notification("Nnuro Desktop Notification", options);


</script>
@endforeach
@endif
@endif
{{-- @if (Session::get('notify') == 0)
    @if ($purchaseInvoices->isNotEmpty())
    @foreach ($purchaseInvoices as $purchaseInvoice)
<script>
var retailers = @json($purchaseInvoice->retailer->name);
            var options = {
                    body: "Pro Forma Invoice Accepted by "+ retailers,
                    icon: "https://nnuro.com/assets/img/logo.png",
                    dir : "ltr"
                    
                 };
              
 notification = new Notification("Nnuro Desktop Notification", options);


</script>
@endforeach
@endif
@endif --}}
@if ($purchaseOrders->isNotEmpty())
                                        @foreach ($purchaseOrders as $purchaseOrder)
                                       
   <!--CURRENTLY USING UP TO THIS END-->                                                                 
<script>
    function notifyMe() {
      if (!("Notification" in window)) {
        alert("This browser does not support desktop notification");
      }
      else if (Notification.permission === "granted") {
            var options = {
                    body: "You will now receive notifications",
                    icon: "https://nnuro.com/assets/img/logo.png",
                    dir : "ltr"
                 };
              var notification = new Notification("Hi there",options);
      }
      else if (Notification.permission !== 'denied') {
        Notification.requestPermission(function (permission) {
          if (!('permission' in Notification)) {
            Notification.permission = permission;
          }
       
          if (permission === "granted") {
            var options = {
                  body: "This is the body of the notification",
                  icon: "https://nnuro.com/assets/img/logo.png",
                  dir : "ltr"
              };
            var notification = new Notification("Hi there",options);
          }
        });
      }
    }
    </script>
       @endforeach
       @endif   
<!--NOTIFICATION SYSTEM-->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body order-list">
              <!--  <button type="button" class="btn btn-primary btn-sm px-4 mt-0 mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg2">
                    <i class="mdi mdi-plus-circle-outline mr-2"></i>New Room Allotment</button>-->

                <h4 class="header-title mt-0 mb-3"><span class="badge badge-danger badge-pill noti-icon-badge">New</span> Orders Received</h4>
                     
                        <div class="col-sm-12">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th> Purchase ID</th>
                                        <th>Reatailer Name</th>
                                        <th>Status</th>
                                        <th>View Purchase Order Details</th>
                                        
                                        
                                        
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
                                                <td><span class= "badge badge-soft-{{$purchaseOrder->status == 'approved' ? 'success' : 'warning'}}">{{$purchaseOrder->status}}</span></td>
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

<!--Map Dashboard-->
<!--<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="float-right eco-revene-history justify-content-end">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Today</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Yesterday</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Last Week</a>
                        </li>                                     
                    </ul>
                </div>
                <h4 class="header-title mt-0">Revenue</h4>
                <div class="apexchart-wrapper">
                    <div id="eco-dash1" class="chart-gutters"></div>
                </div>
            </div>--><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    <!--<div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0">Top Globle Sales</h4>
                <div id="world-map-markers" class="dashboard-map drop-shadow-map"></div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="mt-3">
                            <span class="text-info">USA</span>
                            <small class="float-right text-muted ml-3 font-14">81%</small>
                            <div class="progress mt-2" style="height:3px;">
                                <div class="progress-bar bg-pink" role="progressbar" style="width: 81%; border-radius:5px;" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <span class="text-info">Greenland</span>
                            <small class="float-right text-muted ml-3 font-14">68%</small>
                            <div class="progress mt-2" style="height:3px;">
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 68%; border-radius:5px;" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>--><!--end col-->
               <!--     <div class="col-md-5 ml-auto">                                            
                        <div class="mt-3">
                            <span class="text-info">Australia</span>
                            <small class="float-right text-muted ml-3 font-14">48%</small>
                            <div class="progress mt-2" style="height:3px;">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 48%; border-radius:5px;" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <span class="text-info">Brazil</span>
                            <small class="float-right text-muted ml-3 font-14">32%</small>
                            <div class="progress mt-2" style="height:3px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 32%; border-radius:5px;" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>--><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->

@endsection


@section('page-js') 
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>
@endsection