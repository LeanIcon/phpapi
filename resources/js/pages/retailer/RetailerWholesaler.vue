<template>
<div>
    <div class="table-responsive mt-3">
        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead>
                    <tr>
                        <th>Wholesaler Name</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr class="table-active table-border-double">
                    <td colspan="5">Wholesalers</td> -->
                    <!-- <td class="text-right">
                        <span class="progress-meter" id="today-progress" data-progress="30"><svg width="20" height="20"><g transform="translate(10,10)"><g class="progress-meter"><path d="M0,8A8,8 0 1,1 0,-8A8,8 0 1,1 0,8Z" style="fill: rgb(255, 255, 255); stroke: rgb(121, 134, 203); stroke-width: 1.5;"></path><path style="fill: rgb(121, 134, 203);" d="M4.898587196589413e-16,-8A8,8 0 0,1 7.608452130361228,2.472135954999579L0,0Z"></path></g></g></svg></span>
                    </td> -->
                    <!-- </tr> -->
                    <tr v-for="(wholesaler, index) in wholesalers.data" :key="index">
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="mr-0">
                                    <!-- <a href="#">
                                    <img src="" class="rounded-circle" width="32" height="32" alt="Image">
                                </a> -->
                                </div>
                                <div>
                                    <p class="text-default font-weight-semibold">{{wholesaler.name}}</p>
                                    <!-- <div class="text-muted font-size-sm">
                                        <span class="badge badge-mark border-blue mr-1"></span>
                                        {{wholesaler.phone}}
                                    </div> -->
                                </div>
                            </div>
                        </td>
                        <td><span class="text-muted">{{getLocation(wholesaler)}}</span></td>
                        <td style="color:green">Active</td>
                        <td>
                            <vs-button color="success" size="small" type="filled" @click="viewDetails(wholesaler)">
                                View Products
                            </vs-button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            wholesalers: {}
        }
    },
    methods: {
        async loadWholesalers(url = 'wholesalers') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`admin/${url}`)
                .then(({
                    data
                }) => {
                    this.wholesalers = data
                    this.loading != this.loading
                    loading.close();
                })
                .catch(({
                    reponse
                }) => {
                    console.log(reponse)
                })
        },
        viewDetails(wholesaler) {
            this.$store.dispatch('wholesalers/addWholesaler', wholesaler)
            this.$router.push({
                name: 'wholesaler.products',
                params: {
                    'id': wholesaler.id
                }
            })
        },
        getLocation(user) {
            var location = (((user || {}).details || {}).user_location || '') ?? 'Not Available';
            return location;
        },
        // getLocation(user) {
        //     console.log(user)
        //     return user.details?.location ?? "Not Available";
        // },
        getContactPerson(user) {
            // console.log(user)
            return user.details?.contact_person ?? "Not Available";
        },
    },
    mounted() {
        this.loadWholesalers();
    },

}
</script>

<style scoped>
.vs-button {
    margin: 1px;
}
</style>
