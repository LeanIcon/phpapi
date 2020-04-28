@extends('admin.index')

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
                <form>
                    {{--  <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="LeadName">Batch Number</label>
                                <input type="text" class="form-control" id="LeadName" required="">
                            </div>
                        </div>
                    </div>  --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LeadEmail">Manufacturer</label>
                                <select class="custom-select" id="status-select">
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
                                <label for="status-select" class="mr-2">Category</label>
                                <select class="custom-select" id="productCatSelect">
                                    <option selected="">Select</option>
                                @if (!is_null($productCategory))
                                    @foreach ($productCategory as $category)
                                        <option value="{{$category['key']}}">{{$category['name']}}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    @include('admin.pages.wholesalers.products.additional_form')

                    {{--  <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status-select" class="mr-2">Product Image</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="PhoneNo">Expiry Date</label>
                                <input type="date" name="expiry_date" class="form-control" id="price" required="">
                            </div>
                        </div>
                    </div>  --}}
            </div>
        </div>
        <div class="col-lg-4 card" style="margin-left:15px;">
            <div class="card-header">
                PRODUCTS COMPONENT (Drugs Only) *
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="Drug Code">Drug Code</label>
                            <input type="text" name="code" class="form-control" id="LeadName" required="required">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Active Ingredients">Active Ingredients (Comma Seperated)</label>
                            <input type="text" name="active_ingredients" class="form-control" id="active_ingredients" required="required">
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="AssociatedName">Associated Name</label>
                            <input type="text" name="associated_name" class="form-control" id="associated_name" required="required">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Strength">Strength</label>
                            <input type="text" name="strength" class="form-control" id="strength" required="required">
                        </div>
                    </div>
                </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="LeadEmail">Type</label>
                                <select class="custom-select" id="status-select">
                                    <option selected="">Select</option>
                                    @if ($manufacturers->isNotEmpty())
                                        @foreach ($manufacturers as $manufacturer)
                                            <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    <button type="button" class="btn btn-sm btn-danger">Cancel</button>
                </div>
            </div>
        </form>
    </div><!--end row-->
    @include('admin.pages.dashboard.modal-page')
    </div><!-- container -->
@endsection
@section('page-js')
    <script>
        $("#selectedDrugCat").hide();
        $("#selectedEquipCat").hide();
        var catslect;
        $(document).ready(function(){
            $("#productCatSelect").change(function(){
                catslect = $("#productCatSelect").val();
                console.log(catslect);
                if(catslect == 'drugs') {
                    $("#selectedDrugCat").show();
                }else{
                    $("#selectedDrugCat").hide();
                }
                if(catslect == 'equipments') {
                    $("#selectedEquipCat").show();
                }else{
                    $("#selectedEquipCat").hide();
                }
            });
        });
    </script>
@endsection