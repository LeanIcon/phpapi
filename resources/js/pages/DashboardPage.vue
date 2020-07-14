<template>
  <div>
    <nav-bar></nav-bar>
    <side-bar></side-bar>
    <right-bar></right-bar>
  </div>
</template>

<script>
import NavBarVue from '../components/NavBar.vue'
import SidebarVue from '../components/Sidebar.vue'
import RightBarVue from '../components/RightBar.vue'
export default {
    components: {
        'navBar' : NavBarVue,
        'sideBar' : SidebarVue,
        'rightBar' : RightBarVue
    }

}
</script>

<style>

</style>