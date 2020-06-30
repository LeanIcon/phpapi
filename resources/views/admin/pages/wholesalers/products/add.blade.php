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
           @if ($errors->any())
             <div class="alert alert-danger" id="errorDiv">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error}}</li>
                     @endforeach
                 </ul>
            </div>  
           @endif
            <div class="card-body">
                <form method="POST" action="{{route('wholesaler_products.store')}}" enctype="multipart/form-data" >
                    @csrf

                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="batchNumber">Batch Number</label>
                                <input type="text" class="form-control" name="batch_number" id="batch_number" required="">
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="batchNumber">Product Name</label>
                                <input type="text" class="form-control" name="product_name" id="productname" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="PhoneNo">Strength</label>
                            <input type="text" name="strength" class="form-control" id="strength">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="PhoneNo">Pack Size</label>
                            <input type="text" name="packet_size" class="form-control" id="packsize">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="PhoneNo">Product Code</label>
                            <input type="text" name="product_code" class="form-control" id="productcode">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                                <div class="form-group">
                                <label for="PhoneNo">Drug Legal Status</label>
                                <input type="text" name="drug_legal_status" class="form-control" id="druglegalstatus"> 
                                </div>
                            </div>
                    
                    <div class="col-md-4">
                                <div class="form-group">
                                    <label for="manufacturer"> Manufacturer</label>
                                    <input type="text" name="manufacturer" id="manufacturer" class="form-control">
                                </div>
                    </div>
                     
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="PhoneNo">Dosage Form</label>
                                <input type="text" name="dosage_form" class="form-control" id="dosageform">
                            </div>
                    </div>

                    </div>

                   <div class="row">
                   <div class="col-md-2">
                            <div class="form-group">
                                <label for="PhoneNo">Set Price(GHc)</label>
                                <input type="text" name="price" class="form-control price" id="price" required="">
                            </div>
                    </div>
                   </div>
                   

                    <div class="row">
                        
                        <div class="col-md-6">
                             <div class="row">
                              {{--  <div class="col-lg-6">
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
                                        @for ($i = date('Y'); $i <= date('Y')+10 ; $i++)
                                           <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                      </select>
                                    </div>
                                </div> --}}
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


     

    function initSelectTags() {
        $(".manufact-select").select2({
            placeholder: 'Select Category Type',
            width: '100%'
        });
    }


    $(document).on("keypress keyup blur", '.price', function (event) {
        //this.value = this.value.replace(/[^0-9\.]/g,'');
        $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }

    });
    
    setTimeout(function(){
        $("#errorDiv").hide();
    },3000);

    // $(document).ready(function(){
    //     $('select[name="wholesaler_products_id"]').on('change',function(){
    //         let prodID=$(this).val();
    //         if(prodID){
                 
    //             $.ajax({
    //                 url:'/WholesalerProducts/getDetails/'+prodID,
    //                 type:'GET',
    //                 dataType:'JSON',
    //                 success:function(data){
    //                     console.log(data[0]); 
                        
    //                     document.getElementById("strength").defaultValue  = data[0].strength;
    //                     document.getElementById("packsize").defaultValue  = data[0].packet_size;
    //                     document.getElementById("productcode").defaultValue  = data[0].product_code;
    //                     document.getElementById("dosageform").defaultValue  = data[0].dosage_form;
    //                     document.getElementById("manufacturer").defaultValue  = data[0].manufacturer;
    //                     document.getElementById("druglegalstatus").defaultValue  = data[0].drug_legal_status;


    //                     }
                    
    //             });
    //         }
    //     });
    // });
 


    </script>
@endsection