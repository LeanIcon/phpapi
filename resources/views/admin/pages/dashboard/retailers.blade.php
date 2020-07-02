@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-gradient-primary waves-effect waves-light float-right mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-retailer-modal-lg">+ Add New</button>
                {{-- <h4 class="header-title mt-0 mb-3"> {{$pageTitle ?? 'Current Page'}}</h4>  --}}
                
                <h4 class="mt-0 header-title">Retailers</h4> 
                <!---{{Auth::user()->hasRole('Admin')}} -->
                 

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
                                    @if ($retailers->isNotEmpty())
                                    @foreach ($retailers as $retailer)  
                                        <tr role="row" class="odd">
                                            <td>
                                            <img src="{{$retailer->details->image_url ?? url('admin/assets/images/users/user-4.jpg')}}" alt="" height="52">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="" class="d-inline-block align-middle mb-0 product-name">{{$retailer->name}}</a>
                                                </p>
                                            </td>
                                            <td>{{$retailer->details->location ?? ''}}</td>
                                            <td>{{$retailer->details->contact_person ?? ''}}</td>
                                            <td>{{$retailer->otp ?? ''}}</td>
                                            <td>{{$retailer->phone ?? ''}}</td>
                                            <td><span class= "badge badge-soft-{{$retailer->phone ? 'success' : 'warning'}}">{{$retailer->phone ? 'Confirmed' : 'Pending'}}</span></td>
                                            <td>
                                            <a href="{{route('approve.users', $retailer->id)}}">
                                            <span class="badge badge-soft-{{$retailer->hasRole('Retailer') ? 'success' : 'warning'}}"> {{$retailer->hasRole('Retailer') ? 'Approved': 'Pending Approval'}}</span></td>
                                            </a>
                                            
                                            <td>
                                                <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>
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
<div class="modal fade bs-retailer-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Add New Retailer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST"  action="{{route('save.user')}}" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LeadName">First Name</label>
                                <input type="text" name="firstname" class="form-control" id="LeadName" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LeadEmail">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="LeadEmail" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LeadEmail">Email</label>
                                <input type="email" name="email" class="form-control" id="LeadEmail" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LeadName">Phone</label>
                                <input type="text" name="phone" class="form-control" id="LeadName" required="">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="type" value="retailer">
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    <button type="button" class="btn btn-sm btn-danger">Cancel</button>
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
</script>
@endsection