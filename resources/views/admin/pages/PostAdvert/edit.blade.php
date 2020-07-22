@extends('admin.index')

@section('content')
<div class="card-header text-center">
    NNURO
  </div>
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">NNURO</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Post Advert</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Post Advert</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-8 card">
            <div class="card-header">
                Edit Advert
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('postadvert.update',$postadvert->id)}}" enctype="multipart/form-data" >
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="LeadName">Title</label>
                                <input type="text" name="title" class="form-control" id="LeadName" value="{{$postadvert->title}}"id="Name" required="">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="LeadEmail">Content</label>
                                <textarea name="body" class="form-control" id="" cols="30" rows="10" id="Name" >{{$postadvert->body}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="LeadEmail">Advert Image</label>
                                <input type="file" class="form-control" name="post_image" id="post_image">
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    <button type="button" onclick="history.back()" class="btn btn-sm btn-danger">Cancel</button>
                </form>
            </div>
        </div>
    </div><!--end row-->
    @include('admin.pages.dashboard.modal-page')
    </div><!-- container -->


@endsection