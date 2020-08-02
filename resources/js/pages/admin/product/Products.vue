<template>
<div class="row">
  <stats :cardTitle="products.cardTitle" :cardValue="products.cardValue" :colLength="products.colLength" ></stats>
  <stats :cardTitle="drugs.cardTitle" :cardValue="drugs.cardValue" :colLength="drugs.colLength" ></stats>
  <stats :cardTitle="devices.cardTitle" :cardValue="devices.cardValue" :colLength="devices.colLength" ></stats>
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
        products: {
          cardTitle: "Total Products",
          cardValue: 100,
          colLength: '4'
        },
        drugs: {
          cardTitle: "Total Drugs",
          cardValue: 50,
          colLength: '4'
        },
        devices: {
          cardTitle: "Total Medical Devices",
          cardValue: 90,
          colLength: '4'
        },
      }
    },
}
</script>

<style>

</style>