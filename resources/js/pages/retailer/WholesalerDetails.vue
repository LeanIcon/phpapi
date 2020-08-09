<template>
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
                                    <li class=""><i class="ri-phone-fill mr-2 text-info font-18"></i> <b>{{user.phone}}</b> </li>
                                    <li class="mt-2"><i class="ri-mail-send-line text-info font-18 mt-2 mr-2"></i> <b>{{user.email}} </b>  </li>
                                    <li class="mt-2"><i class=" ri-map-pin-fill text-info font-18 mt-2 mr-2"></i> <b>{{userLocation(user)}}</b> </li>
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
                        <div class="card">
                            <div class="card-header">CREATE PURCHASE ORDER FROM PRODUCT</div>
                        <div class="card-body">
                            <!-- <product-table :wholesalerId="user.id" ></product-table> -->
                            <purchase-order-products-table :wholesalerId="wholesalerId" ></purchase-order-products-table>
                        </div>
                        </div>
                    </div>
                    <!--second tab-->
                    <div class="tab-pane" id="profile" role="tabpanel">
                        <div class="card-body">
                            <!-- <details-form :userdetails="user.details" ></details-form> -->
                            <!-- <purchase-order-products-table :wholesalerId="wholesalerId" ></purchase-order-products-table> -->
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
                                        <input type="checkbox" class="custom-control-input" id="deviceNotify" >
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control-label" for="newProduct">New Product Updates</label>
                                        <input type="checkbox" class="custom-control-input" id="newProduct" >
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control-label" for="priceUpdate">Product Updates (*Prices etc...)</label>
                                        <input type="checkbox" class="custom-control-input" id="priceUpdate" >
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control-label" for="shortageList">Shortage List</label>
                                        <input type="checkbox" class="custom-control-input" id="shortageList" >
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control-label" for="medsNotify">Medicinal / Drugs Information</label>
                                        <input type="checkbox" class="custom-control-input" id="medsNotify" >
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control-label" for="posActive">POS Service (Demo mode Only)</label>
                                        <input type="checkbox" class="custom-control-input" id="posActive" >
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
import PurchaseOrderProductsTableVue from './PurchaseOrderProductsTable.vue';
export default {
    props: ['userId'],
    components: {
        'purchaseOrderProductsTable': PurchaseOrderProductsTableVue
    },
    data () {
        return {
            user: {},
            products: {},
            wholesalerId: ''
        }
    },
    methods: {
        async fetchDetails(user) {
            console.log("Fetching User details...");
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`admin/user/${user}`)
            .then((data) => {
                if(data.status == 200) {
                    this.user = data.data.data.user;
                    this.wholesalerId = this.user.id;
                    this.loading != this.loading
                    loading.close();
                    this.loadProduct();
                    }else{
                        this.loading != this.loading
                        loading.close();
                    }
                })
            .catch(({response}) => {
                    loading.close();
                    this.loading != this.loading
                    alert("Error Occured Please Try Again")
                    console.log(response)}
                )
        },
       async loadProduct(url = 'wholesaler_products') {
           console.log("Fetching Product.....")
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`${url}?wholesaler_id=${this.wholesalerId}`)
            .then(({data}) => {
                this.products = data
                this.loading != this.loading
                loading.close();
                })
            .catch((error) => console.log(error))
        },
        userLocation(user){
            if(typeof(user.details.location) === 'undefined') {
                return "Location Not Available"
            }
            return user.details.location;
        },
    },
    mounted() {
        this.fetchDetails(this.$route.params.userId);
        console.log("Route Params...", this.$route.params.userId)
    },

}
</script>

<style>

</style>