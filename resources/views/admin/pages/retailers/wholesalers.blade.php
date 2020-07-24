@extends('admin.index')

@section('content')
{{--@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? '']) --}}

<style>
.scrollable{
  overflow-y: auto;
  max-height: 700px;
}
</style>

<div class="card-header text-center">
    NNURO
  </div>

  <div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
            <h4 class="mt-0 header-title">Wholesalers</h4>
                <p class="text-muted mb-4 font-13">
                   Click on "View Products" to raise Purchase Order.
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Wholesaler Logo</th>
                                <th>Wholesaler Name</th>
                                <th>Phone Number</th>
                                <th>Location</th>
                                <!-- <th>E-mail</th> -->
                                <th>Action</th>
                            </tr><!--end tr-->
                        </thead>
                        <tbody>
        @if ($wholesalers->isNotEmpty())
                    @foreach ($wholesalers as $wholesaler) 
                            <tr>
                                <td><img src="{{$wholesaler->details->image_url ?? url('admin/assets/images/users/user-4.jpg')}}" alt="" height="52"></td>
                                <td>{{$wholesaler->name}}</td>
                                <td>{{$wholesaler->phone}}</td>
                                    @foreach ($userDetails as $det)
                                        @if($det->users_id == $wholesaler->id )
                                        <td>{{$det->location}}</td>
                                        @endif
                                    @endforeach
                                <!-- <td>{{$wholesaler->email}}</td> -->
                                <td><a class="btn btn-primary btn-lg" href="{{route('retailer.wholesaler.show', $wholesaler->id)}}" role="button" style="font-size: 0.9em;">View Products</a>
                                </td>
                            </tr><!--end tr-->
        @endforeach
            @endif 
                                            </tbody>
                                        </table>
                               
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                <div class="scrollable">
                            <h4 class="header-title mt-0 mb-3">Adverts</h4>
                    @if ($postadvert->isNotEmpty())
                        @foreach ($postadvert as $pa)
                                
                                <div class="media mb-2 mt-3">
                                <div class="user-img-box">
                                    <img class="d-block w-100"src="{{$pa->image}}" alt=""style="width: 70%; height: 290px;"> 
                                   <!-- <img src="../assets/images/flags/french_flag.jpg" alt="" class="flag"> -->
                                   <div class="media-body align-self-center text-truncate ml-3">
                                    <h5 class="mt-0 font-weight-semibold text-dark font-24">{{$pa->title}}</h5>
                                    <p class="font-5 text-success font-weight-semibold">{{$pa->body}}</p>
                                </div>
                                </div>
                                <!-- <div class="media-body align-self-center text-truncate ml-3">
                                    <h4 class="mt-0 font-weight-semibold text-dark font-24">{{$pa->title}}</h4>
                                    <p class="text-muted text-uppercase mb-0 font-12"></p>
                                    <h4 class="font-5 text-success font-weight-semibold">{{$pa->body}}</h4>
                                </div>end media-body -->
                            </div><!--end media-->
                                        
                                            
                                           
                            @endforeach
                        @endif         
                                    
                                </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div>
         
    <!-- end col -->

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection

@section('page-js') 
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>
@endsection
