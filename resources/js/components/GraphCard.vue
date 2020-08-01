<template>
    <div class="card">
        <div class="card-body">
            <div class="float-right d-none d-md-inline-block">
                <div class="btn-group mb-2">
                    <button type="button" class="btn btn-sm btn-light">Today</button>
                    <button type="button" class="btn btn-sm btn-light active">Weekly</button>
                    <button type="button" class="btn btn-sm btn-light">Monthly</button>
                </div>
            </div>
            <h4 class="card-title mb-4">Revenue Analytics</h4>
        </div>

        <div class="card-body border-top text-center">
            <div class="row">
                <div class="col-sm-4">
                    <div class="d-inline-flex">
                        <h5 class="mr-2">$12,253</h5>
                        <div class="text-success">
                            <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                        </div>
                    </div>
                    <p class="text-muted text-truncate mb-0">This month</p>
                </div>

                <div class="col-sm-4">
                    <div class="mt-4 mt-sm-0">
                        <p class="mb-2 text-muted text-truncate"><i class="mdi mdi-circle text-primary font-size-10 mr-1"></i> This Year :</p>
                        <div class="d-inline-flex">
                            <h5 class="mb-0 mr-2">$ 34,254</h5>
                            <div class="text-success">
                                <i class="mdi mdi-menu-up font-size-14"> </i>2.1 %
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mt-4 mt-sm-0">
                        <p class="mb-2 text-muted text-truncate"><i class="mdi mdi-circle text-success font-size-10 mr-1"></i> Previous Year :</p>
                        <div class="d-inline-flex">
                            <h5 class="mb-0">$ 32,695</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>