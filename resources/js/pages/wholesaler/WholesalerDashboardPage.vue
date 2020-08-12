<template>
  <div>
    <div class="row">
      <stats :cardTitle="medDevices" :cardValue="0" ></stats>
      <stats :cardTitle="purchaseOrdersReceived" :cardValue="0" ></stats>
      <stats :cardTitle="proForma" :cardValue="0" ></stats>
      <stats :cardTitle="inVoices" :cardValue="0" ></stats>
    </div>
    <div class="row">
      <!-- <div class="col-lg-8">
        <bar-card></bar-card>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
              Data
          </div>
        </div>
      </div> -->
    </div>
  </div>
</template>

<script>
import StatsCardVue from '../../components/StatsCard.vue'
import GraphCardVue from '../../components/GraphCard.vue'


export default {
  components: {
    'stats' : StatsCardVue,
    'barCard' :  GraphCardVue
  },
  data() {
    return {
      medDevices: "Medical Devices",
      purchaseOrdersReceived: "Purchase Order Received",
      proForma: "Pro Forma Invoice",
      inVoices: "Invoices",
    }
  },

}
</script>

<style>

</style>