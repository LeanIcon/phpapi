@extends('admin.index')

@section('content')
<<<<<<< HEAD
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? '']) 
<button type="button" onclick="history.back()" class="btn btn-sm btn-danger">Back</button>

=======
{{--@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? '']) --}}
<div class="card-header text-center">
    NNURO
  </div>
>>>>>>> dev
    @include('admin.pages.retailers.products.list')
@endsection