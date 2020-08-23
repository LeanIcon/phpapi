<template>
        <tr>
            <td data-th="ID" class="text-center">{{poItem.id}}</td>
            <td data-th="Product Name" >{{poItem.product_name}}</td>
            <td data-th="Product Desc." class="text-left"> {{poItem.manufacturer}}   </td>
            <td data-th="Quantity" class="text-right" style="width: 90px;" >
                <input type="number" class="form-control" :value="poItem.quantity" @change="updatePOItem"  > </td>
            <td data-th="Price" class="text-right" style="width: 100px;"><input type="text" :value="poItem.price" class="form-control" disabled> </td>
            <td data-th="SubTotal" class="text-right"> {{subTotal}}</td>
        </tr>
</template>

<script>
export default {
  props: ['poItem'],
  computed: {
    subTotal(){
      return parseFloat(this.poItem.price) * parseInt(this.poItem.quantity)
    }
  },
  methods: {
    updatePOItem(event){
      this.$emit('updateQty', {
        item: this.poItem,
        quantity: parseInt(event.target.value)
      })
    }
  },
}
</script>

<style>

</style>