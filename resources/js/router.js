/*jshint esversion:8 */
import Vue  from 'vue';
import VueRouter  from "vue-router";
import store from './store/store';
import { UserTypes, Role } from './_helpers/role';

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
import RetailerDetailsPage from './pages/RetailerDetailsPage.vue';
import WholesaleDashboardPage from './pages/wholesaler/WholesalerDashboardPage.vue';
import RetailDashboardPage from './pages/retailer/RetailerDashboardPage.vue';
import BasicLayout from './layouts/BasicLayout';
import RegisterPage from './pages/RegisterPage';
import RecoverPasswordPage from './pages/RecoverPasswordPage.vue';
import WholesalerProducts from './pages/wholesaler/WholesalerProducts.vue';
import WholesalerProductAdd from './pages/wholesaler/WholesalerProductAdd.vue';
import WholesalerDetails from './pages/retailer/WholesalerDetails.vue';
import ShortageListPage from './pages/retailer/ShortageListPage.vue';
import PurchaseOrderList from './pages/retailer/PurchaseOrderList.vue';
import RetailerProfilePage from './pages/retailer/RetailerProfilePage.vue';

import ShortageListCreatePage from './pages/retailer/ShortageListCreatePage.vue';
import WholesalerPurchaseOrderList from './pages/wholesaler/PurchaseOrderList.vue';
import PriceComparisonPage from './pages/PriceComparisonPage.vue';
import PurchaseOrderView from './pages/wholesaler/PurchaseOrderView.vue';
import FeedBackPage from './pages/FeedBackPage.vue';
import RetailerWholesaler from './pages/retailer/RetailerWholesaler.vue';
import WholesalerProductsPage from './pages/retailer/WholesalerProducts.vue';
import WholesalerProfilePage from './pages/wholesaler/WholeSalerProfilePage.vue';

import WholesalerInvoiceList from './pages/wholesaler/WholesalerInvoiceList.vue';
import RetailerInvoiceList from './pages/retailer/RetailerInvoiceList.vue';


Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        component: BasicLayout,
        meta: {redirectIfAuthenticated: true },
        children: [
            { path: '/', component: LoginPage },
            { path: 'login', component: LoginPage },
            { path: 'register', component: RegisterPage },
            { path: '/register', component: RegisterPage },
            { path: '/recover_password', component: RecoverPasswordPage },
        ]
    },
    {
        path: '/admin',
        component: DefaultPage,
        meta: {requiredAuth: true},
         beforeEnter: async (to, from, next) => {
             var hasPermission = await store.getters['account/userRoles'] ;
            try {
                if (hasPermission.includes(Role.Admin)) {
                    next();
                }else{
                    if (hasPermission.includes(Role.Retailer)) {
                        next({name: 'retailer.dashboard'});
                    }
                    if (hasPermission.includes(Role.Wholesaler)) {
                        next({name: 'wholesaler.dashboard'});
                    }
                }
            } catch (error) {
                next({name: 'login'});
            }
        },
        children: [
            { path: '/', component: DashboardPage,  name: 'admin' },
            { path: '/dashboard', component: DashboardPage,  name: 'admin.dashboard' },
            { path: 'retailers', component: RetailerPage },
            { path: 'wholesalers', component: WholealerPage },
            { path: 'user/details/:userId', component: UserDetailsPage, name: 'user_details', props: true },
            { path: 'user/page/:userId', component: RetailerDetailsPage, name: 'user_page', props: true },
            { path: 'products', component: AdminProductsPage},
            { path: 'products/add', component: AdProductsPage},
            { path: 'products/edit', component: AdProductsPage},
            { path: 'products/view', component: AdProductsPage},
            { path: 'settings', component: DashboardPage },
            { path: 'feedback', component: FeedBackPage },
            { path: '*', component: Page404 },
        ]
    },
    {
        path: '/wholesale',
        component: DefaultPage,
        meta: {requiredAuth: true},
        beforeEnter: async (to, from, next) => {
            var hasPermission = await store.getters['account/userRoles'] ;
           try {
               if (hasPermission.includes(Role.Wholesaler)) {
                   next();
               }else{
                   if (hasPermission.includes(Role.Retailer)) {
                       next({name: 'retailer.dashboard'});
                   }
                   if (hasPermission.includes(Role.Admin)) {
                       next({name: 'admin.dashboard'});
                   }
               }
           } catch (error) {
                next({name: 'login', query:{redirectFrom: to.fullPath} });
           }
       },
        children: [
            { path: '/', component: WholesaleDashboardPage, name: 'wholesaler' },
            { path: '/dashboard', component: WholesaleDashboardPage, name: 'wholesaler.dashboard' },
            { path: 'retailers', component: RetailerPage },
            { path: 'user/details/:userId', component: UserDetailsPage, name: 'wholesale_details', props: true },
            { path: 'user/page/:userId', component: RetailerDetailsPage, name: 'wholesale_page', props: true },
            { path: 'products', component: WholesalerProducts},
            { path: 'purchase_orders', component: WholesalerPurchaseOrderList},
            { path: 'purchase_orders/:purchase_order_id/view', component: PurchaseOrderView, name: 'purchase_order.view', props: true},
            { path: 'products/add', component: WholesalerProductAdd},
            { path: 'products/edit', component: WholesalerProductAdd},
            { path: 'products/view', component: WholesalerProductAdd},
            { path: 'settings/profile', component: WholesalerProfilePage, name: 'wholesaler.profle'},
            { path: 'orders/invoice_list', component: WholesalerInvoiceList, name: 'wholesaler.invoices'},
            { path: '*', component: Page404 },
        ]
    },
    {
        path: '/retail',
        component: DefaultPage,
        meta: {requiredAuth: true,},
        beforeEnter: async (to, from, next) => {
            var hasPermission = await store.getters['account/userRoles'] ;
           try {
               if (hasPermission.includes(Role.Retailer)) {
                   next();
               }else{
                   if (hasPermission.includes(Role.Wholesaler)) {
                       next({name: 'wholesaler.dashboard'});
                   }
                   if (hasPermission.includes(Role.Admin)) {
                       next({name: 'admin.dashboard'});
                   }
               }
           } catch (error) {
                next({name: 'login'});
           }
       },
        children: [
            { path: '/', component: RetailDashboardPage,  name: 'retailer' },
            { path: '/dashboard', component: RetailDashboardPage,  name: 'retailer.dashboard' },
            { path: 'wholesaler', component: RetailerWholesaler, name: 'wholesalers' },
            { path: 'wholesaler/detail', component: WholesalerDetails, name: 'wholesaler.detail' },
            { path: 'wholesaler/:id/products', component: WholesalerProductsPage, name: 'wholesaler.products' },
            { path: 'user/details/:userId', component: UserDetailsPage, name: 'retail_details', props: true },
            { path: 'user/page/:userId', component: RetailerDetailsPage, name: 'retail_page' },
            { path: 'shortagelist', component: ShortageListPage},
            { path: 'shortage/create', component: ShortageListCreatePage},
            { path: 'purchase_orders', component: PurchaseOrderList},
            { path: 'products/edit', component: AdProductsPage},
            { path: 'products/view', component: AdProductsPage},
            { path: 'price_comparison', component: PriceComparisonPage, name: 'retailer.price.comparison'},
            { path: 'order/invoice_list', component: RetailerInvoiceList, name: 'retailer.invoice'},
            { path: 'profile', component: RetailerProfilePage, name: 'retailer.profle'},
            { path: '*', component: Page404 },
        ]
    },
    { path: '*', component: Page404 },

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


