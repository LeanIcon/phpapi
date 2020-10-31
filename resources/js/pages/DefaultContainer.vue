<template>
<div>
    <nav-bar :authUser="authUser"></nav-bar>
    <side-bar v-if="isAdmin"></side-bar>
    <whole-sale-side-bar v-if="isWholesaler"></whole-sale-side-bar>
    <retail-side-bar v-if="isRetailer"></retail-side-bar>
    <right-bar></right-bar>
    <div class="main-content pr-1">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <bread-crumb v-if="isRetailer"></bread-crumb>
                <!-- end page title -->
                <router-view></router-view>
            </div>
        </div>
    </div>
</div>
</template>

<style src="../../../assets/css/app.css" lang="css"></style>
<style src="../../../assets/css/bootstrap.min.css" lang="css"></style>
<style src="../../../assets/css/icons.min.css" lang="css"></style>
<style src="../../../assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" lang="css"></style>

<script>
// import * as roleHelpers from '../_helpers/role';
import {
    UserTypes
} from "../_helpers/role";
// let ut = roleHelpers;

import NavBarVue from "../components/NavBar.vue";
import SidebarVue from "../components/Sidebar.vue";
import RightBarVue from "../components/RightBar.vue";
import BreadCrumbVue from "../components/BreadCrumb.vue";
import WholesaleSidebarVue from "../components/wholesaler/WholesaleSidebar.vue";
import RetailSidebarVue from "../components/retailer/RetailSidebar.vue";
export default {
    props: ["userMode"],
    components: {
        navBar: NavBarVue,
        sideBar: SidebarVue,
        rightBar: RightBarVue,
        breadCrumb: BreadCrumbVue,
        wholeSaleSideBar: WholesaleSidebarVue,
        retailSideBar: RetailSidebarVue,
    },
    computed: {
        userLogin() {
            return this.$store.getters.account;
        },
        authUser() {
            return this.$store.getters["account/loggedInUser"];
        },
        isAdmin() {
            return this.$store.getters["account/userType"] == UserTypes.admin;
        },
        isWholesaler() {
            return this.$store.getters["account/userType"] == UserTypes.wholesaler;
        },
        isRetailer() {
            return this.$store.getters["account/userType"] == UserTypes.retailer;
        },
        userType() {
            return this.$store.getters["account/userType"];
        },
    },
    created() {
        this.$store.dispatch("products/loadProduct");
    },
};
</script>
