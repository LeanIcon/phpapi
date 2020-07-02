@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a type="button" href="{{route('product_category_types.create')}}" class="btn btn-gradient-primary waves-effect waves-light float-right mb-3" >+ Add New</a>
                 
                <div class="table-responsive dash-social">
                    <table id="datatable" class="table table-hover">
                        <thead class="thead-light">
                        <tr> 
                            <th>Legal Status</th> 
                            <th>Action</th> 
                        </tr><!--end tr-->
                        </thead>

                        <tbody>
                            @if ($productCategoryTypes->isNotEmpty())
                                @foreach ($productCategoryTypes as $item)
                                <tr role="row" class="odd">
                                    <td class="sorting_1"> 
                                        <p class="d-inline-block align-middle mb-0">
                                            <a href="" class="d-inline-block align-middle mb-0 product-name">{{$item->name}}</a>
                                        </p>
                                    </td>
                                    {{-- <td><span class="badge badge-soft-warning">Active</span></td> --}}
                                    <td>
                                        <a href="{{route('product_category_types.edit', $item->id)}}" class="mr-1"><i class="fas fa-edit text-info font-12"></i></a>
                                        <a href=""><i class="far fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif


                        </tbody>
                    </table>
                </div>
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div><!--end col-->
  

</div><!--end row-->    
 
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