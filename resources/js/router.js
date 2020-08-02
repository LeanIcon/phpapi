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
            { path: 'products', component: AdminProductsPage,
                children: [
                    {path: 'add', component: AdminProductsPage},
                    {path: 'edit', component: AdminProductsPage},
                    {path: 'view', component: AdminProductsPage},
                ]
            },
            { path: 'settings', component: DashboardPage },
            { path: '*', component: Page404 },
        ]
    },

];

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;