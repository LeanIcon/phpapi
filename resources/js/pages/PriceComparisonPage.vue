<template>
  <div>
      Price Comparison
      <!-- <retail-side-bar v-if="isRetailer"></retail-side-bar> -->
      
  </div>
</template>

<script>
import RetailSidebarVue from '../components/retailer/RetailSidebar.vue'
import { UserTypes } from '../_helpers/role'
export default {
    components: {
        'retailSideBar': RetailSidebarVue
    },
    computed: {
        isRetailer() {
          return this.$store.getters['account/userType'] == UserTypes.retailer;
        },
    }

}
</script>

<style scoped >

    .page-content{
        padding: 0px !important;
    }

</style>