<template>
  <div>
    <div class="table-responsive mt-3">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <div>
                <router-link to="/retail/shortage/create" class="btn btn-success mb-2">
                    <i class="ri-add-box-line"></i>
                    Create Shortage List 
                </router-link>
                    <!-- <a href="javascript:void(0);" @click="loadUser" class="btn btn-success mb-2"><i class="fa fa-plus-square"></i> Add Product</a> -->
            </div>

                <div class="ml-auto">
                  <button class="btn btn-info" @click="previewPOModal()" > Items in P.O List {{selectProductCount}}</button>
                </div>
            </div>
        <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Ref</th>
                    <th>#Products</th>
                    <th style="width: 120px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(shortage, index) in shortage_list_content" :key="index">
                <td>{{shortage.id}}</td>
                <td>{{shortage.reference}}</td>
                <td>{{shortageItemsCount(shortage.content)}}</td>
                <td>
                    <vs-button
                        size="small"
                        border
                        @click="viewShortageList(shortage.reference, shortage.content)"
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
    <sweet-modal ref="review_shortagelist" width="70%" >
            <h5 class="float-left">SHORTAGE LIST REF: {{reference}}</h5>
            <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Wholesaler</th>
                                <th>Product Name</th>
                                <th>Manufacturer</th>
                                <th>GH₵ Price</th>
                                <th class="text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in shortage_list" :key="index" >
                                <td >{{item.wholesaler_name ? item.wholesaler_name : ''}}</td>
                                <td >{{item.name ? item.name : item.product_name}}</td>
                                <td>{{item.manufacturer.name ? item.manufacturer.name : item.manufacturer}}</td>

                                <td>
                                   GH₵ {{item.price}}
                                </td>

                                <td>
                                    <vs-button
                                            success
                                            size="small"
                                            border
                                            @click="addToPurchaseOrderList(item)"
                                        >
                                        ADD TO P.O
                                    </vs-button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <!-- <sweet-button slot="button">SAVE</sweet-button> -->
        </sweet-modal>
        <sweet-modal ref="review_po" width="70%" >
          <purchase-order-items :po_products="selectPurchaseOrderProducts" @savePO="savePurchaseOrder" ></purchase-order-items>
        </sweet-modal>
    </div>
</template>

<script>
import PurchaseOrderItemsVue from './PurchaseOrderItems.vue';
export default {
    // props: ['purchase_order'],
    components: {
        'purchaseOrderItems': PurchaseOrderItemsVue
    },
    data() {
        return {
            product: {
                manufacturer: '',
                name: '',
                category: '',
                category_type: '',
                dosage_form: '',
                drug_class: '',
                strenght: '',
                packet_size: '',
                price: 0,
                qty: 0,
                line_total: 0
            },
            // price: 0,
            wholersalerId: 0,
            reference: '',
            selectedUser: '',
            qty: 0,
            products: {},
            manufacturers: {},
            wholersalers: {},
            links: {},
            loading: false,
            shortage_list: [],
            shortage_list_content: [],
            isCheckAll: false,
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
        async loadShortageList(url = 'load_shortage_list') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`${url}`)
            .then(({data}) => {
                this.shortage_list_content = data.shortageList
                this.openNotification('top-right', 'success', 'Loading Shortage List Complete');
                this.loading != this.loading
                loading.close();
                })
            .catch(({response}) => {
                this.loading != this.loading
                this.openNotification('top-right', 'danger', 'Unable to load Shortage List')
                loading.close();
                }
            )
        },
        async loadPurchaseOrdersItems(id){
            this.loading = !this.loading
            const loading = this.$vs.loading(id);
            await axios.get('view_purchase_order_items/' + this.pod_id)
            .then(({data}) => {
                this.shortage_list_content = data
                this.loading != this.loading
                loading.close();
                })
            .catch(({response}) => {
                this.loading != this.loading
                loading.close();
                }
            )
        },
        savePurchaseOrder(){
            console.log("Saving Purchase Order Please wait...");
        },
        previewPOModal(){
            this.$refs.review_po.open();
        },
        viewShortageList(reference, content){
            this.shortage_list = JSON.parse(content);
            this.reference = reference ? reference.substring(0, 15) : ''
            this.$refs.review_shortagelist.open();
        },
        shortageItemsCount(content){
            var list = JSON.parse(content);
            return Object.keys(list).length
        },
        addToPurchaseOrderList(item){
            console.log(item)
            this.$store.dispatch('purchase_orders/saveSelectedProduct', item)
        }
    },
    computed: {
        selectProductCount(){
            return this.$store.getters['purchase_orders/getSelectedProductCount'];
        },
        selectPurchaseOrderProducts(){
        return this.$store.getters['purchase_orders/getSelectedProducts'];
    },
    },
    mounted() {
        this.loadShortageList();
    },

}
</script>

<style>

</style>