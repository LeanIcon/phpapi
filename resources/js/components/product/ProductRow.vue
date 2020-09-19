<template>
<tr>
    <td> <img style="width:75px;" class="rounded-circle" :src="'/assets/images/product/drugsamp.jpg'" :alt="product.name ? product.name : product.product_name"> {{product.name ? product.name : product.product_name}}</td>
    <td>{{productDesc(product)}}</td>
    <td>{{product.manufacturer.name}}</td>
    <td>{{product.packet_size}}</td>
    <slot name="custom-row"></slot>
    <slot name="action"></slot>


</tr>
</template>

<script>
export default {
    props: ['product'],
    methods: {
        productDesc(product) {
            return product.active_ingredients + ' ' + product.strength;
        },
    }

}
</script>

<style>

</style>
