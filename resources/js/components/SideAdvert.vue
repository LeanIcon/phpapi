<template>
  <div>
      <carousel :autoplay="true" :nav="false" :items=2 :margin=5 >
              <img src="https://placeimg.com/150/90/any?1">
              <img src="https://placeimg.com/150/90/any?2">
              <img src="https://placeimg.com/150/90/any?3">
              <img src="https://placeimg.com/150/90/any?4">
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