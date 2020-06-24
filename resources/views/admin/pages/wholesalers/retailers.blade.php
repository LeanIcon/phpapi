@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
<style>
body{
    margin-top:20px;
    background: #f5f5f5;
}
.card {
    border: none;
    -webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,1.0);
    box-shadow: 0 1px 2px 0 rgba(0,0,0,1.0);
    margin-bottom: 30px;
}
.w-60 {
    width: 60px;
}
h1, h2, h3, h4, h5, h6 {
    margin: 0 0 10px;
    font-weight: 600;
}
.social-links li a {
    -webkit-border-radius: 50%;
    background-color: rgba(89,206,181,.85);
    border-radius: 50%;
    color: #fff;
    display: inline-block;
    height: 30px;
    line-height: 30px;
    text-align: center;
    width: 30px;
    font-size: 12px;
}
a {
    color: #707070;
}
.page-wrapper {
    padding-top: 50px;
}
</style>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3"> {{$pageTitle ?? 'Current Page'}}</h4> 
                
                {{-- <h4 class="mt-0 header-title">Retailers</h4>
                <p class="text-muted mb-4 font-13">
                    Retailers.
                </p> --}}
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                       
                 
                        @if ($retailers->isNotEmpty())
                            @foreach ($retailers as $retailer) 
                             <tr>
                                 <td>
                                <div class="col-md-12 col-xl-12">
                                        <div class="card m-b-30">
                                            <div class="card-body row">
                                                <div class="col-6">
                                                    <a href=""><img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" class="img-fluid rounded-circle w-60"></a>
                                                </div>
                                                <div class="col-6 card-title align-self-center mb-0">
                                                    <h5>Name: {{$retailer->name}}</h5>
                                                    <h5>Phone No: {{$retailer->phone}}</h5>
                                                    <h5>Email: {{$retailer->email}} </h5>
                                                    {{--<p class="m-0">{{$wholesaler->product_category()}}</p> --}}
                                                </div>
                                            </div>
                                        
                                            <div class="card-body">
                                                <div class="float-right btn-group btn-group-sm">
                                                    {{--<a href="{{route('retailer.wholesaler.show', $wholesaler->id)}}" class="btn btn-primary tooltips"><i class="fa fa-pencil"></i>View Products </a> --}}
                                                    
                                                </div>
                                                
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
    <!-- end col -->
</div>

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