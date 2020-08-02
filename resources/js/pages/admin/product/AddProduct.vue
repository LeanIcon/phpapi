<template>
  <div>
  <form @submit.prevent.stop="addProduct" >
     <div class="card">
         <div class="card-body">
             <div class="row">
         <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="manufacturername">Manufacturer</label>
                         <select v-model="product.manufacturer" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option data-select2-id="3">Select</option>
                            <option value="EL">Electronic</option>
                            <option value="FA">Fashion</option>
                            <option value="FI">Fitness</option>
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
                            <option data-select2-id="3">Select</option>
                            <option value="EL">Electronic</option>
                            <option value="FA">Fashion</option>
                            <option value="FI">Fitness</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Category Type</label>
                        <select v-model="product.category_type" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option data-select2-id="3">Select</option>
                            <option value="EL">Electronic</option>
                            <option value="FA">Fashion</option>
                            <option value="FI">Fitness</option>
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
            </div>

            <!-- <div class="form-group">
                <label for="productdesc">Product Description</label>
                <textarea class="form-control" id="productdesc" rows="5"></textarea>
            </div> -->
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
            <!-- <div class="form-group">
                <label for="productdesc">Product Description</label>
                <textarea class="form-control" id="productdesc" rows="5"></textarea>
            </div> -->
        </div>
        </div>
     </div>
     <div class="form-group">
         <div class="col-lg-5">
        <button class="btn btn-primary col-md-5" >SAVE PRODUCT</button>
         </div>
     </div>
  </div>
    </form>
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
            }
        }
    },
    methods: {
        addProduct() {
            console.log(this.product)
        }
    },

}
</script>

<style>

</style>