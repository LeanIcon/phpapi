<template>
<div>
    <div>
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                        <div class="w-100">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <div>
                                        <div class="text-center">
                                            <div>
                                                <a href="#" class="logo"><img src="assets/images/nnurologo-dark.png" height="100" alt="logo"></a>
                                            </div>
                                            <h4 class="font-size-18 mt-4">REGISTER</h4>
                                            <p class="text-muted">All fields are required</p>
                                        </div>

                                        <div class="p-2 mt-1">
                                            <form class="form-horizontal">
                                                <div class="form-group mb-2">
                                                    <label for="type">Register As</label>
                                                    <select v-model="register_type" class="form-control" name="type" id="type">
                                                        <option :value="types" v-for="(types, index) in registerOptions" :key="index">{{types.name}}</option>
                                                        <!-- <option value="R">Retailer</option>
                                                            <option value="W">Wholesaler</option> -->
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  mb-2 col-lg-6">
                                                        <label for="region">Region</label>
                                                        <select v-model="region_code" class="form-control" name="region" @change="onRegionChange" id="region">
                                                            <option value="null" disabled>Select Region</option>
                                                            <option :value="region" v-for="(region, index) in regions.data" :key="index">{{region.name}}</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group  mb-2 col-lg-6">
                                                        <label for="location">Location</label>
                                                        <select class="form-control" v-model="location" name="location" @change="onLocationChange" id="location">
                                                            <option value="null" disabled>Select Location</option>
                                                            <option :value="location.id" v-for="(location, index) in locations.data" :key="index">{{location.name}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="userpassword">Registration No</label>
                                                    <div class="row">
                                                        <div class="col-md-3 p-1">
                                                            <input type="text" class="form-control" id="prefix" :disabled="true" v-model="prefix" placeholder="PC">
                                                        </div>
                                                        <div class="col-md-2 p-1">
                                                            <input type="text" :value="retRegCode" class="form-control" id="region_code" :disabled="true" placeholder="">
                                                        </div>
                                                        <div class="col-md-2 p-1">
                                                            <input type="text" v-model="getRtypeAbb" class="form-control" id="account_type" :disabled="true" placeholder="">
                                                        </div>
                                                        <div class="col-md-3 p-1">
                                                            <input type="text" v-model="pc_code" @keyup="getRegCode" class="form-control" id="reg_code" placeholder="Reg Code">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  mb-2 col-lg-6">
                                                        <label for="useremail">Company Name</label>
                                                        <input type="text" v-model="user.name" class="form-control" id="useremail" placeholder="Company Name">
                                                    </div>
                                                    <div class="form-group  mb-2 col-lg-6">
                                                        <label for="username">Email</label>
                                                        <input type="email" v-model="user.email" class="form-control" id="username" placeholder="Email Address">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  mb-2 col-lg-6">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" v-model.number="user.phone" class="form-control" id="phone" placeholder="Enter Phone">
                                                    </div>
                                                    <div class="form-group  mb-2 col-lg-6">
                                                        <label for="password">Password</label>
                                                        <input type="password" v-model="user.password" class="form-control" id="password" placeholder="Enter Password">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="text-left">
                                                            <button @click.prevent="registerUser" class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="mt-1 text-center">
                                                    <p class="mb-0">By registering you agree to the NNURO <a href="#" class="text-primary">Terms of Use</a></p>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="mt-1 text-center">
                                            <p>Already have an account ? <a @click="loadLogin()" class="font-weight-medium text-primary a-login"> Login</a> </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="authentication-bg">
                        <div class="bg-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import registerTypes from '../datautil/registertypes'
export default {

    data() {
        return {
            user: {
                email: '',
                password: '',
                password_confirmation: '',
                name: '',
                phone: '',
                type: '',
                region_id: '',
                location_id: '',
                company_name: '',
                reg_no: '',
            },
            registerOptions: [],
            regions: {},
            locations: {},
            region_id: 0,
            region_code: '',
            register_type: '',
            prefix: 'PC',
            location: '',
            pc_code: ''

        }
    },
    methods: {
        registerUser() {
            // console.log("Registering...", this.user.name);
            this.user.reg_no = this.getRegCode();
            this.user.region_id = this.region_code.id;
            this.user.type = this.register_type.type;
            this.user.location_id = this.location;
            this.$store.dispatch('account/userRegister', this.user);
        },
        loadLogin() {
            this.$router.replace('/login');
        },
        async loadRegions() {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get('region')
                .then(({
                    data
                }) => {
                    this.regions = data
                    this.loading != this.loading
                    loading.close();
                })
                .catch(({
                    response
                }) => {
                    this.loading != this.loading
                    loading.close();
                })
        },
        async loadLocations() {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get('location', {
                    params: this.axiosRegionParams
                })
                .then(({
                    data
                }) => {
                    this.locations = data
                    this.loading != this.loading
                    loading.close();
                })
                .catch(({
                    response
                }) => {
                    this.loading != this.loading
                    loading.close();
                })
        },
        onRegionChange() {
            this.region_id = this.region_code.id
            this.loadLocations();
            this.getRegCode();
        },
        onLocationChange() {

        },
        getRegCode() {
            var regCode = this.prefix + '/' + this.region_code.code + '/' + this.register_type.short_code + '/' + this.pc_code;
            return regCode;
        },
        getRegionCode() {

        },
        getRegisterType() {
            return this.register_type.short_code;
        },

    },
    computed: {
        retRegCode() {
            var regCode = this.region_code.code;
            return regCode;
        },
        getRtypeAbb() {
            return this.register_type.short_code;
        },
        axiosRegionParams() {
            const params = new URLSearchParams();
            if (this.region_id > 0) {
                params.append('region_id', this.region_id);
            }
            return params;
        }
    },
    mounted() {
        this.loadRegions();
        this.registerOptions = registerTypes;
    },
}
</script>

<style>

</style>
