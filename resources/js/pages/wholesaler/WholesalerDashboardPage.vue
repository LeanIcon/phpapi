<template>
<div>
  <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 hd-four">RETAILING</h4>

                <!-- <div class="page-title-right">
                    <old class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Nnuro</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div> -->

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
      <stats :cardTitle="produ" :cardValue="product_count" ></stats>
      <stats :cardTitle="purchaseOrdersReceived" :cardValue="purchase_orders_count" ></stats>
      <!-- <stats :cardTitle="proForma" :cardValue="proforma_count" ></stats> -->
      <stats :cardTitle="inVoices" :cardValue="proforma_count" ></stats>
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
      produ: "Total Products",
      purchaseOrdersReceived: "Purchase Order Received",
      proForma: "Pro Forma Invoice",
      inVoices: "Invoices",
      purchase_orders: {},
      purchase_orders_count: 0,
      proforma_count: 0,
      product_count: 0,

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
    async loadDashboardStatus(url = 'wholesaler_dashboard_stats') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`${url}`)
            .then(({data}) => {
                this.purchase_orders_count = data.purchase_orders_count
                this.proforma_count = data.proforma_count
                this.product_count = data.product_count
                this.openNotification('top-right', 'success','Loading Data Complete')
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
  mounted() {
    this.loadDashboardStatus();
  },

}
</script>

<style>

</style>