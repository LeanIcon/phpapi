<div class="col-lg-{{$size ?? '4'}}">
    <a href="{{$link ?? '#'}}" class="custom-card">
    <div class="card card-eco">
        <div class="card-body">
            <h4 class="title-text mt-0">{{$cardName ?? 'Not Available'}}</h4>
            <div class="d-flex justify-content-between">
                <h3 class="text-purple">{{$dataCount ?? '0'}}</h3>
                <i class="dripicons-medical card-eco-icon bg-icon-purple align-self-center"></i>
            </div>
        </div><!--end card-body-->
    </div><!--end card-->
    </a>
</div><!--end col-->