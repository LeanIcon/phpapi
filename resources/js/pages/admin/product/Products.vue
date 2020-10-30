<template>
<div class="row">
        <stats :cardTitle="productTitle" :cardValue="productCount"></stats>
        <stats :cardTitle="drugTitle" :cardValue="drugCount"></stats>
        <stats :cardTitle="medTitle" :cardValue="medCount"></stats>
        <!-- <stats :cardTitle="visitsTitle" :cardValue="visitsCount"></stats>
        <stats :cardTitle="poTitle" :cardValue="poCounts"></stats>
        <stats :cardTitle="invoiceTitle" :cardValue="invoiceCount"></stats> -->
  <div class="col-lg-12">
    <admin-product></admin-product>
    <router-view></router-view>
  </div>
</div>
</template>

<script>
import AdminProductsVue from '../../../components/AdminProducts.vue'
import StatsCardVue from '../../../components/StatsCard.vue'

export default {
    components: {
        'adminProduct': AdminProductsVue,
        'stats': StatsCardVue
    },
    data() {
      return {
          drugTitle: "Total Drugs",
            // retailerTitle: "Retailer",
            productTitle: "Total Products",
            drugTitle: "Total Drugs",
            medTitle: "Medical Devices",
            // poTitle: "Purchase Orders",
            // invoiceTitle: "Total Invoices",
            productCount: 0,
            medCount: 15,
            drugCount: 16,
            // poCounts: 0,
            // visitsCount: 0,
            // invoiceCount: 0,

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
                    // this.retailerCount = data.retailercount
                    // this.wholesalerCount = data.wholesalercount
                    // this.invoiceCount = data.invoiceCount
                    // this.poCounts = data.purchaseOrdersCount
                    // console.log(data)
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
  table > * {
        font-family: 'Roboto' !important;
    }
</style>