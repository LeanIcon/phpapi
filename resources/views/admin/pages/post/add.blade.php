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
                ADD NEW POST
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="LeadName">Title</label>
                                <input type="text" class="form-control" id="LeadName" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LeadEmail">Content</label>
                                <input type="email" class="form-control" id="LeadEmail" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="PhoneNo">Phone No</label>
                                <input type="text" class="form-control" id="PhoneNo" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status-select" class="mr-2">Category</label>
                                <select class="custom-select" id="status-select">
                                    <option selected="">Select</option>
                                    @if ($postCategory->isNotEmpty())
                                        @foreach ($postCategory as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div> 
                    <button type="button" class="btn btn-sm btn-primary">Save</button>  
                    <button type="button" onclick="history.back()" class="btn btn-sm btn-danger">Cancel</button>             
                </form>  
            </div>
        </div>
    </div><!--end row-->  
    @include('admin.pages.dashboard.modal-page')
    </div><!-- container -->


@endsection