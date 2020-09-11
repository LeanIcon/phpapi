<template>
<div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-4">
                        <img class="card-img img-fluid" :src="'/assets/images/small/img-1.jpg'" alt="Card image" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Identity: {{profile.name}}</h5>
                            <p class="card-text">Location: {{getContactPerson(profile)}}</p>
                            <p class="card-text">
                                Status:
                                <small class="text-muted">Active</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Contact Details</h5>
                            <p class="card-text">Contact Person: {{getContactPerson(profile)}}</p>
                            <p class="card-text">
                                Status:
                                <small class="text-muted">Active</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['profile'],
    methods: {
        getLocation(user) {
            return user.details?.location ?? "Not Available";
        },
        getContactPerson(user) {
            return user.details?.contact_person ?? "Not Available";
        },
    },
    mounted() {},

}
</script>

<style>

</style>
