<template>
<div>
    <form @submit.prevent="saveProduct">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="manufacturername">Manufacturer</label>
                                    <select v-model="product.manufacturer" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="" disabled hidden>Select</option>
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
                                <label class="control-label">Generic Name</label>
                                <input v-model="product.active_ingredients" id="active_ingredients" name="active_ingredients" type="text" class="form-control">
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Drug Legal Status</label>
                                <select v-model="product.drug_legal_status" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option>Select</option>
                                    <option :value="category_type.id" v-for="(category_type, index) in category_types.data" :key="index">{{category_type.name}}</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="manufacturername">Dosage Form</label>
                                    <select v-model="product.dosage_form_id" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="undefined" disabled>Select</option>
                                        <option :value="dosage_form.id" v-for="(dosage_form, index) in dosage_forms.data" :key="index">{{dosage_form.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="drugclassname">Therapeutic Class</label>
                                <select v-model="product.therapeutic_class" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option>Select</option>
                                    <option :value="drug_class.name" v-for="(drug_class, index) in drugclasses.data" :key="index">{{drug_class.name}}</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="strenght">Strength</label>
                                    <input v-model="product.strength" id="strenght" name="strenght" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="packet_size">Packet Size</label>
                                    <input v-model="product.packet_size" id="packet_size" name="packet_size" type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                <label for="productdesc">Product Description</label>
                <textarea class="form-control" id="productdesc" rows="5"></textarea>
            </div> -->
                    </div>
                    <div class="col-lg-3">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="image">Drug Image</label>
                                    <picture-input ref="pictureInput" @change="onPictureChanged" :removable="true" @remove="onPictureRemoved" accept="image/jpeg, image/png"></picture-input>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                <label for="productdesc">Product Descriptions</label>
                <textarea class="form-control" id="productdesc" rows="5"></textarea>
            </div> -->
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-5">
                    <button type="submit" class="btn btn-primary col-md-5">SAVE PRODUCT</button>
                </div>
            </div>
        </div>
    </form>
</div>
</template>

<script>
import PictureInput from 'vue-picture-input'
export default {
    components: {
        PictureInput
    },
    data() {
        return {
             product: {
                manufacturer_id: '',
                name: '',
                category: '',
                category_type: '',
                dosage_form: '',
                drug_class: '',
                strength: '',
                packet_size: '',
                drug_class: '',
                drug_legal_status: '',
                therapeutic_class: '',
                active_ingredients: ''
            },
            productImage: '',
            manufacturers: {},
            drugclasses: {},
            dosage_forms: {},
            product_category: {},
            category_types: {},
            drug_legal_statuses: {},

            links: {}
        }
    },
    methods: {
        
        openNotification(position = null, color) {
            const noti = this.$vs.notification({
                color,
                position,
                title: 'Product Save',
                text: 'Product Save Successfully'
            })
        },
        
        saveProduct(url = 'admin_products') {
            const data = this.product;
            // console.log(this.product);
            // return;
            axios.post('admin_products', data)
                .then((response) => {
                    console.log(response)
                    this.openNotification('top-right', 'success')
                    this.product = {}
                    // this.$noty.success("Product Save Successfully")
                })
                .catch(({
                    response
                }) => console.log("Error"))
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
        
        async loadDosageForm() {
            await axios.get('dosage_form')
                .then(({
                    data
                }) => {
                    this.dosage_forms = data
                })
                .catch(({
                    response
                }) => console.log("Error"))
        },
         async loaddrugclass() {
            await axios.get('drug_class')
                .then(({
                    data
                }) => {
                    this.drugclasses = data
                    // console.log(data);
                })
                .catch(({
                    response
                }) => console.log(response))
        },
        onPictureChanged() {
            console.log("New Picture loaded")
            if (this.$refs.pictureInput.file) {
                this.productImage = this.$refs.pictureInput.file
                // console.log(this.productImage)
            } else {
                console.log("Image Upload not Supported")
            }
        },
        onPictureRemoved() {
            console.log("Picture Removed")
        },

        async loaddruglegalstatus() {
            await axios.get('category_types')
                .then(({
                    data
                }) => {
                    this.category_types = data
                    // console.log(data);
                })
                .catch(({
                    response
                }) => console.log(response))
        },
        // async loadCategoryTypes(category_type) {
        //     await axios.get('category_types?product_category_id=' + category_type)
        //         .then(({
        //             data
        //         }) => {
        //             this.category_types = data
        //         })
        //         .catch(({
        //             response
        //         }) => console.log("Error"))
        // },
    },
    computed: {},
    mounted() {
        this.loadManufacturers();
        // this.loadProductCategory();
        this.loadDosageForm();
        this.loaddrugclass();
        this.loaddruglegalstatus();
    },

}
</script>

<style>

</style>
