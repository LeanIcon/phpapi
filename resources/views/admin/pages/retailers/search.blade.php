@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <form method="get" action="{{ route('retailer.search.result') }}" class="form-inline mr-auto">
              <input type="text" name="query" value="{{ isset($searchterm) ? $searchterm : ''  }}" class="form-control col-sm-8"  placeholder="Search events or blog posts..." aria-label="Search">
              <button class="btn aqua-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>
            </form>
            <br>

            <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 50px;"> Name </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Code</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Active Ingredients</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Associated Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Packet Size</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">Strength</th>
                                    </tr>
                                </thead>
    
            @if(isset($searchResults))
                @if ($searchResults-> isEmpty())
                    <h2>Sorry, no results found for the term <b>"{{ $searchterm }}"</b>.</h2>
                @else
                    <h2>There are {{ $searchResults->count() }} results for the term <b>"{{ $searchterm }}"</b></h2>
                    <hr />
                    
                    @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                    <h2>{{ ucwords($type) }}</h2>
    
                    @foreach($modelSearchResults as $searchResult)

                    <tbody>
                    <tr role="row" class="odd">
                        
                            <td>    <a href="{{ $searchResult->url }}">{{ $searchResult->searchable->name }}</a> </td>
                            <td>   <a href="{{ $searchResult->url }}">{{ $searchResult->searchable->code }}</a>  </td>
                            <td>   <a href="{{ $searchResult->url }}">{{ $searchResult->searchable->active_ingredients }}</a>  </td>
                            <td>   <a href="{{ $searchResult->url }}">{{ $searchResult->searchable->associated_name }}</a>  </td>
                            <td>   <a href="{{ $searchResult->url }}">{{ $searchResult->searchable->packet_size }}</a>  </td>
                            <td>   <a href="{{ $searchResult->url }}">{{ $searchResult->searchable->strength }}</a>  </td>
                        
                    </tr>
                    @endforeach
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
@endsection