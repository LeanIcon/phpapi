@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
<div class="container-fluid">
    <!-- Page-Title -->
    
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-8 card">
            <div class="card-header">
                ADD NEW PRODUCTS
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="LeadName">Name</label>
                                <input type="text" class="form-control" id="LeadName" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="LeadEmail">Manufacturer</label>
                                <select class="custom-select" id="status-select">
                                    <option selected="">Select</option>
                                            <option value="Manufacturer 1">Manufacturer 1</option>
                                            <option value="Manufacturer 2">Manufacturer 2</option>
                                            <option value="Manufacturer 3">Manufacturer 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="PhoneNo">Price</label>
                                <input type="text" name="price" class="form-control" id="price" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status-select" class="mr-2">Category</label>
                                <select class="custom-select" id="status-select">
                                    <option selected="">Select</option>
                                    <option value="Category 1">Category 1</option>
                                    <option value="Category 2">Category 2</option>
                                    <option value="Category 3">Category 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status-select" class="mr-2">Product Image</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status-select" class="mr-2">Equipment</label>
                                <select class="custom-select" id="status-select">
                                    <option selected="">Select</option>
                                    <option value="Equipment 1">Equipment 1</option>
                                    <option value="Equipment 2">Equipment 2</option>
                                    <option value="Equipment 3">Equipment 3</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <button type="button" class="btn btn-sm btn-primary">Save</button>
                    <button type="button" class="btn btn-sm btn-danger">Cancel</button>
                </form>
            </div>
        </div>
    </div><!--end row-->
    @include('admin.pages.dashboard.modal-page')
    </div><!-- container -->


@endsection