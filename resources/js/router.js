/*jshint esversion:8 */
import Vue  from 'vue';
import VueRouter  from "vue-router";
import store from './store/store';
import { UserTypes } from './_helpers/role';

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
import ShortageListCreatePage from './pages/retailer/ShortageListCreatePage.vue';
import WholesalerPurchaseOrderList from './pages/wholesaler/PurchaseOrderList.vue';
import PurchaseOrderView from './pages/wholesaler/PurchaseOrderView.vue';
import FeedBackPage from './pages/FeedBackPage.vue';


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
            { path: '*', component: Page404 },
        ]
    },
    {
        path: '/retail',
        component: DefaultPage,
        children: [
            { path: '/', component: RetailDashboardPage,  name: 'retailer' },
            { path: '/dashboard', component: RetailDashboardPage,  name: 'retailer.dashboard' },
            { path: 'wholesaler', component: WholesalerDetails, name: 'wholesaler.detail' },
            { path: 'user/details/:userId', component: UserDetailsPage, name: 'retail_details', props: true },
            { path: 'user/page/:userId', component: RetailerDetailsPage, name: 'retail_page' },
            { path: 'shortagelist', component: ShortageListPage},
            { path: 'shortage/create', component: ShortageListCreatePage},
            { path: 'purchase_orders', component: PurchaseOrderList},
            { path: 'products/edit', component: AdProductsPage},
            { path: 'products/view', component: AdProductsPage},
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


// const authWholesaler = (to, from, next) => {
//     if (store.getters['account/userType'] == UserTypes.wholesaler) {
//         next({name: 'wholesaler'});
//         return;
//     } else {
//         next();
//     }
// };

// const authRetailer = (to, from, next) => {
//     if (store.getters['account/userType'] == UserTypes.retailer) {
//         next({name: 'retailer'});
//         return;
//     } else {
//         next();
//     }
// };

// const authAdmin = (to, from, next) => {
//     if (store.getters['account/userType'] == UserTypes.retailer) {
//         next({name: 'retailer'});
//         return;
//     } else {
//         next();
//     }
// };

// const authSysAdmin = store.getters['account/userType'];

router.beforeEach( async (to, from, next) => {
    const publicPages = ['/login', '/register', 'home','/', '/recover_password'];
    const authRequired = !publicPages.includes(to.path);
    const loggedIn = localStorage.getItem('user');
    const isAuth = localStorage.getItem('user');

    const checkAuth = await store.getters['account/userAuth'];
    const checType = await store.getters['account/userType'];
    // console.log("Auth User Type ", checType);


    if (to.matched.some(m => m.meta.redirectIfAuthenticated) && isAuth) {
        if(checType == UserTypes.admin){
            next({name: 'admin'});
            return;
        }
        if(checType == UserTypes.wholesaler){
            next({name: 'wholesaler'});
            return;
        }
        if(checType == UserTypes.retailer){
            next({name: 'retailer'});
            return;
        }else{
            next();
        }
    }


    // let isPermitted = _.includes()

    // if(to.matched.some(m => m.meta.requiredAuth)) {

    //     if(store.getters['account/userAuth']) {
    //         if (authSysAdmin == UserTypes.admin) {
    //             next('/admin');
    //         }
    //         if (authSysAdmin == UserTypes.retailer) {
    //             next('/retailer');
    //         }
    //         if (authSysAdmin == UserTypes.wholesaler) {
    //             next('/wholesaler');
    //         }
    //     }
    //     next('/login');
    // }

    if (authRequired && !loggedIn ) {
        next('/login');
    } else {
        next();
    }
});


export default router;