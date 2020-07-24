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
                    <li class="breadcrumb-item"><a href="javascript:void(0);">{{$pageTitle ?? 'Current Page'}}</a></li>
                </ol>
            </div>
            <h4 class="page-title">{{$pageTitle ?? 'Current Page'}}</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<!-- end page title end breadcrumb -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a type="button" href="{{route('post_category.create')}}" class="btn btn-gradient-primary waves-effect waves-light float-right mb-3" >+ Add New</a>
                <button type="button" onclick="history.back()" class="btn btn-sm btn-danger">Back</button>

                <h4 class="header-title mt-0 mb-3">All {{$pageTitle ?? 'Current Page'}}</h4> 
                <div class="table-responsive dash-social">
                    <table id="datatable" class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr><!--end tr-->
                        </thead>
                        <tbody>
                        @if ($postCategory->isNotEmpty())
                            @foreach ($postCategory as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td> <span class="badge badge-md badge-soft-purple">New Lead</span></td>
                                    <td>
                                        <a href="{{route('post_category.edit', $category->id)}}" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        <a href="{{route('post_category.show', $category->id)}}"><i class="fas fa-eye text-danger font-16"></i></a>
                                        {{-- <a id="deleteAction"><i class="fas fa-trash-alt text-danger font-16"></i></a> --}}
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
</div><!--end row-->  
@include('admin.pages.dashboard.modal-page')
</div><!-- container -->
@endsection


@section('page-js') 
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>
@endsection
