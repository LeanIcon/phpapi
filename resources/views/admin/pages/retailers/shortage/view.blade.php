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
                                        <td>{{$item['description']}}</td>
                                        <td>Manufacturer</td>
                                        <td>Packet Size</td>
                                        <td>
                                            <form action="">
                                                <button class="btn btn-primary">
                                                    ADD TO P.O
                                                </button>
                                            </form>
                                            Actions
                                        </td>
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