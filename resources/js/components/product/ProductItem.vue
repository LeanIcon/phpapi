<template>
<tr>
    <td data-th="ID" class="text-center">{{product.id}}</td>
    <td data-th="Product Name">{{product.product_name}}</td>
    <td data-th="Product Desc." class="text-left"> {{product.manufacturer}} </td>
    <td data-th="Packet Size">Packet Size</td>
    <td data-th="Price" class="text-right" style="width: 100px;">{{price}}</td>
    <td data-th="Action" class="text-right">
    <td>
        <vs-checkbox v-model="po_products" :val="product">
        </vs-checkbox>

    </td>
</tr>
</template>

<script>
export default {
    props: ['product']

}
</script>

<style>

</style>
