@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
<div class="container-fluid">
    <!-- Page-Title -->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body  met-pro-bg">
                    <div class="met-profile">
                        <div class="row">
                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                <div class="met-profile-main">
                                    <div class="met-profile-main-pic">
                                        <img src="{{$details->image_url ?? url('admin/assets/images/users/user-4.jpg')}}" width="80%" alt="" class="rounded-circle">
                                        <span class="fro-profile_main-pic-change">
                                                            <i class="fas fa-camera"></i>
                                                        </span>
                                    </div>
                                    <div class="met-profile_user-detail">
                                        <h5 class="met-user-name">{{$wholesaler->name}}</h5>
                                        <p class="mb-0 met-user-name-post">{{$wholesaler->type}}</p>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-4 ml-auto">
                                <ul class="list-unstyled personal-detail">
                                    <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> phone </b> :{{$wholesaler->phone}}</li>
                                    <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : {{$wholesaler->email}}</li>
                                    <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Location</b> : {{$details->location}}</li>
                                </ul>
                                <!--<div class="button-list btn-social-icon">
                                    <button type="button" class="btn btn-blue btn-round">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" class="btn btn-secondary btn-round ml-2">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                </div>-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end f_profile-->
                </div>
                <!--end card-body-->
                <div class="card-body">
                    <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="education_detail_tab" data-toggle="pill" href="#education_detail">Products</a>
                        </li>
                        @role('Admin')
                        <li class="nav-item">
                            <a class="nav-link" id="general_detail_tab" data-toggle="pill" href="#general_detail">Profile</a>
                        </li>
                        @endrole
                    </ul>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-12">
            <div class="tab-content detail-list" id="pills-tabContent">
                <div class="tab-pane fade " id="general_detail">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                     
                                        <form action="{{route('user.update',$wholesaler->id)}}" method="POST" enctype="multipart/form-data" >
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="LeadName">Contact Person</label>
                                                        <input type="text" name="contact_person"  value="{{$details->contact_person ?? 'Not Available'}}" class="form-control" id="LeadName" required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="LeadName">Contact Person Phone</label>
                                                        <input type="text"  name="contact_person_phone" class="form-control"  value="{{$details->contact_person_phone ?? 'Not Available'}}" id="LeadName" required="">
                                                    </div>
                                                </div> 

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="LeadName">Business Address</label>
                                                        <input type="text" name="business_address" value="{{$details->business_address ?? 'Not Available'}}" class="form-control" id="LeadName" required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="LeadName">Digital Addres</label>
                                                        <input type="text" name="digital_address" class="form-control" value="{{$details->digital_address ?? 'Not Available'}}" id="LeadName" required="">
                                                    </div>
                                                </div>

                                            </div> 
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="LeadName">Reg No.</label>
                                                        <input type="text" name="reg_no" value="{{$details->reg_no ?? 'Not Available'}}" class="form-control" id="LeadName" required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="LeadName">Practise group</label>
                                                        <input type="text" name="practise_group"  value="{{$details->practise_group ?? 'Not Available'}}" class="form-control" id="LeadName" required="">
                                                    </div>
                                                </div> 
                                               
                                            </div> 
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="LeadEmail">Profile Image</label>
                                                        <input type="file" class="form-control" name="profile_image" id="image">
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="LeadName">Region</label>
                                                    <select class="form-control" name="region" id="" disabled="disabled"> 
                                                    <option value="{{$details->town_id}}">{{$selectedRegion[0]->name}}</option>
                                                        @foreach ($regions as $region)

                                                        <option value="{{$region->id}}">{{$region->name}} </option> 
                                                        @endforeach
                                                    </select>

                                                </div>
                                                {{-- <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="LeadName">Location</label>
                                                        <input type="text" name="location" class="form-control" value="{{$details->location ?? 'Not Available'}}" id="LeadName" required="">
                                                    </div>
                                                </div>   --}}
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for ="locations">Location</label>
                                                        <select class="form-control" name="location" id=""> 
                                                        <option value="{{$details->location}}">{{$details->location}}</option>
                                                            @foreach ($locations as $location) 
                                                            <option value="{{$location->name}}">{{$location->name}} </option> 
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>



                                            <button class="btn btn-primary" type="submit" >Submit</button>
                                        </form>
                                    
                                    
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end general detail-->

                <div class="tab-pane fade show active" id="education_detail">
                    <div class="row">
                        @include('admin.layouts.product_layouts.list', ['products' => $products])
                    </div>
                </div>
                <!--end education detail-->

                <div class="tab-pane fade" id="portfolio_detail">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <!-- End portfolio  -->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->

                            <div class="card">
                                <div class="card-body">
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                        <div class="col-lg-4">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4><i class="fas fa-quote-left text-primary"></i></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <!--end portfolio detail-->

                <div class="tab-pane fade" id="settings_detail">
                    <div class="row">
                        <div class="col-lg-12 col-xl-9 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end settings detail-->
            </div>
            <!--end tab-content-->

        </div>
        <!--end col-->
    </div>
    <!--end row-->

</div>

@endsection