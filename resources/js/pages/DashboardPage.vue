<template>
  <div>
    <div class="row">
      <stats :cardTitle="wholesalerTitle" :cardValue="0" ></stats>
      <stats :cardTitle="retailerTitle" :cardValue="0" ></stats>
      <stats :cardTitle="productTitle" :cardValue="0" ></stats>
      <stats :cardTitle="orderTitle" :cardValue="0" ></stats>
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
    }
  },

}
</script>

<style>

</style>