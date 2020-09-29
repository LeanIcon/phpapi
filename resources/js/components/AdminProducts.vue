<template>
<div>
    <div class="card">
        <div class="card-body">
            <div>
                <router-link to="products/add" class="btn btn-success mb-2">
                    <i class="ri-add-box-line"></i>
                    Add Products
                </router-link>
                <input type="text" v-model="keywords">
                <!-- <a href="javascript:void(0);" @click="loadUser" class="btn btn-success mb-2"><i class="fa fa-plus-square"></i> Add Product</a> -->
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 20px;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customercheck">
                                    <label class="custom-control-label" for="customercheck">&nbsp;</label>
                                </div>
                            </th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Manufacturer</th>
                            <th>Packet Size</th>
                            <th style="width: 120px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div v-if="products.length > 0" />
                        <tr v-for="(product, index) in products.data" :key="index">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customercheck3">
                                    <label class="custom-control-label" for="customercheck3">&nbsp;</label>
                                </div>
                            </td>

                            <td> <img style="width:75px;" class="mg-fluid img-thumbnail" :src="'/assets/images/product/drugsamp.jpg'" :alt="product.name ? product.name : product.product_name"> {{product.name ? product.name : product.product_name}}</td>
                            <td>{{productDesc(product)}}</td>
                            <td>{{product.manufacturer.name}}</td>

                            <td>
                                {{product.packet_size}}
                            </td>
                            <td>
                                <a href="javascript:void(0);" @click.prevent="editProduct(product)" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-edit-box-fill font-size-18"></i></a>
                                <a href="javascript:void(0);" @click.prevent="viewProduct(product)" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line font-size-18"></i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- <div class="col-md-12" v-show="products.links && products.meta"> -->
            <!-- <pagination :data="laravelData" v-on:pagination-change-page="getResults"></pagination> -->
            <!-- <nav>
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
        </div> -->
    </div>
    <modal name="product-modal" :width="700" :height="500" :adaptive="true">
        <div class="card">
            <div class="card-header">
                PRODUCT
            </div>
            <div class="card-body">
                <form action="" class="form">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="manufacturername">Manufacturer</label>
                                <select v-model="product.manufacturer.id" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option>Select</option>
                                    <option :value="manufacturer.id" v-for="(manufacturer, index) in manufacturers.data" :key="index">{{manufacturer.name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input v-model="product.name" id="name" name="name" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Category</label>
                                <select v-model="product.category" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option>Select</option>
                                    <option :value="manufacturer.id" v-for="(manufacturer, index) in manufacturers" :key="index">{{manufacturer.name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Category Type</label>
                                <select v-model="product.category_type" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="3">Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="manufacturername">Dosage Forms</label>
                                <input v-model="product.dosage_form" id="dosage_form" name="dosage_form" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="manufacturerbrand">Drug Class</label>
                                <input v-model="product.drug_class" id="drug_class" name="dosage_class" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="strenght">Strength</label>
                                <input v-model="product.strenght" id="strenght" name="strenght" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="packet_size">Packet Size</label>
                                <input v-model="product.packet_size" id="packet_size" name="packet_size" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary">UPDATE</button>
                </form>
            </div>
        </div>
    </modal>
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
                packet_size: ''
            },
            products: [],
            manufacturers: {},
            links: {},
            loading: false,
            keywords: null,
            products: []
        }
    },
    methods: {
        fetch(){
                axios.get('product/search', { params: {keywords: this.keywords }})
                .then(response => this.products = response.data,
                    console.log("Working")
                )
                .catch(error => {});
        },
        editProduct(product) {
            this.$modal.show('product-modal');
            this.product.name = product.name
            this.product.manufacturer = product.manufacturer
            this.product.category = product.category
            this.product.category_type = product.category_type
            this.product.dosage_form = product.dosage_form
            this.product.drug_class = product.drug_class
            this.product.strenght = product.strenght
            this.product.packet_size = product.packet_size
        },
        openLoader() {
            if (this.loading) {
                const loading = this.$vs.loading()
            }
            loading.close();
        },
        // getResults(){
        //     if(typeof page === 'undefined') {
        //         page = 1;
        //         axios.get('admin_products?page='+ page)
        //         .then(({data}) => {
        //             this.products = data
        //             })
        //         .catch((error) => console.log(error))
        //     }
        // },
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
                .catch((error) => console.log(error))
        },
        async loadManufacturers() {
            await axios.get('manufacturers')
                .then(({
                    data
                }) => {
                    // console.log(data.data);
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
        productDescription() {
            return product.active_ingredients + product.strength;
        },
        adminProducts() {
            return this.$store.getters['products/getAllProduct'];
        },
    },
    mounted() {
        this.loadProduct();
        this.loadManufacturers();
        // this.products = this.adminProducts

    },

    watch: {
        keywords(after, before) {
             this.fetch();
         }
     },

}
</script>

<style>
table,
input,
a,
label {
    font-family: 'Roboto' !important;
}
</style><style>
</style>
</style>
