<template>
<div>
    <div class="card">
        <div class="card-body">
            <div>
                <!-- <router-link to="products/add" class="btn btn-success mb-2">
                        <i class="ri-add-box-line"></i>
                        Add Product
                    </router-link> -->
                <button class="btn btn-primary" @click="previewSelectedItems">
                    <i class="ri-file-list-fill"></i>
                    Preview Select Products {{numberOfProducts}}</button>
                <!-- <a href="javascript:void(0);" @click="loadUser" class="btn btn-success mb-2"><i class="fa fa-plus-square"></i> Add Product</a> -->
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="thead-light">
                        <tr>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Manufacturer</th>
                            <th>Packet Size</th>
                            <th>Price</th>
                            <th style="width: 120px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr v-for="(product, index) in products.data" :key="index">

                            <td>{{product.name}}</td>
                            <td>{{productDesc(product)}}</td>
                            <td>{{product.manufacturer.name}}</td>
                            <td>{{product.packet_size}}</td>
                            <td style="width: 150px;">
                                <input v-model="product.price" type="text" class="form-control">
                            </td>
                            <td>
                                <vs-checkbox v-model="multiple_products" :val="product">
                                </vs-checkbox>
                            </td>
                        </tr> -->
                        <product-row v-for="(product, index) in products.data" :key="index" :product="product">

                            <td style="width: 150px;" slot="custom-row">
                                <input v-model="product.price" type="text" class="form-control">
                            </td>

                            <td slot="action" style="width: 150px;">
                                <vs-checkbox v-model="multiple_products" :val="product">
                                </vs-checkbox>
                            </td>

                        </product-row>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12" v-show="products.links && products.meta">
            <nav>
                <ul class="pagination" style="cursor:pointer">
                    <li class="page-item" :class="{'disabled': !products.links.prev , 'active': products.links.prev != null}">
                        <a class="page-link" @click="getPrevPage">Previous</a>
                    </li>
                    <span class="mr-3"></span>
                    <li class="page-item" :class="{'disabled': !products.links.next, 'active': products.links.next != null}">
                        <a class="page-link" @click="getNextPage">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <modal name="product-preview-modal" :width="700" :adaptive="true" :height="600">
        <div class="card">
            <div class="card-header">
                SELECTED LIST
            </div>
            <div class="card-body">
                <button class="btn btn-primary" @click="saveBulkSave">
                    <i class="ri-file-list-fill"></i>
                    SAVE
                </button>
                <div class="table-responsive mt-3">
                    <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Manufacturer</th>
                                <th>Packet Size</th>
                                <th>Price(&cent;)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in multiple_products" :key="index">
                                <td>{{product.name}}</td>
                                <td>{{productDesc(product)}}</td>
                                <td>{{product.manufacturer.name}}</td>
                                <td>{{product.packet_size}}</td>
                                <td style="width: 75px;">
                                    {{product.price}}
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
import ProductRowVue from '../../components/product/ProductRow.vue';
export default {
    components: {
        ProductRow: ProductRowVue
    },

    data() {
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
            myprod: {
                product_id: 0,
                price: 0
            },
            products: {},
            manufacturers: {},
            links: {},
            selected_products: [],
            isCheckAll: false,
            loading: false,
            multiple_products: [],
            copyItems: []
        }
    },
    methods: {
        previewSelectedItems(product) {
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
        lookNewModal() {
            this.$refs.somemodal.show();
        },
        updateCheck() {
            if (this.selected_products.length == this.products.data.length) {
                this.isCheckAll = true;
            } else {
                this.isCheckAll = false;
            }
            // this.selected_products.push(event.target.value);
            // console.log(this.selected_products);
            // console.log(Object.values(this.selected_products).length);
        },
        async saveBulkSave() {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            const data = this.multiple_products
            const products = this.getPriceAndProduct();
            this.copyItems = [];
            await axios.post('save_bulk', products, {
                    headers: {
                        'Content-type': 'application/json'
                    }
                })
                .then(({
                    data
                }) => {
                    console.log(data);
                    this.loading != this.loading
                    loading.close();
                })
                .catch(({
                    response
                }) => {
                    this.loading != this.loading
                    loading.close();
                    this.$router.push({
                        name: 'wholesaler.dashboard'
                    })
                    console.log(response.data)
                })
        },
        getPriceAndProduct() {
            let numofItem = Object.keys(this.multiple_products).length;
            var vm = this;
            if (numofItem > 0) {
                this.multiple_products.forEach(function (item) {
                    const data = {
                        'product_id': item.id,
                        'price': item.price,
                    }
                    vm.copyItems.push(data)
                })
                return this.copyItems;
            }
        },
        openLoader() {
            if (this.loading) {
                const loading = this.$vs.loading()
            }
            loading.close();
        },
        getResults() {
            if (typeof page === 'undefined') {
                page = 1;
                axios.get('admin_products?page=' + page)
                    .then(({
                        data
                    }) => {
                        this.products = data
                    })
                    .catch((error) => console.log("Error"))
            }
        },
        viewProduct(product) {
            console.log("View Product", product)
        },
        loadUser() {
            this.$modal.show('retailer-modal');
        },
        async loadProduct(url = 'admin_products') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(url)
                .then(({
                    data
                }) => {
                    this.products = data
                    this.loading != this.loading
                    loading.close();
                })
                .catch((error) => console.log("Error"))
        },
        async loadManufacturers() {
            await axios.get('manufacturers')
                .then(({
                    data
                }) => {
                    this.manufacturers = data
                })
                .catch(({
                    response
                }) => console.log(response))
        },
        productDesc(product) {
            return product.active_ingredients + ' ' + product.strength;

        },
        getNextPage() {
            this.loadProduct(this.products.links.next);
        },
        getPrevPage() {
            this.loadProduct(this.products.links.prev);
        },
    },
    computed: {
        productDescription() {
            return product.active_ingredients + product.strength;
        },
        numberOfProducts() {
            // console.log(this.multiple_products);
            let numofItem = Object.keys(this.multiple_products).length;
            console.log(numofItem);
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
