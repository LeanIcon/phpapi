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
                </div>

                 <div class="row">
                 <div class="col-md-6">
                            <div class="form-group">
                                <label for="status-select" class="mr-2">Category</label>
                                <select name="product_category_id" class="form-control custom-select" id="productCatSelect">
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
                    <div class="col-md-6">
                    <div class="form-group">
                                <label for="status-select" class="mr-2">Generic Name</label>
                                <input type="text" name="generic_name" class="form-control" id="price" value="{{$product->generic_name}}">
                            </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                                <label for="status-select" class="mr-2">Drug Legal Status</label>
                                <input type="text" name="drug_legal status" class="form-control" id="price" value="{{$product->drug_legal_status}}">
                            </div>
                </div>

                
                    </div>
                

                    </div>

           


                    <div class="row" id="selectedDrugCat">
    <div class="col-md-6">
        <div class="form-group">
            <label for="LeadEmail">Dosage Form</label>
            <select name="dosage_form_id" class="form-control custom-select" id="status-select">
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
            <label for="status-select" class="mr-2">Drug Class</label>
            <select name="drug_class_id" class="form-control custom-select" id="status-select">
                <option selected="">Select</option>
            @if (!is_null($drugClass))
                @foreach ($drugClass as $dru)
                    <option value="{{$dru->id}}" @if($dru->id == $product->drug_class_id) {{'selected'}} @endif>{{$dru->name}}</option>
                @endforeach
            @endif
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="LeadName">Drug Strength</label>
            <input type="text" name="strength" class="form-control" id="LeadName" value="{{$product->strength}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="PhoneNo">Packet Size</label>
            <input type="text" name="packet_size" class="form-control" id="price" value="{{$product->packet_size}}">
        </div>
    </div>
</div>


  <!--  <div class="col-md-6">
        <div class="form-group">
            <label for="PhoneNo">Packet Size</label>
            <input type="text" name="packet_size" class="form-control" id="price">
        </div>
    </div> -->

<!--<div class="row" id="selectedEquipCat">
    <div class="col-md-6">
        <div class="form-group">
            <label for="model">Machine / Equipment Model</label>
            <input class="form-control" type="text" name="model" id="model">
        </div>
    </div>
</div> -->
                    

           
            </div>            

     <!--<div class="row" id="selectedEquipCat">
    <div class="col-md-12">
        <div class="form-group">
            <label for="model">Machine / Equipment Model</label>
            <input class="form-control" type="text" name="model" id="model">
        </div>
    </div>
</div>  -->
                         

                
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
            width: '100%',
            // ajax: {
            //     url: 'https://api.github.com/orgs/select2/repos',
            //     data: function (params) {
            //     var query = {
            //         search: params.term,
            //         type: 'public'
            //     }

            //     // Query parameters will be ?search=[term]&type=public
            //     return query;
            //     }
            // }
                    }); 
    }
    </script>
@endsection