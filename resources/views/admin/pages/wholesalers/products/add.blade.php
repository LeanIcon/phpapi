@extends('admin.index')

@section('page-css')
<link href="{{url('admin/assets/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
<div class="container-fluid">
    <!-- Page-Title -->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-7 card">
            <div class="card-header">
                ADD NEW PRODUCTS
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('wholesaler_products.store')}}" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="LeadName">Batch Number</label>
                                <input type="text" class="form-control" name="batch_number" id="LeadName" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LeadEmail">Manufacturer</label>
                                <select class="form-control custom-select" id="status-select">
                                    <option selected="">Select</option>
                                    @if ($manufacturers->isNotEmpty())
                                        @foreach ($manufacturers as $manufacturer)
                                        <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status-select" class="mr-2">Product</label>
                                <select class="form-control custom-select" name="products_id" id="productCatSelect">
                                    <option selected="">Select</option>
                                @if (!is_null($products))
                                    @foreach ($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="PhoneNo">Price</label>
                                <input type="text" name="price" class="form-control" id="price" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label for=" ExpiryMonth"> Expiry Month</label>
                                      <select class="form-control custom-select" name="expiry_month" id="">
                                          <option value="">Select Month</option>
                                         @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{str_pad($i,2,'0',STR_PAD_LEFT)}}">{{str_pad($i,2,"0",STR_PAD_LEFT)}}</option>
                                         @endfor
                                      </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label for=" ExpiryYear"> Expiry Year</label>
                                      <select class="form-control custom-select" name="expiry_year" id="">
                                        <option value="">Select Year</option>
                                        @for ($i = 1990; $i <= date('Y')+10 ; $i++)
                                           <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for=" ExpiryYear"> Type</label>
                                <select class="form-control custom-select" name="type" id="">
                                    @if ($productCategoryTypes->isNotEmpty())
                                        <option></option>
                                        @foreach ($productCategoryTypes as $cattype)
                                            <option value="{{$cattype->id}}">{{$cattype->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                              </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    <button type="button" onclick="history.back()" class="btn btn-sm btn-danger">Cancel</button>
            </form>
            </div>
        </div>
        {{-- <div class="col-lg-4 card" style="margin-left:15px;">
            <div class="card-header">
                PRODUCTS COMPONENT (Drugs Only) *
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="LeadName">Drug Code</label>
                            <input type="text" name="code" class="form-control" id="LeadName" required="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="PhoneNo">Active Ingredients (Comma Seperated)</label>
                            <input type="text" name="active_ingredients" name="price" class="form-control" id="price" required="">
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="LeadName">Associated Name</label>
                            <input type="text" name="associated_name" class="form-control" id="LeadName" required="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="PhoneNo">Strength</label>
                            <input type="text" name="strength" name="price" class="form-control" id="price" required="">
                        </div>
                    </div>
                </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="LeadEmail">Type</label>
                                <select class="custom-select" id="status-select">
                                    <option selected="">Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary">Save</button>
                    <button type="button" class="btn btn-sm btn-danger">Cancel</button>
                </div>
            </div> --}}
    </div><!--end row-->
    @include('admin.pages.dashboard.modal-page')
    </div><!-- container -->
@endsection
@section('page-js')
   <script src="{{url('admin/assets/plugins/select2/select2.min.js')}}"></script>
    <script>
        $("#selectedDrugCat").hide();
        $("#selectedEquipCat").hide();
        var catslect;
        $(document).ready(function(){
            initSelectTags();
            $("#productCatSelect").change(function(){
                console.log(catslect);
                catslect = $("#productCatSelect").val();
                console.log(catslect);
                if(catslect == '1') {
                    $("#selectedDrugCat").show();
                }else{
                    $("#selectedDrugCat").hide();
                }
                if(catslect == '2') {
                    $("#selectedEquipCat").show();
                }else{
                    $("#selectedEquipCat").hide();
                }
            });
        });



    function initSelectTags() {
        $(".manufact-select").select2({
            placeholder: 'Select Category Type',
            width: '100%'
        });
    }
    </script>
@endsection