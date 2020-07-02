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
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Region</a></li>
                </ol>
            </div>
            {{-- <h4 class="page-title">Edit Region</h4> --}}
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-lg-8 card">
        <div class="card-header">
            Edit Region
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('region.update', $postRegion->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="PhoneNo">Name of Region</label>
                            <input type="text" class="form-control" name="name" value="{{$postRegion->name}}"id="Name" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="regionCode" class="mr-2">Region Code</label>
                        <input type="text" class="form-control" name="code" id="Code" required  value="{{$postRegion->code}}">
                        </div>
                    </div>
                </div> 
                <button type="submit" class="btn btn-sm btn-primary">Save</button>  
                <button type="button" onclick="history.back()" class="btn btn-sm btn-danger">Cancel</button>             
            </form>  
        </div>
    </div>
</div><!--end row-->  
@include('admin.pages.dashboard.modal-page')
</div><!-- container -->
@endsection