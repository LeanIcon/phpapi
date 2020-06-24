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
                            <input type="" class="form-control" id="LeadName" required="" name="name" value="{{$product->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <div class="met-profile-main-pic">
                                        <img src="{{$product->image_url ?? url('admin/assets/images/users/user-4.jpg')}}" width="50%" alt="" class="img-thumbnail">
                                        <span class="fro-profile_main-pic-change">
                                                            <i class="fas fa-camera"></i>
                                                        </span>
                                    </div>
                    </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="LeadName">Manufacturer</label>
                            <select name="manufacturer_id" class="form-control custom-select" id="status-select" disabled>
                                   <!-- <option selected="">Select</option> -->
                                    @if (!is_null($manufacturers))
                                        @foreach ($manufacturers as $manu)
                                        <option value="{{$manu->id}}" @if($manu->id == $product->manufacturer_id) {{ 'selected' }}
                                            
                                        @endif >{{$manu->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="LeadEmail">Product Category</label>
                            <select name="product_category_id" class="form-control custom-select" id="productCatSelect" disabled>
                                   <!-- <option selected="">Select</option> -->
                                @if (!is_null($productCategory))
                                    @foreach ($productCategory as $cat)
                                    <option value="{{$cat->id}}" @if($cat->id == $product->product_category_id) {{ 'selected' }}
                                            
                                            @endif >{{$cat->name}}</option>
                                    
                                    @endforeach
                                @endif
                                </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="LeadName">Dosage Form</label>
                            <select name="dosage_form_id" class="form-control custom-select" id="status-select" disabled>
                <!--<option selected="">Select</option> -->

                @if (!is_null($dosageForm))
                                    @foreach ($dosageForm as $dos)
                                    <option value="{{$dos->id}}" @if($dos->id == $product->dosage_form_id) {{ 'selected' }}
                                            
                                            @endif >{{$dos->name}}</option>
                                    
                                    @endforeach
                                @endif

                
            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="LeadEmail">Drug Class</label>
                            <select name="drug_class_id" class="form-control custom-select" id="status-select" disabled>
                <option selected="">Null</option>
            @if (!is_null($drugClass))
                @foreach ($drugClass as $drug)
                    <option value="{{$drug->id}}">{{$drug->name}}</option>
                @endforeach
            @endif
            </select>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="LeadName">Strength</label>
                            <input type="text" name="strength" class="form-control" id="LeadName"value="{{$product->strength}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="LeadEmail">Packet Size</label>
                            <input type="text" name="packet_size" class="form-control" id="LeadName" value="{{$product->packet_size}}" disabled>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="LeadName">Drug Legal Status</label>
                            <input type="text" name="drug_legal_status" class="form-control" id="LeadName"value="{{$product->drug_legal_status}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="LeadEmail">Generic Name</label>
                            <input type="text" name="generic_name" class="form-control" id="LeadName" value="{{$product->generic_name}}" disabled>
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