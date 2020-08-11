<template>
  <div>
      <div class="card">
          <div class="card-body">
              <div class="row">
              <div class="form-group col-lg-4">
                    <label for="manufacturername">Wholelsalers</label>
                    <select v-model="selectedUser" @change="userChanged($event)" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="" disabled hidden >Select</option>
                    <option :value="user.id"  v-for="(user, index) in wholersalers.data" :key="index" >{{user.name}}</option>
                </select>
            </div>
              </div>
            <div class="table-responsive mt-3">
                            <button class="btn btn-info" @click="previewSweetModal()">Preview Shortage List  {{getPurchaseOrderQty}}</button>
                            <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Wholesaler</th>
                                        <th>Product Name</th>
                                        <th>Product Description</th>
                                        <th>Manufacturer</th>
                                        <th>Packet Size</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(product, index) in products.data" :key="index" >
                                        <td>{{product.wholesaler_name ? product.wholesaler_name : ''}}</td>
                                        <td>{{product.name ? product.name : product.product_name}}</td>
                                        <td>{{productDesc(product)}}</td>
                                        <td>{{product.manufacturer.name ? product.manufacturer.name : product.manufacturer}}</td>

                                        <td>
                                            {{product.packet_size}}
                                        </td>

                                        <td>
                                            {{product.price}}
                                        </td>
                                        <td  style="width: 75px;">
                                            <input v-model.number="product.quantity" type="text" class="form-control">
                                            <small>{{calculateLinTotal}}</small>
                                        </td>
                                        <td>
                                            <vs-checkbox v-model="shortage_list" :val="product" >
                                            </vs-checkbox>
                                            <!-- <a href="javascript:void(0);" @click.prevent="editProduct(product)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-edit-box-fill font-size-18"></i></a> -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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

          </div>

        <sweet-modal ref="review_po" width="70%" >
             <vs-button border @click="saveShortageList()" >
                SAVE
            </vs-button>
            <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Wholesaler</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Manufacturer</th>
                                <th>Packet Size</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in shortage_list" :key="index" >
                                <td>{{product.wholesaler_name ? product.wholesaler_name : ''}}</td>
                                <td>{{product.name ? product.name : product.product_name}}</td>
                                <td>{{productDesc(product)}}</td>
                                <td>{{product.manufacturer.name ? product.manufacturer.name : product.manufacturer}}</td>

                                <td>
                                    {{product.packet_size}}
                                </td>

                                <td>
                                    {{product.price}}
                                </td>
                                <td  style="width: 75px;">
                                    <input v-model.number="product.quantity" type="text" class="form-control">
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
                quantity: 0,
                line_total: 0
            },
            // price: 0,
            wholersalerId: 0,
            selectedUser: '',
            quantity: 0,
            products: {},
            manufacturers: {},
            wholersalers: {},
            links: {},
            loading: false,
            shortage_list: [],
            isCheckAll: false,
        }
    },
    methods: {
        async loadProduct(url = 'wholesaler_products') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`${url}`, {params: this.axiosParams})
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
        userChanged(event){
            this.loadProduct();
        },
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
        async saveShortageList(){
            this.loading = !this.loading
            const loading = this.$vs.loading();
            const data = {
                    shortageList: this.shortage_list,
                };
            await axios.post('save_shortage_list', data)
            .then(({data}) => {
                this.loading != this.loading
                loading.close();
                this.$router.push({name: 'retailer.dashboard'});
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
            console.log(this.shortage_list);
        },
       updateCheck(){
            if(this.shortage_list.length == this.products.data.length) {
                this.isCheckAll = true;
            }else{
                this.isCheckAll = false;
            }
            console.log(this.selected_products);
            console.log(Object.values(this.selected_products).length);
        },
        productDesc(product){
            let active_ing = product.active_ingredients ?? '';
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
        calculateLinTotal(){
            // const unitTotal = this.product.price * this.product.qty;
            // this.line_total = unitTotal;
            // return unitTotal;
        },
        changedWholesaler(){
            return this.wholesalerId
        },
        getPurchaseOrderQty(){
            // console.log(Object.values(this.shortage_list).length);
            // console.log(Object.values(this.shortage_list));
            return Object.values(this.shortage_list).length
        },
    axiosParams() {
        const params = new URLSearchParams();
        if (this.selectedUser > 0) {
            params.append('wholesaler_id', this.selectedUser);
        }
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
        this.loadWholesalers();
    }


}
</script>

<style>

</style>