<template>
  <div>
      <div class="table-responsive mt-3">
          <div class="card">
                    <div class="card-body">
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
                        @click="viewDetails(po_order.id)"
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
            <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Manufacturer</th>
                                <th>Packet Size</th>
                                <th>Price</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(purchase_order_items, index) in po_products" :key="index" >
                                <td>{{product.name ? product.name : product.product_name}}</td>
                                <td>{{productDesc(product)}}</td>
                                <td>{{product.manufacturer.name ? product.manufacturer.name : product.manufacturer}}</td>

                                <td>
                                    {{product.packet_size}}
                                </td>

                                <td>
                                    {{product.price.toLocaleString()}}
                                </td>
                                <td>
                                    <vs-checkbox>
                                    </vs-checkbox>
                                    <!-- <a href="javascript:void(0);" @click.prevent="editProduct(product)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-edit-box-fill font-size-18"></i></a> -->
                                </td>
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
            purchase_order_items: {}
        }
    },
    methods: {
        async loadPurchaseOrders(url = 'retailer_purchase_order') {
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
        async loadPurchaseOrdersItems(){
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
        viewDetails(po_orderId){
            this.$refs.review_po.open();
            console.log(po_orderId);
        }
    },
    mounted() {
        this.loadPurchaseOrders();
    },

}
</script>

<style>

</style>