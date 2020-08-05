<template>
  <nav-bar :authUser="userLogin" ></nav-bar>
</template>

<script>
import NavBarVue from '../components/NavBar.vue'
export default {
    components: {
        'navBar' : NavBarVue
    },

}
</script>

<style>

</style>