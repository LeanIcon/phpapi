@extends('admin.index')

@section('content')

<div class="container-fluid ext-center text-md-left">
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-8">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">NNURO</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Products</a></li>
                </ol>
            </div>
            <h4 class="page-title">Products</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-lg-8 card">
        <div class="card-body">
            VIEW PRODUCT
            
<div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                @csrf
               
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="LeadName">Name</label>
                            <input type="text" class="form-control" id="LeadName" required="" name="name" value="{{$product->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Leadphoto">Photo</label>
                            <input type="text" class="form-control" id="Leadphoto" required="" name="photo" value="{{$product->photo}}" >
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="LeadName">Manufacturer ID</label>
                            <input type="number" class="form-control" id="Leadmanid" required="" name = "manufacturers_id" value="{{$product->manufacturers_id}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="LeadEmail">Equipment ID</label>
                            <input type="number" class="form-control" id="Leadeqid" required="" name="equipments_id" value="{{$product->equipments_id}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="LeadName">Other Products ID</label>
                            <input type="number" class="form-control" id="Leadproductid" required="" name="other_products_id" value="{{$product->other_products_id}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="LeadEmail">Product Category ID</label>
                            <input type="number" class="form-control" id="Leadnumber" required="" product_category_id="product_category_id" value="{{$product->product_category_id}}">
                        </div>
                    </div>
                </div>

                             
            </form>  
        </div>
    </div>
</div>
</div><!--end row--> 
</div>

</style>
@include('admin.pages.dashboard.modal-page')
</div><!-- container -->
@endsection