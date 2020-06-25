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
                VIEW PRODUCT
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('wholesaler_products.update', $product)}}" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                                <label for="status-select" class="mr-2">Product</label>
                                <select class="form-control custom-select" name="products_id" disabled>
                                @if (!is_null($products))
                                    @foreach ($products as $prod)
                                        <option value="{{$prod->id}}" @if($prod->id == $product->products_id) {{ 'selected' }}
                                            
                                        @endif >{{$prod->name}}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="LeadEmail">Manufacturer</label>
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
                                <label for="status-select" class="mr-2">Generic Name</label>
                                <select class="form-control custom-select" name="products_id" disabled>
                                @if (!is_null($products))
                                    @foreach ($products as $prod)
                                        <option value="{{$prod->id}}" @if($prod->id == $product->products_id) {{ 'selected' }}
                                            
                                        @endif >{{$prod->generic_name}}</option>
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
                                <input type="text" name="price" class="form-control" id="price" value="{{$product->price}}" disabled>
                            </div>
                        </div>
                       {{-- <div class="col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label for=" ExpiryMonth"> Expiry Month</label>
                                      <select class="form-control custom-select" name="expiry_month" id="" disabled>
                                          <option value=""><?php $month=strtotime($product->expiry_date);$month=date('m',$month); echo $month;?></option>
                                         @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{str_pad($i,2,'0',STR_PAD_LEFT)}}">{{str_pad($i,2,"0",STR_PAD_LEFT)}}</option>
                                         @endfor
                                      </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label for=" ExpiryYear"> Expiry Year</label>
                                      <select class="form-control custom-select" name="expiry_year" id="" disabled> 
                                        <option value=""><?php $year=strtotime($product->expiry_date);$year=date('Y',$year); echo $year;?></option>
                                        @for ($i = 1990; $i <= date('Y')+10 ; $i++)
                                           <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                      </select>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                                <label for="status-select" class="mr-2">Category</label>
                                <select name="products_id" class="form-control custom-select" disabled>
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
                            <div class="form-group">
                            <label for="status-select" class="mr-2">Drug Legal Status</label>
                                <select class="form-control custom-select" name="products_id" disabled>
                                @if (!is_null($products))
                                    @foreach ($products as $prod)
                                        <option value="{{$prod->id}}" @if($prod->id == $product->products_id) {{ 'selected' }}
                                            
                                        @endif >{{$prod->drug_legal_status}}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                        </div>


                        <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                                <label for="status-select" class="mr-2">Strength</label>
                                <select name="products_id" class="form-control custom-select" disabled>
                                   <!-- <option selected="">Select</option> -->
                                   @if (!is_null($products))
                                    @foreach ($products as $prod)
                                        <option value="{{$prod->id}}" @if($prod->id == $product->products_id) {{ 'selected' }}
                                            
                                        @endif >{{$prod->strength}}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="status-select" class="mr-2">Packet Size</label>
                                <select class="form-control custom-select" name="products_id" disabled>
                                @if (!is_null($products))
                                    @foreach ($products as $prod)
                                        <option value="{{$prod->id}}" @if($prod->id == $product->products_id) {{ 'selected' }}
                                            
                                        @endif >{{$prod->packet_size}}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>

                            <div class="form-group">
                            <label for="LeadEmail">Dosage Form</label>
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