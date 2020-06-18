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
            EDIT PRODUCT
<div class="card-body">
            <form method="POST" action="{{route('product.update', $product)}}" enctype="multipart/form-data">
                @method('PUT')
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
                                <label for="LeadEmail">Manufacturer</label>
                                <select name="manufacturer_id" class="form-control custom-select" id="status-select">
                                    <option selected="">Select</option>
                                    @if (!is_null($manufacturers))
                                        @foreach ($manufacturers as $manufacturer)
                                        <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                </div>

                 <div class="row">
                 <div class="col-md-6">
                            <div class="form-group">
                                <label for="status-select" class="mr-2">Category</label>
                                <select name="product_category_id" class="form-control custom-select" id="productCatSelect">
                                    <option selected="">Select</option>
                                @if (!is_null($productCategory))
                                    @foreach ($productCategory as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                        </div>
                    <div class="col-md-6">
                    <div class="form-group">
                                <label for="status-select" class="mr-2">Dosage Form</label>
                                <select name="dosage_id" class="form-control custom-select" id="status-select">
                                    <option selected="">Select</option>
                                @if (!is_null($dosageForm))
                                    @foreach ($dosageForm as $dosage)
                                        <option value="{{$dosage->id}}">{{$dosage->name}}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                                <label for="status-select" class="mr-2">Drug Class</label>
                                <select name="drug_class_id" class="form-control custom-select" id="status-select">
                                    <option selected="">Select</option>
                                @if (!is_null($drugClass))
                                    @foreach ($drugClass as $drug)
                                        <option value="{{$drug->id}}">{{$drug->name}}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                                <label for="status-select" class="mr-2">Product Category</label>
                                <select name="product_category_id" class="form-control custom-select" id="status-select">
                                    <option selected="">Select</option>
                                @if (!is_null($productCategoryTypes))
                                    @foreach ($productCategoryTypes as $productcat)
                                        <option value="{{$productcat->id}}">{{$productcat->name}}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        @if (!is_null($product))
                            <label for="LeadEmail">Strength</label>
                            <input type="text" class="form-control" id="LeadName" required="" name="strength" value="{{$product->strength}}">

                        @endif 
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        @if (!is_null($product))
                            <label for="LeadEmail">Packet Size</label>
                            <input type="text" class="form-control" id="LeadName" required="" name="packet_size" value="{{$product->packet_size}}">

                        @endif 
                        </div>
                        
                    </div>
                    </div>
                </div>

                <div  style = "margin-right: 50% !important"class="form-group"> 
                <button type="submit"  class="btn btn-sm btn-primary">Save</button>  
                <button type="button" onclick="history.back()" class="btn btn-sm btn-danger">Cancel</button> 
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