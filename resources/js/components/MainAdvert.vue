<template>
  <div>
      <carousel :autoplay="true" :nav="true" :items=2>
              <img src="assets/images/nnlogo.png">
              <img src="assets/images/AD.jpg">
              <img src="assets/images/AD 2.jpg">
              <img src="assets/images/AD3.jpg">
              
          </carousel>
  </div>
</template>

<script>
import carousel from 'vue-owl-carousel2'
export default {
    components: {
        carousel
    }

}
</script>

<style>

</style>