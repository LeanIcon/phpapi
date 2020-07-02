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
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Drug Legal Status</a></li>
                </ol>
            </div>
            <h4 class="page-title">Drug Legal Status</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-md-12 card">
        <div class="card-header">
            Edit Drug Legal Status
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('product_category_types.update',$productCategoryTypes)}}" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="drugLegalStatus">Drug Legal Status</label>
                        <input type="text" name="name" class="form-control" id="" required="" value="{{$productCategoryTypes ->name}}">
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