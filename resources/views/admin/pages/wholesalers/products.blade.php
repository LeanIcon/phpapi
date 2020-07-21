@extends('admin.index')

@section('content')
{{--@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? 'Nnuro']) --}}
<div class="card-header text-center">
    NNURO
  </div>
<div class="row">
    <div class="col-12">
        <div class="card"> <!-- -->
            <div class="card-body">
                <a type="button" href="{{route('product.import')}}" class="btn btn-gradient-primary waves-effect waves-light float-right mb-3 " >UPLOAD</a>

                <a type="button" href="{{route('wholesaler_products.create')}}" class="btn btn-gradient-primary waves-effect waves-light float-right mb-3 mr-3" >+ Add New</a>
                <h4 class="header-title mt-0 mb-3">  {{$pageTitle ?? 'Current Page'}}</h4>  
                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="col-sm-12">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                       <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 110px;">Product Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Product Description</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 81px;">Manufacturer</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Avai.Color: activate to sort column ascending" style="width: 156px;">Pack Size</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Avai.Color: activate to sort column ascending" style="width: 156px;">Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 83px;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @if ($wholesalerProducts->isNotEmpty())
                                    @foreach ($wholesalerProducts as $product)
                                        <tr>
                                            <td> {{$product->product_name}}</td>
                                             <!-- <td> @foreach ($product->products as $item)
                                                {{$item->productDesc()}}
                                            @endforeach </td>  -->
                                            <td> {{$product->productDesc()}} {{$product->active_ingredient}} </td>
                                            <!-- <td> @foreach ($product->products as $item)
                                                {{$item->manufacturer->name ?? $item->manufacturer_slug}}
                                            @endforeach </td> -->
                                            <td> {{$product->manufacturer}}</td>
                                            <!-- <td> @foreach ($product->products as $item)
                                                {{$item->packet_size}}
                                            @endforeach </td> -->
                                            <td>{{$product->packet_size}}</td>
                                            <td>{{$product->formattedPrice()}}  </td>
                                            

                                            <td>
                                            <a href="{{route('wholesaler_products.edit', $product->id)}}" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                            <a href="{{route('wholesaler_products.show', $product->id)}}" class="mr-2"><i class="fas fa-eye text-info font-16"></i></a>
                                            <a href="" data-toggle="modal" data-target="#exampleModalLong"
                                            >
                                                    <i class="fas fa-trash-alt text-danger font-12"></i>
                                            </a>

                                                <!-- Modal -->
                                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to remove {{$product->product_name}} from your list?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- <div class="modal-body">
                                                Are you Sure you want to delete {{$product->product_name}}
                                                </div> -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="{{route('wholesaler_products.destroy', $product->id) }}" class="btn  btn btn-danger btn-lg active" role="button" aria-pressed="true" onclick="event.preventDefault();
                                                                                                document.getElementById('deleteProd{{$product->id}}').submit();" >Yes!, Remove it</a>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                                <!-- end col -->
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
    

</div>
</div>
@endsection


@section('page-js') 
<

<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });

    
</script>
@endsection