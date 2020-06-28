@if (!Cart::isEmpty())
<div class="col-lg-3">
    <div class="card">
       <a class="btn btn-default" href="{{route('shortagelist.view')}}">VIEW SHORTAGE LIST
           <i class="fa fa-1x far fa-list-alt" > <span class="badge badge-blue" >{{Cart::getContent()->count() ?? '0'}}</span>  </i>
       </a>
    </div>
</div>
@endif
<div class="col-12">
    <div class="card">
        <div class="card-header">
            Create Shortage List
        </div>
        <div class="card-body">
            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                 
                <div class="row">
                    @php
                        $pIds = []
                    @endphp
                    @if (!Cart::isEmpty())
                    @foreach (Cart::getContent() as $item)
                    @php
                        $pIds[] .= $item->id;
                    @endphp

                    @endforeach
                    @endif
                    <div class="col-sm-12">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <tr role="row">
                                     <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 40px;">Product Name</th>  
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 150px;">Product Description</th>
                                   {{-- <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 170px;">Description(Active Ingredient , Strength and Dosage Form)</th> --}}
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Manufacturer</th>
                                    {{-- <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 81px;">Status</th> --}}
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Avai.Color: activate to sort column ascending" style="width: 130px;">Pack Size</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Unit Price</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Avai.Color: activate to sort column ascending" style="width: 130px;">Quantity</th>
                                   @role('Retailer') <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 83px;">Action</th>
                                </tr>@endrole
                            </thead>

                            <tbody>
                        @if ($products)
                            @if ($products->isNotEmpty())
                                @foreach ($products as $product)
                                    <tr>
                                        
                                        <td> {{$product->product_name}} </td>
                                       <!-- <td> @foreach ($product->products as $item)
                                            {{$item->productDesc()}}
                                        @endforeach </td> -->
                                        <td>{{$product->productDesc()}} </td>

                                        <!-- @foreach ($product->products as $item) 
                                            {{$item->manufacturer->name ?? $item->manufacturer_slug}}
                                        @endforeach </td> -->
                                        <td>{{$product->manufacturer}} </td>
                                            <!--@foreach ($product->products as $item)
                                            {{$item->packet_size}}
                                        @endforeach </td> -->
                                        <td>{{$product->packet_size}}</td>

                                        <td>{{$product->formattedPrice()}}</td>
                                        <form method="POST" action="{{route('create.purchase.order')}}" enctype="multipart/form-data" >
                                            <td>
                                                @if (in_array($product->id, $pIds))
                                                    ADDED
                                                @else
                                                <input class="form-control" value="1" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" type="number" name="quantity" id="quantity" />
                                                @endif
                                            </td>
                                            <td>
                                                @csrf
                                                <input class="form-control" value="{{$product->id}}" name="id" type="hidden">
                                                <input class="form-control" value="{{$product->products_id}}" name="products_id" type="hidden">
                                                <input class="form-control" value="{{$product->formattedPrice()}}" name="price" type="hidden">
                                                @role('Retailer') @if (in_array($product->id, $pIds)) 
                                                ADDED
                                                    @else
                                                <button type="submit" class="btn btn-sm btn-primary"> ADD</button>
                                                @endif @endrole
                                            </td>
                                        </form>  
                                    </tr>
                                @endforeach
                            @endif
                        @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    
@section('page-js') 
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>
@endsection
