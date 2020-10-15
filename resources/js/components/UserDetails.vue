<template>
<div>
    <div>
        <div class="card">
            <div class="card-body  met-pro-bg">
                <div class="met-profile">
                    <div class="row">
                        <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                            <div class="met-profile-main">
                                <div class="met-profile-main-pic">
                                    <img src="assets/images/nnurologo-dark.png" width="80%" alt="" class="rounded-circle">
                                    <span class="fro-profile_main-pic-change"><i class="fa fa-camera"></i></span>
                                </div>
                                <div class="met-profile_user-detail">
                                    <h5 class="met-user-name">{{user.name}}</h5>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-4 ml-auto">
                            <ul class="list-unstyled personal-detail">
                                <li class=""><i class="fa fa-phone mr-2 text-info font-18"></i> <b> phone </b> {{user.phone}}</li>
                                <li class="mt-2"><i class="fa fa-phone text-info font-18 mt-2 mr-2"></i> <b> Email </b> : {{user.email}}</li>
                                <li class="mt-2"><i class="fa fa-phone text-info font-18 mt-2 mr-2"></i> <b>Location</b> : {{userLocation(user)}}</li>
                            </ul>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end f_profile-->
            </div>
            <!--end card-body-->
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>

    <div>
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#home" role="tab" aria-selected="false">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" href="#settings" role="tab" aria-selected="true">Settings</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="card-body">
                        <product-table :wholesalerId="user.id"></product-table>
                    </div>
                </div>
                <!--second tab-->
                <div class="tab-pane" id="profile" role="tabpanel">
                    <div class="card-body">
                        <details-form :userdetails="user.details"></details-form>
                    </div>
                </div>
                <div class="tab-pane " id="settings" role="tabpanel">
                    <div class="card-body">
                        <div class="col-lg-8 ml-auto mr-auto mt-5">
                            <div class="card-title">Application Wide Settings / Configurations</div>
                            <div class="card-body">
                                <form action="">
                                    <div class="custom-control custom-switch mb-2" dir="ltr">
                                        <div class="form-group">
                                            <label class="custom-control-label" for="deviceNotify">Device Notifications</label>
                                            <input type="checkbox" class="custom-control-input" id="deviceNotify">
                                        </div>
                                        <div class="form-group">
                                            <label class="custom-control-label" for="newProduct">New Product Updates</label>
                                            <input type="checkbox" class="custom-control-input" id="newProduct">
                                        </div>
                                        <div class="form-group">
                                            <label class="custom-control-label" for="priceUpdate">Product Updates (*Prices etc...)</label>
                                            <input type="checkbox" class="custom-control-input" id="priceUpdate">
                                        </div>
                                        <div class="form-group">
                                            <label class="custom-control-label" for="shortageList">Shortage List</label>
                                            <input type="checkbox" class="custom-control-input" id="shortageList">
                                        </div>
                                        <div class="form-group">
                                            <label class="custom-control-label" for="medsNotify">Medicinal / Drugs Information</label>
                                            <input type="checkbox" class="custom-control-input" id="medsNotify">
                                        </div>
                                        <div class="form-group">
                                            <label class="custom-control-label" for="posActive">POS Service (Demo mode Only)</label>
                                            <input type="checkbox" class="custom-control-input" id="posActive">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import ProductTableVue from './ProductTable.vue'
import DetailsFormVue from './DetailsForm.vue'
export default {
    props: ['userId'],
    components: {
        'productTable': ProductTableVue,
        'detailsForm': DetailsFormVue
    },
    data() {
        return {
            user: {},
            wholesaleUser: ''
        }
    },
    computed: {},
    methods: {
        userLocation(user) {
            return user.details?.location ?? "Not Available";
        },
        getUserData() {
            console.log("Coming from Products Table: ", this.changeUser)
        },
        async fetchDetails(user) {
            console.log("Fetching User details...");
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`admin/user/${user}`)
                .then(({
                    data
                }) => {
                    this.user = data.data.user
                    this.loading != this.loading
                    console.log(this.user);
                    loading.close();
                })
                .catch((error) => console.log(error))
        },
        switchNewWholesaler(changedVal) {
            console.log(" Event Accepted", changedVal);
            this.wholesaleUser = changedVal
            this.fetchDetails(changedVal);
        }
    },
    watch: {
        // 'userId': function(oldVal, newVal){
        //     this.wholesaleUser = newVal
        // }
    },
    mounted() {
        this.getUserData();
        this.fetchDetails(this.userId);
    },
    created() {
        this.$parent.$on('wholeSalerOptionChanged', this.switchNewWholesaler)
    },

}
</script>

<style>

</style>
