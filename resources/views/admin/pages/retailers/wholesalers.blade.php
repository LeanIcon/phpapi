@extends('admin.index')

@section('content')
{{--@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? '']) --}}

<div class="card-header text-center">
    NNURO
  </div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <h4 class="mt-0 header-title">Wholesalers</h4>
                <p class="text-muted mb-4 font-13">
                   Click on "View Products" to raise Purchase Order.
                </p>

                
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th></th> 
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                          
                        
                            @if ($wholesalers->isNotEmpty())
                                    @foreach ($wholesalers as $wholesaler) 
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="col-md-12 col-xl-12">
                                                    <div class="card m-b-30">
                                                        <div class="card-body row">
                                                            <div class="col-6">
                                                                <img src="{{$wholesaler->details->image_url ?? url('admin/assets/images/users/user-4.jpg')}}" alt="" height="52">
                                                                {{-- <a href=""><img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" class="img-fluid rounded-circle w-60"></a> --}}
                                                            </div>
                                                            <div class="col-6 card-title align-self-center mb-0">
                                                                <h5>{{$wholesaler->name}}</h5>
                                                                <p class="m-0">{{$wholesaler->product_category()}}</p>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="card-body">
                                                            <div class="float-right btn-group btn-group-sm">
                                                                <a href="{{route('retailer.wholesaler.show', $wholesaler->id)}}" class="btn btn-primary tooltips"><i class="fa fa-pencil"></i>View Products </a>
                                                                    
                                                            </div>
                                                            <ul class="social-links list-inline mb-0">
                                                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fab fa-facebook"></i></a></li>
                                                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fab fa-skype"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> 
                                    @endforeach
                                @endif 
                    </tbody>
                </table>

                                                    
            </div>
        </div>
                     
    </div>
</div>
         
    <!-- end col -->

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection

@section('page-js') 
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>
@endsection
