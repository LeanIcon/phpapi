<template>
  <div>
        <div class="card">
            <div class="card-body">
                <div>
                    <!-- <router-link to="products/add" class="btn btn-success mb-2">
                        <i class="ri-add-box-line"></i>
                        Add Product
                    </router-link> -->
                    <button class="btn btn-primary" @click="previewSelectedItems" >
                        <i class="ri-file-list-fill"></i>
                        Preview Select Products</button>
                    <!-- <a href="javascript:void(0);" @click="loadUser" class="btn btn-success mb-2"><i class="fa fa-plus-square"></i> Add Product</a> -->
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <!-- <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck">
                                        <label class="custom-control-label" for="customercheck">&nbsp;</label>
                                    </div>
                                </th> -->
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Manufacturer</th>
                                <th>Packet Size</th>
                                <th>Price</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in products.data" :key="index" >
                                <!-- <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customercheck3">
                                        <label class="custom-control-label" for="customercheck3">&nbsp;</label>
                                    </div>
                                </td> -->

                                <td>{{product.name}}</td>
                                <td>{{productDesc(product)}}</td>
                                <td>{{product.manufacturer.name}}</td>
                                <td>{{product.packet_size}}</td>
                                <td style="width: 150px;" >
                                    <input v-model="product.price" type="text" class="form-control">
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"  v-model="selected_products" :value="product" @change="updateCheck()"  >
                                    </div>
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
        <modal name="product-preview-modal"
            :width="700"
            :height="500"
            :adaptive="true" >
            <div class="card">
            <div class="card-header">
                SELECTED LIST
            </div>
            <div class="card-body">
            <div class="table-responsive mt-3">
                    <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Manufacturer</th>
                                <th>Packet Size</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in selected_products" :key="index" >
                                <td>{{product.name}}</td>
                                <td>{{productDesc(product)}}</td>
                                <td>{{product.manufacturer.name}}</td>
                                <td>{{product.packet_size}}</td>
                                <td style="width: 75px;" >
                                    <input v-model="product.price" type="text" class="form-control">
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </modal>
</div>
</template>
<script>
export default {

    data () {
        return {
            product: {
                id: '',
                manufacturer: '',
                name: '',
                category: '',
                category_type: '',
                dosage_form: '',
                drug_class: '',
                strenght: '',
                packet_size: '',
                price: ''
            },
            products: {},
            manufacturers: {},
            links: {},
            selected_products: [],
            isCheckAll: false,
            loading: false
        }
    },
    methods: {
        previewSelectedItems(product){
            this.$modal.show('product-preview-modal');
            this.product.name = product.name
            this.product.manufacturer = product.manufacturer
            this.product.category = product.category
            this.product.category_type = product.category_type
            this.product.dosage_form = product.dosage_form
            this.product.drug_class = product.drug_class
            this.product.strenght = product.strenght
            this.product.packet_size = product.packet_size
        },
        updateCheck(){
            if(this.selected_products.length == this.products.data.length) {
                this.isCheckAll = true;
            }else{
                this.isCheckAll = false;
            }
            // this.selected_products.push(event.target.value);
            console.log(this.selected_products);
            console.log(Object.values(this.selected_products).length);
        },
        openLoader(){
            if (this.loading) {
                const loading = this.$vs.loading()
            }
            loading.close();
        },
        getResults(){
            if(typeof page === 'undefined') {
                page = 1;
                axios.get('admin_products?page='+ page)
                .then(({data}) => {
                    this.products = data
                    })
                .catch((error) => console.log(error))
            }
        },
        viewProduct(product){
            console.log("View Product", product)
        },
        loadUser() {
            this.$modal.show('retailer-modal');
        },
        async loadProduct(url = 'admin_products') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(url)
            .then(({data}) => {
                this.products = data
                this.loading != this.loading
                loading.close();
                })
            .catch((error) => console.log(error))
        },
        async loadManufacturers() {
            await axios.get('manufacturers')
            .then(({data}) => {
                console.log(data.data);
                this.manufacturers = data
            })
            .catch(({response}) => console.log(response))
        },
        productDesc(product){
            return product.active_ingredients + ' ' + product.strength;
        },
        getNextPage(){
            this.loadProduct(this.products.links.next);
        },
        getPrevPage(){
        this.loadProduct(this.products.links.prev);
        },
    },
    computed: {
        productDescription() {
            return product.active_ingredients + product.strength;
        }
    },
    mounted() {
        this.loadProduct();
        this.loadManufacturers();
    },

}
</script>

<style>
     /* table, input, a, label {
        font-family: 'Roboto' !important;
    } */
</style>