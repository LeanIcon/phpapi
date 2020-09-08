<template>
  <div>
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

                                <td> <img style="width:75px;" :src="'/assets/images/product/img-6.png'" :alt="product.name ? product.name : product.product_name"> </td>

                                <td>{{productDesc(product)}}</td>
                                <td>{{product.manufacturer.name || product.manufacturer}}</td>
                                 
                                <td>
                                    {{product.packet_size}}
                                </td>

                                <td>
                                    N/A
                                </td>
                               <td>
                                    <a href="javascript:void(0);" @click.prevent="editProduct(product)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-edit-box-fill font-size-18"></i></a>
                                    <a href="javascript:void(0);" @click.prevent="viewProduct(product)" class="mr-1 text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-eye-fill font-size-18"></i></a>
                                    <a href="javascript:void(0);" @click.prevent="deleteProduct(product)" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line font-size-18"></i></a>
                                </td>
                            </tr>
            

                        </tbody>
                    </table>
                </div>
  </div>
</template>

<script>
export default {

    props: ['wholesalerId'],
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
            products: {},
            manufacturers: {},
            links: {},
            loading: false,
        }
    },
    methods: {
        async loadProduct(url = 'wholesaler_products') {
            this.loading = !this.loading
            const loading = this.$vs.loading();
            await axios.get(`${url}`)
            .then(({data}) => {
                this.products = data
                this.loading != this.loading
                console.log(this.products)
                loading.close();
                })
            .catch(({response}) => {
                this.loading != this.loading
                loading.close();
                console.log(response.data)
            })
        },
        editProduct(product) {
            this.$emit('editItem', product);
        },
        viewProduct(product){
             console.log('View Product', product);
        },
        deleteProduct(product){
             console.log('Delete Product', product);
        },
        productDesc(product){
            let active_ing = product.active_ingredients ?? '';
            return active_ing + ' ' + product.strength;
        },
        formatCurrency(value){
            return value.toLocaleString();
        }
    },
    computed: {
        changedWholesaler(){
            return this.wholesalerId
        }
    },
    watch: {
        wholesalerId: function(val) {
            this.loadProduct();
        }
    },
    mounted () {
        this.loadProduct();
    }


}
</script>

<style>

</style>