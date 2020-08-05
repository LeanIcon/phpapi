<template>
    <div class="vertical-menu mm-active">

                <div data-simplebar="init" class="h-100 mm-show"><div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer">
                        </div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -16.8px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="mm-active">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled mm-show" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li class="mm-active">
                                <router-link to="/admin" active-class="active" class="waves-effect">
                                    <i class="ri-dashboard-line"></i><span class="badge badge-pill badge-success float-right">3</span>
                                    <span>Dashboard</span>
                                </router-link>
                            </li>

                            <li>
                                 <router-link to="/admin/wholesalers" active-class="active" class="waves-effect">
                                     <i class="ri-store-3-fill"></i>
                                    <span>Wholesalers</span>
                                </router-link>
                            </li>

                            <li>
                                <router-link to="/admin/retailers" active-class="active" class="waves-effect">
                                    <i class="ri-store-3-fill"></i>
                                    <span>Retailers</span>
                                </router-link>
                            </li>
                            <li>
                                 <router-link to="/admin/products" class="waves-effect" active-class="active">
                                   <i class="ri-shopping-bag-2-fill"></i>
                                    <span>Products</span>
                                </router-link>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-newspaper-line"></i>
                                    <span>News / Articles</span>
                                </a>
                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                    <li>
                                        <router-link to="#" class="waves-effect">
                                            News Posts
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link to="#" class="waves-effect">
                                            News Category
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class=" ri-database-fill"></i>
                                    <span>Data Entry</span>
                                </a>
                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                    <li>
                                        <router-link to="#" class="waves-effect">
                                           Manufacturer
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link to="#" class="waves-effect">
                                            Product Categories
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link to="#" class="waves-effect">
                                            Drug Legal Status
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link to="#" class="waves-effect">
                                            Drug Class
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link to="#" class="waves-effect">
                                            Drug Dosage Form
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link to="#" class="waves-effect">
                                           Region
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link to="#" class="waves-effect">
                                           Location
                                        </router-link>
                                    </li>
                                </ul>
                            </li>

                            

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 874px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 133px; transform: translate3d(0px, 208px, 0px); display: block;"></div></div></div>
            </div>
</template>

<script>
export default {

}
</script>

<style>
    ul > li > * {
        font-family: 'Roboto' !important;
    }
</style>