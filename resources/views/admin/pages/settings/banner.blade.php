@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h4>Current Banners</h4>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{url('admin/assets/images/products/2.jpg')}}" alt="" class=" mx-auto  d-block" height="400">
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
            <div class="card-footer">
                <div class="quantity mt-3 ">
                    <a href="" class="btn btn-primary text-white px-4 d-inline-block"><i class=""></i>Upload New Banner</a>
                </div>
            </div>
        </div><!--end card-->
    </div><!--end col-->
</div>
@endsection