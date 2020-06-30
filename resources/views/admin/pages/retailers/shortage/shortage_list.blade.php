@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle])
<div class="row">
    
    <div class="col-lg-3">
        <div class="card">
           <a class="btn btn-default" href="">SHORTAGE LIST
               <i class="fa fa-1x far fa-list-alt" ></i>
           </a>
        </div>
    </div>

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="datatable_length">
                            <label>Show
                                <select name="datatable_length" aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="datatable_filter" class="dataTables_filter">
                            <label>Search:
                                <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        {{--  <form method="POST" action="{{url('admin/retailer/cart/update')}}" enctype="multipart/form-data" >
                            @method('PUT')
                            @csrf
                        </form>    --}}
                        <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 150px;">Product Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 170px;">Description</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Avai.Color: activate to sort column ascending" style="width: 130px;">Manufacturer</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Price</th>
                                    {{--  <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 120px;">Qty</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 100px;">Action</th>  --}}
                                </tr>
                            </thead>
                            {{--  <p align="right"> <button type="submit" class="btn btn-primary btn-sm px-4 mt-0 mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg2">
                                <i href="" class="mdi mdi-plus-circle-outline mr-2"></i>Update Quantity</button></p>  --}}
                                <form action="{{route('shortagelist.save')}}" method="POST">
                                    @csrf
                                    <p align="right">
                                        <button type="submit" class="btn btn-primary btn-sm px-4 mt-0 mb-3" >
                                        <i href="" class="mdi mdi-plus-circle-outline mr-2"></i>SAVE SHORTAGE LIST</button></p>
                                </form>
                            <tbody>

                        @if (Cart::getContent()->count() > 0)
                            @if (!Cart::isEmpty())
                                @foreach (Cart::getContent() as $item)
                                    <tr>
                                        <td>{{$item->associatedModel->product_name}}</td>
                                        <td>{{$item->associatedModel->productDescription()}} </td>
                                        <td>{{$item->associatedModel->manufacturer ?? ''}}</td>
                                        <td> {{$item->price}}</td>
                                        <form action="{{route('cart.update',$item->id )}}" method="POST">
                                            @method('PUT')
                                        {{--  <td><input class="form-control" value="{{$item->quantity}}" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" type="number" name="quantity" id="quantity" /></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary"> UPDATE</button>
                                                </div>
                                            </form>
                                                <div class="col-lg-4">
                                                    <form action="{{route('cart.destroy', $item->id)}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger"> REMOVE</button>
                                                    </form>
                                                </div>  --}}
                                            </div>
                                    </td>
                                    </tr>
                                    </tr>
                                @endforeach
                            @endif
                        @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 14 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection