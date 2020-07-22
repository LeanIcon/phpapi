@extends('admin.index')

@section('content')
{{--@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])--}}
<div class="card-header text-center">
    NNURO
  </div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-gradient-primary waves-effect waves-light float-right mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-wholesalers-modal-lg">+ Add New</button>
                {{-- <h4 class="header-title mt-0 mb-3"> {{$pageTitle ?? 'Current Page'}}</h4>  --}}
                
                <h4 class="mt-0 header-title">Wholesalers</h4>
                

                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                   
                        <div class="col-sm-12">
                            <table id="datatable" class="table table-hover" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Contact person</th>
                                        <th>Verifiction Code</th>
                                        <th>Phone</th>
                                        <th>Confirmed Status</th>
                                        <th>Status</th>
                                        <th>View List</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @if ($wholesalers->isNotEmpty())
                                        @foreach ($wholesalers as $wholesaler)
                                            <tr role="row" class="odd">
                                                <td >
                                                    <img src="{{$wholesaler->details->image_url ?? url('admin/assets/images/users/user-4.jpg')}}" alt="" height="52">
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <a href="{{route('retailer.wholesaler.show', $wholesaler->id)}}" class="d-inline-block align-middle mb-0 product-name">{{$wholesaler->name}}</a>
                                                    </p>
                                                </td>
                                                <td>{{$wholesaler->details->location ?? ''}}</td>
                                                <td>
                                                    <a href="{{route('retailer.wholesaler.show', $wholesaler->id)}}">{{$wholesaler->details->contact_person ?? ''}}</a>
                                                </td>
                                                <td>{{$wholesaler->otp ?? ''}}</td>
                                                <td>{{$wholesaler->phone ?? ''}}</td>
                                                <td><span class= "badge badge-soft-{{$wholesaler->phone ? 'success' : 'warning'}}">{{$wholesaler->phone ? 'Confirmed' : 'Pending'}}</span></td>
                                                <td>
                                                    <a href="{{route('approve.users', $wholesaler->id)}}">
                                                        <span class= "badge badge-soft-{{$wholesaler->hasRole('Wholesaler') ? 'success' : 'warning'}}">{{$wholesaler->hasRole('Wholesaler') ? 'Approved' : 'Pending Approval'}}</span></td>
                                                    </a>
                                                <td>
                                                    <a href="{{route('retailer.wholesaler.show', $wholesaler->id)}}"><i class="far fa-eye text-danger"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div> 
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!--  Modal content for the above example -->
<div class="modal fade bs-wholesalers-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Add New Wholesaler</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST"  action="{{route('save.user')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LeadName">Company Name</label>
                                <input type="text" name="name" class="form-control" id="LeadName" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LeadEmail">Email</label>
                                <input type="email" name="email" class="form-control" id="LeadEmail" required="">
                            </div>
                        </div>

                       
                    </div>
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LeadName">Phone</label>
                                <input type="text" name="phone" class="form-control" id="LeadName" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LeadEmail">Region</label>
                                @if (!is_null($regions))
                                <select class="form-control" name="region" id="region" required> 
                                    <option value="">Select Region</option>
                                    @foreach ($regions as $region)
                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LeadName">Location</label>
                                @if (!is_null($locations))
                                    <select class="form-control" name="location" id="location" required>
                                        <option value="">Select Location</option>
                                        {{-- @foreach ($locations as $location)
                                            <option value="{{$location->id}}">{{$location->name}}</option>
                                        @endforeach --}}
                                    </select>
                                    @endif
                            </div>
                        </div>
                    </div>


                    

                    <div class="row">
                        <div class="form-group row">
                            <div class="row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Registration No') }}</label>
                                
                                    <div class="col-md-2">
                                        <div class="input field"> 
                                            <input type="text" class="form-control" placeholder="" value="PC" readonly="readonly" name="PC">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input field"> 
                                            <input type="text" class="form-control" placeholder=""  readonly="readonly" name="RegionCode" id="RegionCode">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input field"> 
                                            <input type="text" class="form-control" placeholder=""  readonly="readonly" name="AccountType" id="AccountType" value="W">
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-2">
                                        <div class="input field">
                                             
                                            <input type="number" name="RegNo" class="form-control" placeholder="Reg Code" min="0000" max="9999" required>
                                        </div>
                                    </div> 
                            </div>

                        </div>
                    </div>
                    <br><br>


                   
                    <input type="hidden" name="type" value="wholesaler">
                    {{-- <input type="hidden" name="password" value="12345678">
                     --}}
                    <button type="submit" class="btn btn-sm btn-primary">Save</button> 
                    <button type="button" onclick="history.back()" class="btn btn-sm btn-danger">Cancel</button>
                 
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 
@endsection

 


@section('page-js') 
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });

    $(document).ready(function(){
        $('select[name="region"]').on('change',function(){
            let regID=$(this).val();

            if(regID){
                $.ajax({
                    url:'/location/getLocations/'+regID,
                    type:'GET',
                    dataType:'JSON',
                    success:function(data){ 
                        $('select[name="location"]').empty();
                        let items = '<option value="">Select Location </option>'; 
                        for (var i = 0; i < data.length; i++) {
                        items += "<option value='" + data[i].name + "'>" + data[i].name + "</option>";
                        }
                        $('#location').empty().append(items);
                        } 
                });
                   
                  $.ajax({
                    url:'/region/getRegionDetails/'+regID,
                    type:'GET',
                    dataType:'JSON',
                    success:function(data){ 
                         $('#RegionCode').val(data[0].code); 
                    }
                });  
            }
        });
    });
 
</script>
@endsection