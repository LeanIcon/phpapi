<template>
  <div>
      <div class="card">
          <div class="card-body">
              <div class="form-group col-lg-4">
                  <label for="">Choice of Adding Product</label>
                  <select v-model="selectComp" class="form-control" >
                      <option value="null" disabled>Select Mode to Add Product</option>
                      <option value="product-form" >Single Product</option>
                      <option value="most-product"> Multiple Choices</option>
                      <option value="null" disabled> Bulk Upload</option>
                  </select>
              </div>
          </div>
      </div>
      <component :is="selectComp" >

      </component>
  </div>
</template>

<script>
import ProductFormVue from './ProductForm.vue'
import MostProductsVue from './MostProducts.vue'
export default {
    data() {
        return {
            selectComp: 'product-form'
        }
    },
    components: {
        'product-form': ProductFormVue,
        'most-product' : MostProductsVue
        
    }

}
</script>

<style>

</style>