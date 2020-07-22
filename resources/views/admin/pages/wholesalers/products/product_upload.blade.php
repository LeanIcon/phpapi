@extends('admin.index')

@section('content')
{{--@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? '']) --}}
<div class="card-header text-center">
    NNURO
  </div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-6">
                    <div class="card bg-light mt-3">
                        <div class="card-header">
                        <h6 class="font-weight-semibold">DATA IMPORT  - Products Collection</h6>
                        <hr>
                        </div>
                        <div class="card-body">
                            <form action="{{route('product.collection')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" class="form-control">
                                <br>
                                <button class="btn btn-success">Import Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
@endsection


@section('page-js') 
<script>
</script>
@endsection