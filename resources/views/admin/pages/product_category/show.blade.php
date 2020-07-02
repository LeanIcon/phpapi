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
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Product Category</a></li>
                </ol>
            </div>
            <h4 class="page-title">Product Category</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-lg-12 card">
        <div class="card-header">
             Product Category
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" >
                @csrf
               <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="LeadName">Name</label>
                            <input type="text" name="name" value="{{$productCategory->name}}" class="form-control" id="LeadName" readonly required="">
                        </div>
                    </div> 
                </div> 
                <button type="button" onclick="history.back()" class="btn btn-sm btn-danger">Go Back</button>             
            </form>  
        </div>
    </div>
</div><!--end row-->  
@include('admin.pages.dashboard.modal-page')
</div><!-- container -->
@endsection