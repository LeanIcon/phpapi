@extends('admin.index')

@section('content')

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">NNURO</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Post</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Post</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-8 card">
            <div class="card-header">
                EDIT POST CATEGORY
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('post_category.update', $postCategory->id)}}" enctype="multipart/form-data" >
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="LeadName">Title</label>
                                <input type="text" name="name" value="{{$postCategory->name}}" class="form-control" id="LeadName" required="">
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