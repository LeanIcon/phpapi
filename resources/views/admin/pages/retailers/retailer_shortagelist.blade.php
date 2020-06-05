@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? '']) 
    @include('admin.pages.retailers.products.list')
@endsection