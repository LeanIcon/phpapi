@extends('admin.index')
@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
<div class="container">
    <div class="card">
    <div class="row">
        <div class="col-md-12">
            <form method="get" action="{{ route('retailer.search.result') }}" class="form-inline mr-auto">
               
                <input type="text" name="query" value="{{ isset($searchterm) ? $searchterm : ''  }}" class="form-control col-sm-offset-4 col-sm-7"  placeholder="Search for Products here..." aria-label="Search">
                <button class="btn btn-success btn-rounded btn-sm my-0 waves-effect waves-light" type="submit"><i class="fas fa-search"></i></button>
               
                
            </form>
            <br>
            <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th></th>
                                        <th>Wholesaler Name </th>
                                        <th>Product Name</th>
                                        <th>Active Ingredients</th>
                                        <th>Manufacturer</th>
                                        <th>Pack Size</th>
                                        <th>Unit Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead> <tbody>
                                @if(isset($sor))
                @if ($sor-> isEmpty())
                    <h2>Sorry, no products were found with the name <b>"{{ $searchterm }}"</b>.</h2>
                @else
                    <h2> We have found {{ $sor->count() }} products with the name  <b>"{{ $searchterm }}"</b></h2>
                    <hr />
                    @foreach($sor->groupByType() as $type => $modelSearchResults)
                    <!-- <h2>{{ ucwords($type) }}</h2> -->
                    @foreach($modelSearchResults as $searchResult)
                    <tr role="row" class="odd">
                        <td></td>
                        @foreach($wholesalers as $wholesaler)
                            @if ($wholesaler->id == $searchResult->searchable->wholesaler_id)
                                <td><img src="{{$wholesaler->details->image_url ?? url('admin/assets/images/users/user-4.jpg')}}" alt="" height="52"> <a href="{{route('retailer.wholesaler.show', $searchResult->searchable->wholesaler_id)}}"> {{$wholesaler->name}} </a> </td>
                            @endif
                            <!-- @if($searchResult->searchable->wholesaler_id == $wholesaler->id )
                                <td> {{$wholesalers[0]['name']}}</td>
                            @endif -->
                        @endforeach
                            <td>    <a href="{{route('retailer.wholesaler.show', $searchResult->searchable->wholesaler_id)}}">{{ $searchResult->searchable->product_name }}</a> </td>
                            <td>   <a href="{{ $searchResult->url }}">{{ $searchResult->searchable->active_ingredient }} {{ $searchResult->searchable->strength }} {{ $searchResult->searchable->dosage_form }}</a> </td>
                            <td>   <a href="{{ $searchResult->url }}">{{ $searchResult->searchable->manufacturer }}</a>  </td>
                            <td>   <a href="{{ $searchResult->url }}">{{ $searchResult->searchable->packet_size }}</a>  </td>
                            <td>   <a href="{{ $searchResult->url }}">{{ $searchResult->searchable->formattedPrice() }}</a>  </td>
                            <td><a href="{{route('retailer.wholesaler.show', $searchResult->searchable->wholesaler_id)}}" class="btn btn-success"> RAISE P.O</a> </td>
                    </tr>
                    @endforeach
                    @endforeach
                @endif
            @endif
                    </tbody>
            </table>
                </div> <!--   -->
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
<<<<<<< HEAD

@section('page-js') 
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>
@endsection
=======
@section('page-js') 
<script>
    $(document).ready(function() {
        $('#datatable').dataTable({sDom: 'lrtip'});
    });
</script>
@endsection
>>>>>>> dev
