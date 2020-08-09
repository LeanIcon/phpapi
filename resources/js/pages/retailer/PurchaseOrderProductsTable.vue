<template>
  <div>
    <div class="table-responsive mt-3">
                    <button class="btn btn-info" @click="previewSweetModal()">Check Items  {{getPurchaseOrderQty}}</button>
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
                                <td>{{product.name ? product.name : product.product_name}}</td>
                                <td>{{productDesc(product)}}</td>
                                <td>{{product.manufacturer.name ? product.manufacturer.name : product.manufacturer}}</td>

                                <td>
                                    {{product.packet_size}}
                                </td>

                                <td>
                                    {{product.price.toLocaleString()}}
                                </td>
                                <td  style="width: 75px;">
                                    <input v-model.number="product.qty" type="text" class="form-control">
                                </td>
                                <td >
                                     {{product.price * qty}}
                                </td>
                                <td>
                                    <vs-checkbox v-model="po_products" :val="product" >
                                    </vs-checkbox>
                                    <!-- <a href="javascript:void(0);" @click.prevent="editProduct(product)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-edit-box-fill font-size-18"></i></a> -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <div class="col-md-12" v-show="products.links && products.meta" >
                <!-- <pagination :data="laravelData" v-on:pagination-change-page="getResults"></pagination> -->
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
             <vs-button border @click="savePurchaseOrder()" >
                SAVE
            </vs-button>
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
                            <tr v-for="(product, index) in po_products" :key="index" >
                                <td>{{product.name ? product.name : product.product_name}}</td>
                                <td>{{productDesc(product)}}</td>
                                <td>{{product.manufacturer.name ? product.manufacturer.name : product.manufacturer}}</td>

                                <td>
                                    {{product.packet_size}}
                                </td>

                                <td>
                                    {{product.price.toLocaleString()}}
                                </td>
                                <td  style="width: 75px;">
                                    <input v-model.number="product.qty" type="text" class="form-control">
                                </td>
                                <td>
                                   {{product.price * qty}}
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
                price: 0,
                qty: 0
            },
            // price: 0,
            qty: 0,
            products: {},
            manufacturers: {},
            links: {},
            loading: false,
            po_products: [],
            isCheckAll: false,
        }
    },
    methods: {
        async loadProduct(url = 'wholesaler_products') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`${url}`, {
                params: this.axiosParams
            })
            .then(({data}) => {
                this.products = data
                this.loading != this.loading
                // console.log(this.products)
                loading.close();
                })
            .catch(({response}) => {
                // console.log(response)
                this.loading != this.loading
                loading.close();
                }
            )
        },
        async savePurchaseOrder(){
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.post('purchase_orders_save', this.po_products)
            .then(({data}) => {
                this.loading != this.loading
                console.log(data)
                loading.close();
                })
            .catch(({response}) => {
                console.log(response)
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
            // this.po_products.push(event.target.value);
            console.log(this.selected_products);
            console.log(Object.values(this.selected_products).length);
        },
        productDesc(product){
            let active_ing = product.active_ingredients ?? '';
            return active_ing + ' ' + product.strength;
        },
        formatCurrency(value){
            return value.toLocaleString();
        },
        getNextPage(){
            this.loadProduct(this.products.links.next);
            },
        getPrevPage(){
            this.loadProduct(this.products.links.prev);
        },
    },
    computed: {
        changedWholesaler(){
            return this.wholesalerId
        },
        getPurchaseOrderQty(){
            console.log(Object.values(this.po_products).length);
            console.log(Object.values(this.po_products));
            return Object.values(this.po_products).length
        }, 
    axiosParams() {
        const params = new URLSearchParams();
            params.append('wholesaler_id', this.wholesalerId);
        return params;
    }
    },
    watch: {
        wholesalerId: function(val) {
            this.loadProduct();
        }
    },
    mounted () {
        this.loadProduct();
    }


}
</script>

<style>

</style>