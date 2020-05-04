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
    <div class="col-lg-8 card">
        <div class="card-header">
            ADD NEW PRODUCT CATEGORY
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('product_category.store')}}" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="productCategory">Category Name</label>
                            <input type="text" name="name" class="form-control" id="productCategory" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status-select" class="mr-2">Type</label>
                            <select class="custom-select" name="status" id="status-select">
                                <option>Select</option>
                                <option value="drugs">Drugs</option>
                                <option value="prescription">Prescription</option>
                            </select>
                        </div>
                    </div>
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