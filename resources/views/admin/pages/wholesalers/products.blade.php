@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a type="button" href="{{route('wholesaler_products.create')}}" class="btn btn-gradient-primary waves-effect waves-light float-right mb-3" >+ Add New</a>
                <h4 class="header-title mt-0 mb-3">All {{$pageTitle ?? 'Current Page'}}</h4> 
                
                <h4 class="mt-0 header-title">Product Stock</h4>
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
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 285px;">Product Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 110px;">Category</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 81px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Avai.Color: activate to sort column ascending" style="width: 156px;">Variations</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 83px;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <img src="../assets/images/products/img-2.png" alt="" height="52">
                                            <p class="d-inline-block align-middle mb-0">
                                                <a href="" class="d-inline-block align-middle mb-0 product-name">Apple Watch</a>
                                                <br>
                                                <span class="text-muted font-13">Size-05 (Model 2019)</span>
                                            </p>
                                        </td>
                                        <td>Sports</td>
                                        <td>$39</td>
                                        <td><span class="badge badge-soft-warning">Stock</span></td>
                                        <td>
                                           5
                                        </td>
                                        <td>
                                            <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                            <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">
                                            <img src="../assets/images/products/img-5.png" alt="" height="52">
                                            <p class="d-inline-block align-middle mb-0">
                                                <a href="" class="d-inline-block align-middle mb-0 product-name">Bata Shoes</a>
                                                <br>
                                                <span class="text-muted font-13">size-08 (Model 2019)</span>
                                            </p>
                                        </td>
                                        <td>Footwear</td>
                                        <td>$49</td>
                                        <td><span class="badge badge-soft-secondary">Stock</span></td>
                                        <td>
                                           2
                                        </td>
                                        <td>
                                            <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                            <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <img src="../assets/images/products/2.jpg" alt="" height="52">
                                            <p class="d-inline-block align-middle mb-0">
                                                <a href="" class="d-inline-block align-middle mb-0 product-name">Best Look Chair</a>
                                                <br>
                                                <span class="text-muted font-13">size-05 (Model 2019)</span>
                                            </p>
                                        </td>
                                        <td>Interior</td>
                                        <td>$39</td>
                                        <td><span class="badge badge-soft-warning">Stock</span></td>
                                        <td>
                                          3
                                        </td>
                                        <td>
                                            <a href=""><i class="far fa-edit text-info mr-1"></i></a>
                                            <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                        </td>
                                    </tr>

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