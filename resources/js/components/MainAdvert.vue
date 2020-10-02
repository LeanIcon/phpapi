<template>
  <div>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/images/nnlogo.png" style="width: 70%; height: 220px;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/images/AD.jpg" style="width: 70%; height: 220px;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/images/AD 2.jpg" style="width: 70%; height: 220px;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

      <!-- <carousel :autoplay="true" :nav="false" :items=2>
              <img src="assets/images/nnlogo.png">
              <img src="assets/images/AD.jpg">
              <img src="assets/images/AD 2.jpg">
              <img src="assets/images/AD3.jpg">
              
          </carousel> -->
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