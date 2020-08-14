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
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <shortage-list-page></shortage-list-page>
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
import ShortageListPageVue from './ShortageListPage.vue'


export default {
  components: {
    'stats' : StatsCardVue,
    'barCard' :  GraphCardVue,
    'retailerWholesaler' : RetailerWholesalerVue,
    'shortageListPage' : ShortageListPageVue
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
    openNotification(position = null, color, text = 'Unprovided') {
          const noti = this.$vs.notification({
            square: true,
            flat: true,
            color,
            position,
            title: text,
            // text: ''
          })
        },
    async loadPurchaseOrders(url = 'retailer_purchase_order') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`${url}`)
            .then(({data}) => {
                this.purchase_orders = data
                this.purchase_orders_count = data.purchase_orders_count
                this.openNotification('top-right', 'success','Loading P.O Complete')
                this.loading != this.loading
                loading.close();
                })
            .catch(({response}) => {
                this.loading != this.loading
                this.openNotification('top-right', 'error','Could not load P.O')
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
                // this.openNotification('top-right', 'success','Loading Shortage List Complete')
                this.loading != this.loading
                loading.close();
                })
            .catch(({response}) => {
                this.loading != this.loading
                // this.openNotification('top-right', 'error','Unable to Load Shortage List... Reload Page or Try Again!!!')
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
    // },
    selectPurchaseOrderProducts(){
        return this.$store.getters['purchase_orders/getSelectedProducts'];
    },
  },
  mounted() {
    // this.openNotification('top-right', 'success','Welcome');
    // this.wholesalerId = JSON.parse(localStorage.getItem('user')).user.id;
    this.loadPurchaseOrders();
    this.loadShortageListProducts();
  },

}
</script>

<style>

</style>