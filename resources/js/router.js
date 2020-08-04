/*jshint esversion:8 */
import Vue  from 'vue';
import VueRouter  from "vue-router";
// import Login  from "./components/Login.vue";
import LoginPage  from "./pages/LoginPage.vue";
import DashboardPage from './pages/DashboardPage.vue';
import RetailerPage from './pages/Retailer.vue';
import WholealerPage from './pages/Wholesaler.vue';
import DefaultPage from './pages/DefaultContainer';
import Page404 from './pages/404.vue';
import AdminProductsPage from './pages/admin/product/Products.vue';
import AdProductsPage from './pages/admin/product/AddProduct.vue';
import UserDetailsPage from './pages/UserDetailsPage.vue';


Vue.use(VueRouter);

const routes = [
    { path: '/', component: LoginPage },
    {
        path: '/admin',
        component: DefaultPage,
        children: [
            { path: '/', component: DashboardPage },
            { path: 'retailers', component: RetailerPage },
            { path: 'wholesalers', component: WholealerPage },
            { path: 'user/details/:userId', component: UserDetailsPage, name: 'user_details', props: true },
            { path: 'products', component: AdminProductsPage},
            { path: 'products/add', component: AdProductsPage},
            { path: 'products/edit', component: AdProductsPage},
            { path: 'products/view', component: AdProductsPage},
            { path: 'settings', component: DashboardPage },
            { path: '*', component: Page404 },
        ]
    },

];

const router = new VueRouter({
    routes,
    mode: 'history',
    scrollBehavior: function(to, from, savedPosition) {
        if (to.hash) {
            return {selector: to.hash};
        } else {
            return {x: 0, y: 0};
        }
    }
});

export default router;