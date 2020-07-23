@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? ''])
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" onclick="history.back()" class="btn btn-sm btn-danger">Back</button>

                    <h5 class="header-title pb-3 mt-0">Pro-Forma List</h5>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr class="align-self-center">
                                    <th>Wholesaler Name</th>
                                    <th>Status</th>
                                    <th>View Invoice details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($proformaInvoice->isNotEmpty() || !is_null($proformaInvoice))
                                    @foreach ($proformaInvoice as $item)
                                <tr>
                                    <td>
                                        <a href="{{route('invoice.view', $item->id)}}"
                                        class="d-inline-block align-middle mb-0 product-name">{{$item->get_wholesaler->name}}</a>
                                    </td>

                                    <td><span class="badge badge-md badge-boxed  badge-soft-danger">{{$item->status}}</span></td>
                                    <td>
                                        <a href="{{route('invoice.view', $item->id)}}" class="btn btn-info" >VIEW</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            <!--end tr-->
                            </tbody>
                        </table>
                    </div>
                    <!--end table-responsive-->
                </div>
            </div>
        </div>
@endsection