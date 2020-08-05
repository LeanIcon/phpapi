<template>
  <div>
    <nav-bar :authUser="authUser" ></nav-bar>
    <side-bar></side-bar>
    <right-bar></right-bar>
    <div class="main-content">
      <div class="page-content">
          <div class="container-fluid">
            <!-- start page title -->
              <bread-crumb></bread-crumb>
            <!-- end page title -->
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
import BreadCrumbVue from '../components/BreadCrumb.vue'
export default {
    components: {
        'navBar' : NavBarVue,
        'sideBar' : SidebarVue,
        'rightBar' : RightBarVue,
        'breadCrumb': BreadCrumbVue
    },
    computed: {
      userLogin() {
         return  this.$store.getters.account;
       },
       authUser() {
           return this.$store.getters['account/loggedInUser'];
        }
       
    },
    mounted() {
      console.log("Default Container Mounted", this.authUser)
    },

}
</script>

<style>

</style>