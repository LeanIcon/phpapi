@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle])
<div class="row">
<a href="{{route('dashboard.wholesalers')}}" class="custom-card">
    <div class="col-lg-4">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Wholesalers</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-purple">{{$wholesalers->count()}}</h3>
                    <i class="dripicons-user-group card-eco-icon bg-icon-purple align-self-center"></i>
                </div>   </a>                                  
                
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    <div class="col-lg-4">
    <a href="{{route('dashboard.retailers')}}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Retailers</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-pink">{{$retailers->count()}}</h3>
                    <i class="dripicons-user-group card-eco-icon bg-icon-purple align-self-center"></i>
                </div>   </a>                                 
                
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    <div class="col-lg-4">
    <a href="{{route('product.index')}}" class="custom-card">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Medical Devices</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="text-secondary">{{$products->count()}}</h3>
                    <i class="dripicons-medical card-eco-icon bg-icon-secondary align-self-center"></i>
                </div>   
</a>                                
                
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    </div>
<div class="row">
    <div class="col-lg-12">
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
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    
                    
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->



@endsection