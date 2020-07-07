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
                        <label for="PhoneNo">Name</label>
                                <input type="text" name="product_name" class="form-control" id="name" value="{{$product->product_name}}"disabled>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="PhoneNo">Manufacturer</label>
                                <input type="text" name="manufacturer" class="form-control" id="manufacturer" value="{{$product->manufacturer}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="PhoneNo">Product Code</label>
                                <input type="text" name="product_code" class="form-control" id="product_code" value="{{$product->product_code}}" disabled>
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
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="PhoneNo">Drug Legal Status</label>
                                <input type="text" name="drug_legal_status" class="form-control" id="drug_legal_status" value="{{$product->drug_legal_status}}" disabled>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                            <label for="PhoneNo">Strength</label>
                                <input type="text" name="strength" class="form-control" id="strength" value="{{$product->strength}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="PhoneNo">Packet Size</label>
                                <input type="text" name="packet_size" class="form-control" id="packet_size" value="{{$product->packet_size}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                            <label for="PhoneNo">Dosage Form</label>
                                <input type="text" name="dosage_form" class="form-control" id="dosage_form" value="{{$product->dosage_form}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="PhoneNo">Active Ingredients</label>
                                <input type="text" name="active_ingredient" class="form-control" id="active_ingredient" value="{{$product->active_ingredient}}" disabled>
                            </div>
                        </div>
                    </div>

                    {{--<button type="submit" class="btn btn-sm btn-primary">Save</button>
                    <button type="button" onclick="history.back()" class="btn btn-sm btn-danger">Cancel</button> --}}
            </form>
            </div>

                    <!-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="PhoneNo">Drug Legal Status</label>
                                <input type="text" name="drug_legal_status" class="form-control" id="drug_legal_status" value="{{$product->drug_legal_status}}" disabled>
                            </div>
                        </div> -->
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