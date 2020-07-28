@extends('admin.index')

@section('content')
{{--@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? '']) --}}

<!--<button type="button" onclick="history.back()" class="btn btn-sm btn-danger">Back</button> -->
<br>
<div class="card-header text-center">
    NNURO
  </div>
  

    @include('admin.pages.retailers.products.list')
@endsection