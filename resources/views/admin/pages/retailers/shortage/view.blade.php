@extends('admin.index')

@section('content')
{{--@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])--}}
<div class="card-header text-center">
    NNURO
  </div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">{{$pageTitle ?? 'Current Page'}}</h4> 

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
                                @include('admin.layouts.components.product-table-header')

                                <tbody>
                                    @if ($shortageListItems->count() > 0)
                                     @foreach ($shortageListItems as $item)
                                     <tr>
                                        <td>{{$item['name']}}</td>
                                        <td>{{$item['description']}}</td>
                                        <td>{{$item['manufacturer']}}</td>
                                        <td>{{$item['packet_size']}}</td>
                                        
                                        <td>
                                            
                                            Actions
                                        </td>
                                        <td><!-- Button trigger modal-->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCart">Raise PO New</button>
                                            
                                            <!-- Modal: modalCart -->
                                            <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                              aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <!--Header-->
                                                  <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">You are raising purchase order to  Oscar</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">×</span>
                                                    </button>
                                                  </div>
                                                  <!--Body-->
                                                  <div class="modal-body">
                                            
                                                    <table class="table table-hover">
                                                      <thead>
                                                        <tr>
                                                          <th>#</th>
                                                          <th>Product name</th>
                                                          <th>Price</th>
                                                          <th>Select</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <tr>
                                                          <th scope="row">1</th>
                                                          <td>Product 1</td>
                                                          <td>100$</td>
                                                          <td><input  type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                          <th scope="row">2</th>
                                                          <td>Product 2</td>
                                                          <td>100$</td>
                                                          <td><input  type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                          <th scope="row">3</th>
                                                          <td>Product 3</td>
                                                          <td>100$</td>
                                                          <td><input  type="checkbox"></td>
                                                        </tr>
                                                        <tr>
                                                          <th scope="row">4</th>
                                                          <td>Product 4</td>
                                                          <td>100$</td>
                                                          <td><input  type="checkbox"></td>
                                                        </tr>
                                                        <tr class="total">
                                                          <th scope="row">5</th>
                                                          <td>Total</td>
                                                          <td>400$</td>
                                                          <td></td>
                                                        </tr>
                                                      </tbody>
                                                    </table>
                                            
                                                  </div>
                                                  <!--Footer-->
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary">Checkout</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- Modal: modalCart --></td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <h4 class="text-center" >No Shortage List Found</h4>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 14 entries</div>
                        </div>
                        {{--  <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!--  Modal content for the above example -->
 
@endsection