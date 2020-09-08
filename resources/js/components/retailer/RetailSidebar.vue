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
                            <!-- <li class="menu-title">Menu</li> -->

                            <li class="mm-active">
                                <router-link :to="{name: 'retailer.dashboard'}" active-class="active" class="waves-effect">
                                    <i class="ri-dashboard-line"></i>
                                    <span>Dashboard</span>
                                </router-link>
                            </li>

                            <li>
                                <router-link to="/retail/wholesaler" active-class="active" class="waves-effect">
                                    <i class="ri-store-3-fill"></i>
                                    <span>Wholesaler</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{name: 'retailer.price.comparison'}" class="waves-effect" active-class="active">
                                    <i class="ri-shopping-bag-2-fill"></i>
                                    <span>Price Comparison</span>
                                </router-link>
                            </li>
                            
                            <li>
                                <router-link to="/retail/purchase_orders" class="waves-effect" active-class="active">
                                    <i class="ri-shopping-bag-2-fill"></i>
                                    <span>Purchase Orders</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/retail/shortagelist" class="waves-effect" active-class="active">
                                    <i class="ri-shopping-bag-2-fill"></i>
                                    <span>Shortage List</span>
                                </router-link>
                            </li>
                            
                            <li>
                                <router-link :to="{name: 'retailer.invoice'}" class="waves-effect" active-class="active">
                                    <i class="ri-shopping-bag-2-fill"></i>
                                    <span>Invoice</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{name: 'retailer.profle'}" class=" waves-effect" active-class="active">
                                    <i class="ri-shopping-bag-2-fill"></i>
                                    <span>Profile</span>
                                </router-link>
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