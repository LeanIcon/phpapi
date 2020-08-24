<template>
        <tr>
            <td data-th="ID" class="text-center">{{invoiceItem.id}}</td>
            <td data-th="Product Name" >{{invoiceItem.product_name}}</td>
            <td data-th="Product Desc." class="text-left"> {{invoiceItem.manufacturer}}   </td>
            <td data-th="Quantity" class="text-right" style="width: 90px;" >{{invoiceItem.quantity}}</td>
            <td data-th="Price" class="text-right" style="width: 100px;">{{invoiceItem.price}} </td>
            <td data-th="SubTotal" class="text-right"> {{subTotal}}</td>
        </tr>
</template>

<script>
export default {
  props: ['invoiceItem'],
  computed: {
    subTotal(){
      return parseFloat(this.invoiceItem.price) * parseInt(this.invoiceItem.quantity)
    }
  },
  methods: {
    updatePOItem(event){
      this.$emit('updateQty', {
        item: this.invoiceItem,
        quantity: parseInt(event.target.value)
      })
    }
  },
}
</script>

<style>

</style>