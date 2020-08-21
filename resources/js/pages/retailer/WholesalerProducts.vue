<template>
  <div>
      <div class="card">
          <div class="card-body">
            <purchase-order-products-table :wholesalerId="this.$route.params.id" ></purchase-order-products-table>
          </div>
      </div>
  </div>
</template>

<script>
import PurchaseOrderProductsTableVue from './PurchaseOrderProductsTable.vue'
export default {
    data() {
        return {
            wholesaler_id: ''
        }
    },
    components: {
          'purchaseOrderProductsTable': PurchaseOrderProductsTableVue
    },
    mounted() {
        this.wholesaler_id = this.$route.params.id;
        console.log("Incoming Wholesaler: ", this.wholesaler_id);
    },

}
</script>

<style>

</style>