<template>
<div>
    <div class="card">
        <div class="card-body">
            <div class="form-group col-lg-4">
                <label for="">Choice of Adding Product</label>
                <select v-model="selectComp" class="form-control">
                    <option value="null" disabled>Select Mode to Add Product</option>
                    <option value="single-product">Single Product</option>
                    <option value="upload-bulk"> Bulk Upload</option>
                </select>
            </div>
        </div>
    </div>
    <component :is="selectComp">

    </component>
</div>
</template>

<script>
import SingleProductVue from './SingleProduct.vue'
import UploadBulkVue from './UploadBulk.vue'

export default {
    data() {
        return {
            selectComp: 'single-product'
        }
    },
    components: {
        'upload-bulk': UploadBulkVue,
        'single-product': SingleProductVue

    }

}
</script>

<style>

</style>
