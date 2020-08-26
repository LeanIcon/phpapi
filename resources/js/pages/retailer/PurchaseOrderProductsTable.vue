<template>
  <div>
        <!-- <div class="row">
            <div class="form-group col-lg-4">
                    <label for="manufacturername">Wholelsalers</label>
                    <select v-model="selectedUser" @change="userChanged($event)" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="" disabled hidden >Select</option>
                    <option :value="user.id"  v-for="(user, index) in wholersalers.data" :key="index" >{{user.name}}</option>
                </select>
            </div>
        </div> -->
    <div class="table-responsive mt-3">
                    <button class="btn btn-info" @click="previewSweetModal()">Check Items  {{getPurchaseOrderQty}}</button> {{!Number.isNaN(calculateTotal) ? calculateTotal : ''}}
                    <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Manufacturer</th>
                                <th>Packet Size</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Line Total</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in products.data" :key="index" >
                                <td> <img style="width:75px;" class="mg-fluid img-thumbnail"  :src="'/assets/images/product/drugsamp.jpg'" :alt="product.name ? product.name : product.product_name"> {{product.name ? product.name : product.product_name}}</td>
                                <td>{{productDesc(product)}}</td>
                                <td>{{product.manufacturer.name ? product.manufacturer.name : product.manufacturer}}</td>

                                <td>
                                    {{product.packet_size}}
                                </td>

                                <td>
                                    {{product.price.toLocaleString()}}
                                </td>
                                <td  style="width: 75px;">
                                    <input v-model.number="product.quantity" type="text" class="form-control">
                                </td>
                                <td>
                                    <h6 v-if="product.quantity > 0" >{{formatPrice(product.price) * product.quantity}}</h6>
                                    <!-- <h6  v-else>{{formatPrice(product.price) * product.quantity}}</h6> -->
                                </td>
                                <td>
                                    <vs-checkbox v-model="po_products" :val="product" >
                                    </vs-checkbox>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <div class="col-md-12" v-show="products.links && products.meta" >
            <nav >
                <ul class="pagination" style="cursor:pointer" >
                    <li class="page-item" :class="{'disabled': !products.links.prev , 'active': products.links.prev != null}">
                    <a class="page-link" @click="getPrevPage" >Previous</a>
                    </li>
                    <span class="mr-3"></span>
                    <li class="page-item" :class="{'disabled': !products.links.next, 'active': products.links.next != null}">
                    <a class="page-link" @click="getNextPage" >Next</a>
                    </li>
                </ul>
            </nav>
        </div>

        <sweet-modal ref="review_po" width="70%" >
            <purchase-order-items :po_products="selectPurchaseOrderProducts" @savePO="savePurchaseOrder" ></purchase-order-items>
        </sweet-modal>
  </div>
</template>

<script>
import PurchaseOrderItemsVue from './PurchaseOrderItems.vue';
export default {
    components: {
        'purchaseOrderItems': PurchaseOrderItemsVue
    },
    props: ['wholesalerId'],
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
                price: '',
                quantity: 0,
                line_total: 0
            },
            // price: 0,
            quantity: 0,
            total: 0,
            products: {},
            manufacturers: {},
            links: {},
            loading: false,
            po_products: [],
            isCheckAll: false,
        }
    },
    methods: {
        async loadWholesalers(url = 'wholesalers') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`admin/${url}`)
            .then(({data}) => {
                this.wholersalers = data
                this.loading != this.loading
                loading.close();
                })
            .catch(({response}) => {
                alert("Please try loading page again...")
                this.loading != this.loading
                loading.close();
                }
            )
        },
        async loadProduct(url = 'wholesaler_products') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`${url}`, {
                params: this.axiosParams
            })
            .then(({data}) => {
                this.products = data
                this.loading != this.loading
                loading.close();
                })
            .catch(({response}) => {
                this.loading != this.loading
                loading.close();
                }
            )
        },
        async savePurchaseOrder(){
            console.log("Saving Purchase Order Please Wait...")
            this.loading = !this.loading
            const loading = this.$vs.loading();
            const data = {
                    purchaseOrders: this.po_products,
                    wholesaler_id: this.wholesalerId,
                    total: this.calculateTotal
                };
             
            await axios.post('retail_purchase_orders_save', data)
            .then(({data}) => {
                this.loading != this.loading
                console.log(data)
                loading.close();
                this.$store.dispatch('purchase_orders/clearSelectedProduct')
                this.$router.push({name: 'retailer.dashboard'});
                })
            .catch(({response}) => {
                console.log(response)
                this.$router.push({name: 'retailer.dashboard'})
                this.loading != this.loading
                loading.close();
                }
            )
        },
        previewSweetModal(){
            this.$refs.review_po.open();
        },
        previewSelectedItems(product){
            this.$modal.show('po-preview-modal');
        },
        checkUpdate(){
            console.log(this.po_products);
        },
        updateCheck(){
            if(this.po_products.length == this.products.data.length) {
                this.isCheckAll = true;
            }else{
                this.isCheckAll = false;
            }
        },
        formatPrice(price){
            var formattedPrice = parseFloat(price);
            return formattedPrice;
        },
        formatLineTotal(qty){
            var lineTotal = this.formatPrice * qty;
            return lineTotal ?? 0;
        },
        productDesc(product){
            let active_ing = product.active_ingredients ?? '';
            let generic = product.name ?? '';
            return active_ing + ' ' + product.strength;
        },
        getNextPage(){
            this.loadProduct(this.products.links.next);
            },
        getPrevPage(){
            this.loadProduct(this.products.links.prev);
        },
    },
    computed: {
        calculateTotal(){
            return  this.po_products.reduce((total, p) => {
                return total + p.price * p.quantity
            }, 0)
        },
        changedWholesaler(){
            return this.wholesalerId
        },
        getPurchaseOrderQty(){
            return Object.values(this.po_products).length
            console.log(Object.values(this.po_products).length);
        },
    axiosParams() {
        const params = new URLSearchParams();
        if (this.selectedUser > 0 || this.wholesalerId > 0) {
            params.append('wholesaler_id', this.selectedUser ?? this.wholesalerId);
        }
        return params;
    },
    selectPurchaseOrderProducts(){
        return this.$store.getters['purchase_orders/getSelectedProducts'];
    },
    selectProductCount(){
        return this.$store.getters['purchase_orders/getSelectedProductCount'];
    }
    },
    watch: {
        wholesalerId: function(val) {
            this.loadProduct();
        }
    },
    mounted () {
        this.loadProduct();
        this.po_products = this.selectPurchaseOrderProducts;
        console.log("PO Page", this.wholesalerId)
    }


}
</script>

<style>

</style>