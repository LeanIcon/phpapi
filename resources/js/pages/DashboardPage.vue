<template>
<div>
    <div class="row">
        <stats :cardTitle="wholesalerTitle" :cardValue="wholesalerCount"></stats>
        <stats :cardTitle="retailerTitle" :cardValue="retailerCount"></stats>
        <stats :cardTitle="productTitle" :cardValue="productCount"></stats>
        <!-- <stats :cardTitle="orderTitle" :cardValue="0" ></stats> -->
    </div>
    <div class="row">
        <div class="col-lg-8">
            <bar-card></bar-card>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    Data
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import StatsCardVue from '../components/StatsCard.vue'
import GraphCardVue from '../components/GraphCard.vue'

export default {
    components: {
        'stats': StatsCardVue,
        'barCard': GraphCardVue
    },
    data() {
        return {
            wholesalerTitle: "Wholesaler",
            retailerTitle: "Retailer",
            productTitle: "Products",
            orderTitle: "Orders",
            productCount: 0,
            retailerCount: 0,
            wholesalerCount: 0,
        }
    },
    methods: {
        loadDashboardStats(url = 'adminstats') {
            axios
                .get(`${url}`)
                .then(({
                    data
                }) => {
                    this.productCount = data.productcount
                    this.retailerCount = data.retailercount
                    this.wholesalerCount = data.wholesalercount
                    console.log(data)
                    // this.loading != this.loading;
                    // loading.close();
                })
                .catch(({
                    response
                }) => {
                    // this.loading != this.loading;
                    // loading.close();
                });
        }
    },
    mounted() {
        this.loadDashboardStats();
    },

}
</script>

<style>

</style>
