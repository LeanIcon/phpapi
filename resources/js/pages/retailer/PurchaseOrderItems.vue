<template>
<div>
    <div>Purhcase OrderItems</div>
    <vs-button border @click="savePurchaseOrder()">
        SAVE
    </vs-button>
    <table class="table table-centered dt-responsive nowrap no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead class="thead-light">
            <tr>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Manufacturer</th>
                <th>Packet Size</th>
                <th>Price GH₵ </th>
                <th>Qty</th>
                <th>Line Total GH₵ </th>
                <!-- <th style="width: 120px;">Action</th> -->
            </tr>
        </thead>
        <tbody>
            <tr v-for="(product, index) in po_products" :key="index">
                <td>{{product.name ? product.name : product.product_name}}</td>
                <td>
                    {{productDesc(product)}}
                </td>
                <td>{{product.manufacturer.name ? product.manufacturer.name : product.manufacturer}}</td>

                <td>
                    {{product.packet_size}}
                </td>

                <td>
                    {{formatPrice(product)}}
                </td>
                <td>
                    {{product.quantity}}
                </td>
                <td>
                    {{!Number.isNaN(product.price * product.quantity) ? product.price * product.quantity : ''}}
                </td>
                <!-- <td>
                                    <vs-checkbox>
                                    </vs-checkbox>
                                    <a href="javascript:void(0);" @click.prevent="editProduct(product)" class="mr-1 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="ri-edit-box-fill font-size-18"></i></a>
                                </td> -->
            </tr>
        </tbody>
    </table>
    <!-- <sweet-button slot="button">SAVE</sweet-button> -->
</div>
</template>

<script>
export default {
    props: ['po_products'],
    methods: {
        productDesc(product) {
            let active_ing = product.active_ingredients ?? '';
            return active_ing + ' ' + product.strength;
        },
        savePurchaseOrder() {
            this.$emit('savePO');
        },
        formatPrice(product) {
            var formattedPrice = parseFloat(product.price);
            return formattedPrice;
        },
    },

}
</script>

<style>

</style>
