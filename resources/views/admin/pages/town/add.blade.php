@extends('admin.index')

@section('content')
<div class="container-fluid">
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">NNURO</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Town</a></li>
                </ol>
            </div>
            <h4 class="page-title">Town</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-lg-8 card">
        <div class="card-header">
            ADD NEW Town
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('town.store')}}" enctype="multipart/form-data" >
                @csrf
               <!-- <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="LeadName">Name</label>
                            <input type="text" class="form-control" id="LeadName" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="LeadEmail">Email</label>
                            <input type="email" class="form-control" id="LeadEmail" required="">
                        </div>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="PhoneNo">Name of Town</label>
                            <input type="text" class="form-control" name="name" id="name" required="">
                        </div>
                    </div>
                    <!--<div class="col-md-6">
                        <div class="form-group">
                            <label for="status-select" class="mr-2">Status</label>
                            <select class="custom-select" name="status" id="status-select">
                                <option selected="">Select</option>
                                <option value="1">Active</option>
                                <option value="2">Pending</option>
                                <option value="3">Changed</option>
                                <option value="4">Deleted</option>
                            </select>
                        </div>
                    </div>-->
                </div> 
                <button type="submit" class="btn btn-sm btn-primary">Save</button>  
                <button type="button" class="btn btn-sm btn-danger">Cancel</button>             
            </form>  
        </div>
    </div>
</div><!--end row-->  
@include('admin.pages.dashboard.modal-page')
</div><!-- container -->
@endsection