// const authAdmin = async (to, from, next) => {
//     const checkRoles = await store.getters['account/userRoles'];
//     if (checkRoles.includes(Role.Admin)) {
//         next({name: 'admin.dashboard'});
//         return;
//     } else {
//         next();
//     }
// };

// const authRetailer = async (to, from, next) => {
//     const checkRoles = await store.getters['account/userRoles'];
//     if (checkRoles.includes(Role.Retailer)) {
//         next({name: 'retailer.dashboard'});
//         return;
//     } else {
//         next();
//     }
// };

// const authWholesaler = async (to, from, next) => {
//     const checkRoles = await store.getters['account/userRoles'];
//     if (checkRoles.includes(Role.Wholesaler)) {
//         next({name: 'wholesaler.dashboard'});
//         return;
//     } else {
//         next();
//     }
// };

router.beforeEach( async (to, from, next) => {
    const publicPages = ['/login', '/register', 'home','/', '/recover_password'];
    const authRequired = !publicPages.includes(to.path);
    const loggedIn = localStorage.getItem('user');
    const isAuth = localStorage.getItem('user');

    const checkRoles = await store.getters['account/userRoles'];
    const checkAuth = await store.getters['account/userAuth'];
    const checType = await store.getters['account/userType'];



    if (to.matched.some(m => m.meta.redirectIfAuthenticated) && isAuth) {
        if(checType == UserTypes.admin){
            next({name: 'admin.dashboard'});
            return;
        }
        if(checType == UserTypes.wholesaler){
            next({name: 'wholesaler.dashboard'});
            return;
        }
        if(checType == UserTypes.retailer){
            next({name: 'retailer.dashboard'});
            return;
        }else{
            next();
        }
    }


    // if (to.matched.some(m => m.meta.adminAuth)) {
    //     if(checkRoles.includes(Role.Admin)){
    //         next();
    //     }else{
    //         next({name: 'admin.dashboard'});
    //     }
    // }
    // else if (to.matched.some(m => m.meta.wholesalerAuth)) {
    //     if(checkRoles.includes(Role.Wholesaler)){
    //         next();
    //     }else{
    //         next({name: 'wholesaler.dashboard'});
    //     }
    // }
    // else if (to.matched.some(m => m.meta.wholesalerAuth)) {
    //     if(checkRoles.includes(Role.Retailer)){
    //         next();
    //     }else{
    //         next({name: 'retail.dashboard'});
    //     }
    // }


    if (authRequired && !loggedIn ) {
        next('/login');
    } else {
        next();
    }
});


export default router;