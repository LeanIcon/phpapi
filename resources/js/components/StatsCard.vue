<template>
  <div :class="cardClass" >
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="media-body overflow-hidden">
            <p class="text-truncate font-size-16 mb-2">{{cardTitle}}</p>
            <h4 class="mb-0">{{cardValue}}</h4>
          </div>
          <div class="text-primary">
            <i class="ri-stack-line font-size-24"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    cardTitle: {
      type: String,
    },
    cardValue:[String, Number],
     
    colLength: {
      type: String,
      default: "4",
    },
  },

  computed: {
      cardClass() {
          return 'col-md-'+this.colLength
      }
  }
};
</script>

<style>
</style>