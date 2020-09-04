@extends('admin.index')

@section('content')
{{--@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle]) --}}

<style>
.scrollable{
  overflow-y: auto;
  max-height: 700px;
}
</style>

<div class="card-header text-center">
    NNURO
  </div>
<div class="row">
<div class="col-lg-6 tags p-b-2">
<?php
    /* This sets the $time variable to the current hour in the 24 hour clock format */
    $time = date("H");
    /* Set the $timezone variable to become the current timezone */
    $timezone = date("e");
    /* If the time is less than 1200 hours, show good morning */
    if ($time < "12") {
        echo "<h3 style= font-family:lora;>".  "Good morning," /*" ".Auth::user()->firstname .",*/ ."</h3>";
    } else
    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
    if ($time >= "12" && $time < "17") {
        echo "<h3 style= font-family:lora;>". "Good afternoon ,"/*. " " . Auth::user()->firstname .",*/ ."</h3>";
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
                    
                </div>
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
        <a href="{{route('retailer.orders')}}" class="custom-card">
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

<div class="col-lg-6 tags p-b-2">

                </div>
    <div class="col-lg-3">
        <a href="{{route('proforma.list')}}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Pro Forma Invoice</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-secondary">{{$proforminvoices->count()}}</h3>
                    <i class="dripicons-document-new card-eco-icon bg-icon-secondary align-self-center"></i>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end -->
</a>

    <div class="col-lg-3">
        <a href="{{route('retailer.retailer_shortagelist')}}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Shortage List</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-warning">{{$shortagelist->count()}}</h3>
                    <i class="dripicons-wallet card-eco-icon bg-icon-warning  align-self-center"></i>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div>
</a> 
<div class="row">
    <div class="col-lg-4">
        {{--  <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="timer-data">
                            <div class="icon-info mt-1 mb-4">
                                <i class="mdi mdi-bullseye bg-soft-success"></i>
                            </div>
                            <h3 class="mt-0 text-dark">45k <span class="font-14">of 70k</span>
                            </h3>
                            <h4 class="mt-0 header-title text-truncate mb-1">Monthly Goal</h4>
                            <p class="text-muted mb-0 text-truncate">It is a long established fact that a reader.</p>
                        </div>
                    </div><!--end col-->
                    <div class="col-5 align-self-center">
                        <div class="mt-4">
                            <span class="text-info">Complate</span>
                             <small class="float-right text-muted ml-3 font-14">62%</small>
                             <div class="progress mt-2" style="height:5px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 62%; border-radius:5px;" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end card-->  --}}
    </div><!--end col-->
    <div class="col-lg-4">
        <div class="card">
            {{--  <div class="card-body">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="timer-data">
                            <div class="icon-info mt-1 mb-4">
                                <i class="mdi mdi-bullseye-arrow bg-soft-pink"></i>
                            </div>
                            <h3 class="mt-0 text-dark">26m <span class="font-14">of 30m</span></h3>
                            <h4 class="mt-0 header-title text-truncate mb-1">Yearly Goal</h4>
                            <p class="text-muted mb-0 text-truncate">It is a long established fact that a reader.</p>
                        </div>
                    </div><!--end col-->
                    <div class="col-5 align-self-center">
                        <div class="mt-4"><span class="text-info">Complate</span> 
                            <small class="float-right text-muted ml-3 font-14">81%</small>
                            <div class="progress mt-2" style="height:5px;">
                                <div class="progress-bar bg-pink" role="progressbar" style="width: 81%; border-radius:5px;" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->  --}}
        </div><!--end card-->
    </div><!--end col-->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body dash-info-carousel">
                <h4 class="mt-0 header-title mb-0">Top Adverts</h4>
                <div id="carousel_1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @if ($postadvert->isNotEmpty())
                        @foreach ($postadvert as $pa)
                           
                        <div class="carousel-item">
                            <div class="media mb-2 mt-3">
                                <div class="user-img-box">
                                    <img class="d-block w-100"src="{{$pa->image}}" alt=""style="width: 70%; height: 290px;"> 
                                   <!-- <img src="../assets/images/flags/french_flag.jpg" alt="" class="flag"> -->
                                   <div class="media-body align-self-center text-truncate ml-3">
                                    <h5 class="mt-0 font-weight-semibold text-dark font-24">{{$pa->title}}</h5>
                                    <p class="font-5 text-success font-weight-semibold">{{$pa->body}}</p>
                                </div>
                                </div>
                                <!-- <div class="media-body align-self-center text-truncate ml-3">
                                    <h4 class="mt-0 font-weight-semibold text-dark font-24">{{$pa->title}}</h4>
                                    <p class="text-muted text-uppercase mb-0 font-12"></p>
                                    <h4 class="font-5 text-success font-weight-semibold">{{$pa->body}}</h4>
                                </div>end media-body -->
                            </div><!--end media-->
                        </div><!--end carousel-item-->@endforeach
                        @endif
                        
                        <div class="carousel-item active">
                            <div class="media mb-2 mt-3">
                                {{--  <div class="user-img-box">
                                    <img src="../assets/images/users/user-6.jpg" alt="" class="rounded-circle">
                                     <img src="../assets/images/flags/spain_flag.jpg" alt="" class="flag">
                                    </div>--}}
                                    <div class="media-body align-self-center text-truncate ml-3">
                                        <h4 class="mt-0 font-weight-semibold text-dark font-24"></h4>
                                        <p class="text-muted text-uppercase mb-0 font-12"></p>
                                        <h4 class="font-18 text-success font-weight-semibold">Call To Advertise</h4>
                                    </div><!--end media-body-->  
                                </div><!--end media-->
                            </div><!--end carousel-item-->
                        </div><!--end carousel-inner--> 
                        <a class="carousel-control-prev" href="#carousel_1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span> 
                            <span class="sr-only">Previous</span> 
                        </a>
                        <a class="carousel-control-next" href="#carousel_1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span> 
                            <span class="sr-only">Next</span>
                        </a>
                    </div><!--end carousel-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div>
<button onclick="notifyMe()">Notify me!</button>
@include('admin.settings.notifypo')

    {{--  <marquee>@if ($postadvert->isNotEmpty())
        @foreach ($postadvert as $pa){{$pa->title}} : {{$pa->body}} |     @endforeach
        @endif</marquee>      --}}
 

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
            <h4 class="mt-0 header-title">Wholesalers</h4>
                <p class="text-muted mb-4 font-13">
                   Click on "View Products" to raise Purchase Order.
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Wholesaler Logo</th>
                                <th>Wholesaler Name</th>
                                <th>Phone Number</th>
                                <th>Location</th>
                                <!-- <th>E-mail</th> -->
                                <th>Action</th>
                            </tr><!--end tr-->
                        </thead>
                        <tbody>
        @if ($wholesalers->isNotEmpty())
                    @foreach ($wholesalers as $wholesaler) 
                            <tr>
                                <td><img src="{{$wholesaler->details->image_url ?? url('admin/assets/images/users/user-4.jpg')}}" alt="" height="52"></td>
                                <td>{{$wholesaler->name}}</td>
                                <td>{{$wholesaler->phone}}</td>
                                    @foreach ($userDetails as $det)
                                        @if($det->users_id == $wholesaler->id )
                                        <td>{{$det->location}}</td>
                                        @endif
                                    @endforeach
                                <!-- <td>{{$wholesaler->email}}</td> -->
                                <td><a class="btn btn-primary btn-lg" href="{{route('retailer.wholesaler.show', $wholesaler->id)}}" role="button" style="font-size: 0.9em;">View Products</a>
                                </td>
                            </tr><!--end tr-->
        @endforeach
            @endif 
                                            </tbody>
                                        </table>
                                <!--INVOICE RECEIVED NOTIFICATION-->
                            @if ($purchaseInvoices->isNotEmpty())
                            @foreach ($purchaseInvoices as $item)
                            <script>
                            var wholesaler = @json($item->get_wholesaler->name);
                                        var options = {
                                                body: "New Invoice from "+ wholesaler,
                                                icon: "http://127.0.0.1:8000/admin/assets/images/NN.png",
                                                dir : "ltr"
                                                
                                            };
                                        
                            notification = new Notification("Nnuro Desktop Notification", options);

                            </script>
                            @endforeach
                            @endif
                            <!--INVOICE RECEIVED NOTIFICATION ENDS HERE-->
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                <div class="scrollable">
                            <h4 class="header-title mt-0 mb-3">Adverts</h4>
                    @if ($postadvert->isNotEmpty())
                        @foreach ($postadvert as $pa)
                                
                                <div class="media mb-2 mt-3">
                                <div class="user-img-box">
                                    <img class="d-block w-100"src="{{$pa->image}}" alt=""style="width: 70%; height: 290px;"> 
                                   <!-- <img src="../assets/images/flags/french_flag.jpg" alt="" class="flag"> -->
                                   <div class="media-body align-self-center text-truncate ml-3">
                                    <h5 class="mt-0 font-weight-semibold text-dark font-24">{{$pa->title}}</h5>
                                    <p class="font-5 text-success font-weight-semibold">{{$pa->body}}</p>
                                </div>
                                </div>
                                <!-- <div class="media-body align-self-center text-truncate ml-3">
                                    <h4 class="mt-0 font-weight-semibold text-dark font-24">{{$pa->title}}</h4>
                                    <p class="text-muted text-uppercase mb-0 font-12"></p>
                                    <h4 class="font-5 text-success font-weight-semibold">{{$pa->body}}</h4>
                                </div>end media-body -->
                            </div><!--end media-->
                                        
                                            
                                           
                            @endforeach
                        @endif         
                                    
                                </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div>
        

@endsection

@section('page-js') 
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>
@endsection
