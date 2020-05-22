@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a type="button" href="{{route('wholesaler_products.create')}}" class="btn btn-gradient-primary waves-effect waves-light float-right mb-3" >+ Add New</a>
                <h4 class="header-title mt-0 mb-3">All {{$pageTitle ?? 'Current Page'}}</h4> 
                
                <h4 class="mt-0 header-title">Expiring Products</h4>
                <p class="text-muted mb-4 font-13">
                    Available all products.
                </p>

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
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Batch Number</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 150px;">Product Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 110px;">Description</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 81px;">Expiry Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Avai.Color: activate to sort column ascending" style="width: 156px;">Manufacturer</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 83px;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($wholesalerProducts->isNotEmpty())
                                    @foreach ($wholesalerProducts as $product)
                                    <?php $expiredate= date('Y-m-d', strtotime('-3 month'));?>
                                    <?php $month=strtotime($product->expiry_date);$month=date('Y-m-d',$month);?>
                                    @if ($month <= $expiredate)
                                        <tr>
                                            <td>{{$product->batch_number}}</td>
                                            <td>{{$product->id}} | {{$product->products->name}}</td>
                                            <td> {{$product->products->active_ingredients}}, {{$product->products->strength}}, {{$product->products->packet_size}}</td>
                                            <td>{{$product->price}}</td>
                                            <td><?php $months=strtotime($product->expiry_date);$months=date('Y-m-d',$months); echo $months?></td>
                                            <td>{{$product->products->manufacturers->name}} </td>
                                            <td> 
                                            <a href="{{route('wholesaler_products.edit', $product->id)}}" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                            <a href="{{route('wholesaler_products.edit', $product->id)}}" class="mr-2"><i class="fas fa-eye text-info font-16"></i></a>
                                            {{-- <a id="deleteAction"><i class="fas fa-trash-alt text-danger font-16"></i></a> --}}
                                        </td>
                                        </tr>
                                        </tr>
                                        @endif  
                                    @endforeach
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
    <!-- end col -->
</div>
@endsection