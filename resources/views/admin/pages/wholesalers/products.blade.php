@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
<div class="row">
    <div class="col-12">
        <div class="card"> <!-- -->
            <div class="card-body">
                <a type="button" href="{{route('wholesaler_products.create')}}" class="btn btn-gradient-primary waves-effect waves-light float-right mb-3" >+ Add New</a>
                <h4 class="header-title mt-0 mb-3">  {{$pageTitle ?? 'Current Page'}}</h4>  
                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    
                        <div class="col-sm-12">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                       <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 110px;">Product Description</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Manufacturer</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 81px;">Pack Size</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Avai.Color: activate to sort column ascending" style="width: 156px;">Unit Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Avai.Color: activate to sort column ascending" style="width: 156px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 83px;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @if ($wholesalerProducts->isNotEmpty())
                                    @foreach ($wholesalerProducts as $product)
                                        <tr>
                                            <td> @foreach ($product->products as $item)
                                                {{$item->productDesc()}}
                                            @endforeach </td>
                                            <td> @foreach ($product->products as $item)
                                                {{$item->manufacturer->name ?? $item->manufacturer_slug}}
                                            @endforeach </td>
                                            <td> @foreach ($product->products as $item)
                                                {{$item->packet_size}}
                                            @endforeach </td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->expiry_status}}  </td>

                                            <td>
                                            <a href="{{route('wholesaler_products.edit', $product->id)}}" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                            <a href="{{route('wholesaler_products.show', $product->id)}}" class="mr-2"><i class="fas fa-eye text-info font-16"></i></a>
                                            <a href="{{route('wholesaler_products.destroy', $product->id) }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('deleteProd{{$product->id}}').submit();">
                                                    <i class="fas fa-trash-alt text-danger font-12"></i>
                                            </a>
                                            <form id="deleteProd{{$product->id}}" action="{{route('wholesaler_products.destroy', $product->id)}}" method="POST" style="display: none;">
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
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
@endsection


@section('page-js') 
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>
@endsection