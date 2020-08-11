<template>
  <div>
      <div class="table-responsive mt-3">
          <div class="card">
                    <div class="card-body">
                        <div>
                            FILTERS
                        </div>
        <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead class="thead-light">
                <tr>
                    <th>Purchase Order ID</th>
                    <th>Wholesaler Name</th>
                    <th>Status</th>
                    <th style="width: 120px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(po_order, index) in purchase_orders" :key="index">
                <td>PO-{{po_order.id}}</td>
                <td>{{po_order.wholesaler_name}}</td>
                <td>
                    <span class="badge" :class="{'badge-info' : po_order.status == 'pending'}" >PENDING</span>
                </td>
                <td>
                    <vs-button
                        size="small"
                        border
                        @click="viewDetails(po_order.id, po_order.total, po_order.reference)"
                    >
                    View Items
                </vs-button>
                </td>
                    </tr>
            </tbody>
        </table>
        </div>
    </div>
    </div>
    <sweet-modal ref="review_po" width="70%" >
            <h5 class="float-left">PO-REFERENCE: {{reference}}</h5>
            <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Product Name</th>
                                <th>Manufacturer</th>
                                <th>Price</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in purchase_order_items" :key="index" >
                                <td>{{item.name ? item.name : item.product_name}}</td>
                                <td>{{item.manufacturer.name ? item.manufacturer.name : item.manufacturer}}</td>

                                <td>
                                    {{item.price}}
                                </td>

                                <td>
                                    {{item.quantity}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td class="font-14 text-dark bold">Total : </td>
                                <td class="font-14 text-dark bold">{{poTotal}}</td>
                            </tr>
                        </tbody>
                    </table>
                <!-- <sweet-button slot="button">SAVE</sweet-button> -->
        </sweet-modal>
    </div>
</template>

<script>
export default {
    // props: ['purchase_order'],
    data() {
        return {
            purchase_orders: {},
            purchase_order_items: {},
            pod_id: 0,
            poTotal: '',
            reference: null
        }
    },
    methods: {
        async loadPurchaseOrders(url = 'wholesaler_purchase_order') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`${url}`)
            .then(({data}) => {
                this.purchase_orders = data.purchase_orders
                console.log(this.purchase_orders);
                this.loading != this.loading
                loading.close();
                })
            .catch(({response}) => {
                this.loading != this.loading
                loading.close();
                }
            )
        },
        async loadPurchaseOrdersItems(id){
            this.loading = !this.loading
            const loading = this.$vs.loading(id);
            await axios.get('view_purchase_order_items/' + this.pod_id)
            .then(({data}) => {
                console.log(id)
                this.purchase_order_items = data
                console.log(this.purchase_order_items);
                this.loading != this.loading
                loading.close();
                })
            .catch(({response}) => {
                this.loading != this.loading
                loading.close();
                }
            )
        },
        viewDetails(po_orderId, ref){
            this.$router.push({name: 'purchase_order.view', params:{'purchase_order_id': po_orderId}})
        }
    },
    mounted() {
        this.loadPurchaseOrders();
    },

}
</script>

<style>

</style>