<template>
  <div>
    <nav-bar></nav-bar>
    <side-bar></side-bar>
    <right-bar></right-bar>
    <div class="main-content">
      <div class="page-content">
          <div class="container-fluid">
            <router-view></router-view>
          </div>
      </div>
    </div>
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