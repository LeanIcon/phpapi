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
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Products</a></li>
                </ol>
            </div>
            <h4 class="page-title">Products</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    @include('admin.layouts.components.stats-card',[$cardName = ' Total Products', $dataCount = $products->count()])
    @include('admin.layouts.components.stats-card', [$cardName = ' Total Drugs', $dataCount = 50])
    @include('admin.layouts.components.stats-card', [$cardName = ' Total Medical Devices', $dataCount = 10])
</div><!--end row-->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a type="button" href="{{route('product.create')}}" class="btn btn-gradient-primary waves-effect waves-light float-right mb-3" >+ Add New</a>
                {{-- <h4 class="header-title mt-0 mb-3">All PRODUCTS</h4>  --}}
                <div class="table-responsive dash-social">
                    <table id="datatable" class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th>Product Name</th>
                            <th>Product Description</th>
                           {{-- <th>Product Description(Active Ingredient , Strength)</th> --}}
                            <th>Manufacturer</th>
                            <th>Pack Size</th>
                            <th>Action</th>

                        </tr><!--end tr-->
                        </thead>

                        <tbody>
                        @if ($products->isNotEmpty())
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->name ?? 'NA'}}</td>
                                    <td>{{$product->productDesc() ?? 'NA'}}</td>
                                    <td>{{$product->manufacturer->name ?? $product->manufacturer_slug}}</td> 
                                    <td> {{$product->packet_size}}</td>
                                    <td>
                                    <a href="{{route('product.edit', $product->id)}}" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                    <a href="{{route('product.show', $product->id)}}" class="mr-2"><i class="fas fa-eye text-info font-16"></i></a>
                                    <a href="{{route('product.destroy', $product->id) }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('deleteProd{{$product->id}}').submit();">
                                                    <i class="fas fa-trash-alt text-danger font-12"></i>
                                            </a>
                                            <form id="deleteProd{{$product->id}}" action="{{route('product.destroy', $product->id)}}" method="POST" style="display: none;">
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                                @csrf
                                            </form>

                                </td>
                                </tr>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div><!--end col-->
</div>
<!--end row-->  
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