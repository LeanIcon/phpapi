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
            
<div class="card-body">
            <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                @csrf
               
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="LeadName">Name</label>
                            <input type="text" class="form-control" id="LeadName" required="" name="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Leadphoto">Photo</label>
                            <input type="file" class="form-control" id="Leadphoto" required="" name="photo">
                        </div>
                    </div>
                </div> 

                 <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="LeadName">Manufacturer ID</label>
                            <input type="number" class="form-control" id="Leadmanid" required="" name = "manufacturers_id">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="LeadEmail">Equipment ID</label>
                            <input type="number" class="form-control" id="Leadeqid" required="" name="equipments_id">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="LeadName">Other Products ID</label>
                            <input type="number" class="form-control" id="Leadproductid" required="" name="other_products_id">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="LeadEmail">Product Category ID</label>
                            <input type="number" class="form-control" id="Leadnumber" required="" name="product_category_id">
                        </div>
                    </div>
                </div>

                <div  style = "margin-right: 50% !important"class="form-group"> 
                <button type="submit"  class="btn btn-sm btn-primary">Save</button>  
                <button type="button" class="btn btn-sm btn-danger">Cancel</button>
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