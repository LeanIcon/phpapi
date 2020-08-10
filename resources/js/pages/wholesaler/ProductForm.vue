<template>
  <div>
  <form @submit.prevent="saveProduct" >
     <div class="card">
         <div class="card-body">
             <div class="row">
         <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="manufacturername">Manufacturer</label>
                           <select v-model="product.manufacturer" @change="onManufacturerChang" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="" disabled hidden >Select</option>
                            <option :value="manufacturer.id"  v-for="(manufacturer, index) in manufacturers.data" :key="index" >{{manufacturer.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="manufacturername">Product Name</label>
                           <select v-model="product.products_id" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="" disabled hidden >Select</option>
                            <option :value="product.id"  v-for="(product, index) in products_by_manu.data" :key="index" >{{product.name}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Category</label>
                        <select v-model="product.product_category_id" @change="onCategoryChang" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="undefined" disabled >Select</option>
                            <option :value="category.id"  v-for="(category, index) in product_category.data" :key="index" >{{category.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Category Type</label>
                        <select v-model="product.category_type" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="undefined" disabled >Select</option>
                            <option :value="category_type.id"  v-for="(category_type, index) in category_types.data" :key="index" >{{category_type.name}}</option>
                        </select>
                    </div>
                </div>
            </div>
              <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="manufacturername">Dosage Form</label>
                        <select v-model="product.dosage_form_id" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="undefined" disabled >Select</option>
                            <option :value="dosage_form.id"  v-for="(dosage_form, index) in dosage_forms.data" :key="index" >{{dosage_form.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="manufacturerbrand">Drug Class</label>
                       <select v-model="product.drug_class_id" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="" disabled hidden >Select</option>
                            <option :value="drug_class.id"  v-for="(drug_class, index) in drug_classes.data" :key="index" >{{drug_class.name}}</option>
                        </select>
                    </div>
                </div>
            </div>
              <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="strenght">Strenght</label>
                        <input  v-model="product.strength" id="strenght" name="strenght" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="packet_size">Packet Size</label>
                        <input v-model="product.packet_size" id="packet_size" name="packet_size" type="text" class="form-control">
                    </div>
                </div>
            </div>
              <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="strenght">Price</label>
                        <input  v-model="product.price" id="price" name="price" type="text" class="form-control">
                    </div>
                </div>
            </div>

        </div>
         <div class="col-lg-4">

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input id="image" name="image" type="file" class="form-control">
                    </div>
                </div>
            </div>

        </div>
        </div>
     </div>
     <div class="form-group">
         <div class="col-lg-5">
        <button type="submit" @click.prevent="saveProduct" class="btn btn-primary col-md-5" >SAVE PRODUCT</button>
         </div>
     </div>
  </div>
    </form>
  </div>
</template>

<script>
export default {
    data () {
        return {
             product: {
                id: '',
                products_id: '',
                manufacturer: '',
                name: '',
                product_category_id: '',
                category_type: '',
                dosage_form_id: '',
                drug_class_id: '',
                strength: '',
                packet_size: '',
                price: ''
            },
            manufacturers: {},
            drug_classes: {},
            dosage_forms: {},
            product_category: {},
            category_types: {},
            products_by_manu: {},

            links: {}
        }
    },
    methods: {
        editProduct(product){
            this.$modal.show('product-modal');
            this.product.name = product.name
            this.product.manufacturer = product.manufacturer
            this.product.category = product.category
            this.product.category_type = product.category_type
            this.product.dosage_form = product.dosage_form
            this.product.drug_class = product.drug_class
            this.product.strength = product.strength
            this.product.packet_size = product.packet_size
        },
        openNotification(position = null, color) {
          const noti = this.$vs.notification({
                color,
                position,
                title: 'Product Save',
                text: 'Product Save Successfully'
            })
        },
        onCategoryChang(category){
            this.loadCategoryTypes(this.product.product_category_id)
        },
        onManufacturerChang(category){
            this.loadProductsByManu(this.product.manufacturer)
        },
        saveProduct(url = 'wholesaler_products') {
            const data  = this.product;
            axios.post('wholesaler_save_single', data, {headers: {'Content-type': 'application/json'}})
            .then((response) => {
                    console.log(response)
                    this.openNotification('top-right','success')
                    this.product = {}
                    // this.$noty.success("Product Save Successfully")
                })
            .catch(({response}) => console.log(response))
        },
        async loadProductsByManu(manufacturer_id) {
            await axios.get('admin_products?manufacturer_id='+manufacturer_id)
            .then(({data}) => {
                this.products_by_manu = data
                console.log(data);
            })
            .catch(({response}) => console.log(response))
        },
        async loadManufacturers() {
                await axios.get('manufacturers')
                .then(({data}) => {
                    this.manufacturers = data
                })
                .catch(({response}) => console.log(response))
        },
        async loadProductCategory() {
            await axios.get('product_category')
            .then(({data}) => {
                this.product_category = data
            })
            .catch(({response}) => console.log(response))
        },
        async loadDosageForm() {
            await axios.get('dosage_form')
            .then(({data}) => {
                this.dosage_forms = data
            })
            .catch(({response}) => console.log(response))
        },
        async loadDrugClass() {
            await axios.get('drug_class')
            .then(({data}) => {
                this.drug_classes = data
            })
            .catch(({response}) => console.log(response))
        },
        async loadCategoryTypes(category_type) {
            await axios.get('category_types?product_category_id='+category_type)
            .then(({data}) => {
                this.category_types = data
                console.log(data);
            })
            .catch(({response}) => console.log(response))
        },
    },
    computed: {
    },
    mounted() {
        this.loadManufacturers();
        this.loadProductCategory();
        this.loadDosageForm();
        this.loadDrugClass();
    },

}
</script>

<style>

</style>