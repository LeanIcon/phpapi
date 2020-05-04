
@extends('admin.index')

@section('content')
@include('admin.layouts.components.breadcrumbs', ['pageTitle' => $pageTitle ?? 'Approve User'])
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                User Details
            </div>
            <div class="card-body">
                <h5>User: </h4>
                    {{$user->name ?? ''}}

                <h5>User Mode: </h4>
                    {{ strtoupper($user->type ?? '')}}
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <div class="modal-body">
                        <form method="POST"  action="{{route('approve.users', $user->id)}}" >
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="LeadName">User</label>
                                        <input type="text" name="firstname" value="{{$user->name ?? ''}}" class="form-control" id="LeadName" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="action" required id="">
                                            <option value="">Select Action</option>
                                            <option value="approve">Approve</option>
                                            <option value="cancel">Cancel</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div><!-- /.modal --> 
@endsection