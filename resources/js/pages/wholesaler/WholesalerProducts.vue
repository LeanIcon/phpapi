<template>
  <div>
      <div class="card">
          <div class="card-body">
              <div>
                <router-link to="products/add" class="btn btn-success mb-2">
                    <i class="ri-add-box-line"></i>
                    Add Product
                </router-link>
                <router-link to="products/add" class="btn btn-primary mb-2">
                    <i class="ri-inbox-unarchive-fill"></i>
                    UPLOAD
                </router-link>
                </div>
            <product-table :wholesalerId="authUser.id"  @editItem="editProduct" ></product-table>
          </div>
      </div>
     <modal name="product-modal"
            :width="700"
            :height="600"
            :adaptive="true"
     >
        <div class="card">
            <div class="card-header">
                PRODUCT
            </div>
            <div class="card-body">
               <form action="" class="form" >
                   <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="manufacturername">Manufacturer</label>
                         <select v-model="product.manufacturer.id" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option>Select</option>
                            <option :value="manufacturer.id"  v-for="(manufacturer, index) in manufacturers.data" :key="index" >{{manufacturer.name}}</option>
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
                            <option :value="manufacturer.id"  v-for="(manufacturer, index) in manufacturers" :key="index" >{{manufacturer.name}}</option>
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
                        <label for="manufacturername">Dosage Form</label>
                        <input  v-model="product.dosage_form" id="dosage_form" name="dosage_form" type="text" class="form-control">
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
                        <label for="strenght">Strenght</label>
                        <input  v-model="product.strenght" id="strenght" name="strenght" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="packet_size">Packet Size</label>
                        <input v-model="product.packet_size" id="packet_size" name="packet_size" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="packet_size">Price</label>
                        <input v-model="product.price" id="packet_size" name="packet_size" type="text" class="form-control">
                    </div>
                </div>
            </div>
                <button class="btn btn-primary" >UPDATE</button>
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
        'productTable' : ProductTableVue
    },
    data () {
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
                price: ''
            },
            products: {},
            manufacturers: {},
            links: {},
            loading: false
        }
    },
    methods: {
        editProduct(product){
            this.$modal.show('product-modal');
            this.product.name = product.name ?? product.product_name
            this.product.manufacturer = product.manufacturer
            this.product.category = product.category
            this.product.category_type = product.category_type
            this.product.dosage_form = product.dosage_form
            this.product.drug_class = product.drug_class
            this.product.strenght = product.strenght
            this.product.packet_size = product.packet_size
        },
        getResults(){
            if(typeof page === 'undefined') {
                page = 1;
                axios.get('admin_products?page='+ page)
                .then(({data}) => {
                    this.products = data
                    })
                .catch((error) => console.log("Error"))
            }
        },
        viewProduct(product){
            console.log("View Product", product)
        },
        loadUser() {
            this.$modal.show('retailer-modal');
        },
        async loadManufacturers() {
            await axios.get('manufacturers')
            .then(({data}) => {
                this.manufacturers = data
            })
            .catch(({response}) => console.log("Error"))
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