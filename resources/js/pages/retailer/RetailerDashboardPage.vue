<template>
  <div>
    <div class="row">
      <stats :cardTitle="shortageList" :cardValue="shortage_list_count" ></stats>
      <stats :cardTitle="purchaseOrdersReceived" :cardValue="purchase_orders_count" ></stats>
      <stats :cardTitle="proForma" :cardValue="0" ></stats>
      <stats :cardTitle="inVoices" :cardValue="0" ></stats>
    </div>
    <div class="row">
        <div class="col-lg-6">
          <div class="card">
          <div class="card-body">
            <retailer-wholesaler></retailer-wholesaler>
        </div>
        </div>
      </div>
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
import RetailerWholesalerVue from './RetailerWholesaler.vue'


export default {
  components: {
    'stats' : StatsCardVue,
    'barCard' :  GraphCardVue,
    'retailerWholesaler' : RetailerWholesalerVue
  },
  data() {
    return {
      shortageList: "Shortagle List",
      purchaseOrdersReceived: "Purchase Orders",
      proForma: "Pro Forma Invoice",
      inVoices: "Invoices",
      wholesalerId: 0,
      purchase_orders: {},
      purchase_orders_count: 0,
      shortage_list_count: 0,
    }
  },
  methods: {
    async loadPurchaseOrders(url = 'retailer_purchase_order') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`${url}`)
            .then(({data}) => {
                this.purchase_orders = data
                this.purchase_orders_count = data.purchase_orders_count
                this.loading != this.loading
                loading.close();
                })
            .catch(({response}) => {
                this.loading != this.loading
                loading.close();
                }
            )
        },
    async loadShortageListProducts(url = 'load_shortage_list') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`${url}`)
            .then(({data}) => {
                this.shortage_list_count = data.count
                // this.purchase_orders_count = data.purchase_orders_count
                console.log(data);
                this.loading != this.loading
                loading.close();
                })
            .catch(({response}) => {
                this.loading != this.loading
                loading.close();
                }
            )
        },
  },
  computed : {
    // axiosParams() {
    //     const params = new URLSearchParams();
    //         params.append('wholesaler_id', this.wholesalerId);
    //     return params;
    // }
  },
  mounted() {
    // this.wholesalerId = JSON.parse(localStorage.getItem('user')).user.id;
    this.loadPurchaseOrders();
    this.loadShortageListProducts();
  },

}
</script>

<style>

</style>