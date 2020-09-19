<template>
<div>
    <div class="card">
        <div class="card-body">
            <div>
                <router-link to="products/add" class="btn btn-success mb-2">
                    <i class="ri-add-box-line"></i>
                    Add Product
                </router-link>
            </div>
            <product-table :wholesalerId="authUser.id" @editItem="editProduct"></product-table>
        </div>
    </div>
    <modal name="product-modal" :width="700" :height="600" :adaptive="true">
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
                                <select v-model="product.manufacturer.id" disabled class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option>Select</option>
                                    <option :value="manufacturer.id" v-for="(manufacturer, index) in manufacturers.data" :key="index">{{manufacturer.name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input v-model="product.name" id="name" name="name" type="text" disabled class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Category</label>
                                <select v-model="product.category" disabled class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option>Select</option>
                                    <option :value="manufacturer.id" v-for="(manufacturer, index) in manufacturers" :key="index">{{manufacturer.name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Category Type</label>
                                <select disabled v-model="product.category_type" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="3">Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="manufacturername">Dosage Form</label>
                                <input v-model="product.dosage_form" disabled id="dosage_form" name="dosage_form" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="manufacturerbrand">Drug Class</label>
                                <input v-model="product.drug_class" disabled id="drug_class" name="dosage_class" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="strenght">Strength</label>
                                <input v-model="product.strenght" disabled id="strenght" name="strenght" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="packet_size">Packet Size</label>
                                <input v-model="product.packet_size" disabled id="packet_size" name="packet_size" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="packet_size">Price</label>
                                <input v-model.trim="product.price" id="packet_size" name="packet_size" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button @click.prevent="updateProduct" class="btn btn-primary">UPDATE</button>
                </form>
            </div>
        </div>
    </modal>
</div>
</template>

<script>
import ProductTableVue from '../../components/ProductTable.vue';
export default {
    components: {
        'productTable': ProductTableVue
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
            products: {},
            manufacturers: {},
            links: {},
            loading: false
        }
    },
    methods: {
        editProduct(product) {
            this.$modal.show('product-modal');
            this.product.id = product.id
            this.product.name = product.product.name ?? product.product_name
            this.product.manufacturer = product.product.manufacturer
            this.product.category = product.product.category
            this.product.category_type = product.product.category_type
            this.product.dosage_form = product.product.dosage_form
            this.product.drug_class = product.product.drug_class
            this.product.strenght = product.product.strenght
            this.product.packet_size = product.product.packet_size
            this.product.price = product.price
        },
        async updateProduct() {
            const loading = this.$vs.loading();
            console.log('object :>> ', this.product);
            let data = {
                'price': this.product.price
            }
            console.log(data)
            await axios.put(`wholesaler_products/${this.product.id}`, data)
                .then(({
                    data
                }) => {
                    this.$modal.hide('product-modal');
                    console.log(data)
                    this.loading != this.loading
                    location.reload();
                    loading.close();
                })
                .catch(({
                    response
                }) => {
                    this.$modal.hide('product-modal');
                    this.loading != this.loading
                    loading.close();
                    location.reload();
                    // this.$router.push({
                    //     name: 'wholesaler.dashboard'
                    // })
                    console.log(response.data)
                })
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
        async loadManufacturers() {
            await axios.get('manufacturers')
                .then(({
                    data
                }) => {
                    this.manufacturers = data
                })
                .catch(({
                    response
                }) => console.log("Error"))
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
        authUser() {
            return this.$store.getters['account/userData'];
        }
    },
    mounted() {
        this.loadManufacturers();
    },

}
</script>

<style>
/* table, input, a, label {
        font-family: 'Roboto' !important;
    } */
</style>
