/*jshint esversion:8 */
import Vue  from 'vue';
import VueRouter  from "vue-router";
import store from '../store/store';
import { UserTypes, Role } from '../_helpers/role';
import wholsaleroutes from "./wholsalers";
import retailroutes from "./retailers";

// import Login  from "../components/Login.vue";
import LoginPage  from "../pages/LoginPage.vue";
import DashboardPage from '../pages/DashboardPage.vue';
// import RetailerPage from '../pages/Retailer.vue';
import WholealerPage from '../pages/Wholesaler.vue';
import DefaultPage from '../pages/DefaultContainer';
import Page404 from '../pages/404.vue';
import AdminProductsPage from '../pages/admin/product/Products.vue';
import AdProductsPage from '../pages/admin/product/AddProduct.vue';
import DosageFormPage from '../pages/admin/product/DosageForm.vue';
import AdDosagePage from '../pages/admin/product/AddDosage.vue';
import DrugClassPage from '../pages/admin/product/DrugClass.vue';
import ManufacturerPage from '../pages/admin/product/Manufacturer.vue';
import AdManufacturerPage from '../pages/admin/product/AddManufacturer.vue';
import CategoryPage from '../pages/admin/product/DrugLegalStatus.vue';
import NewsPage from '../pages/admin/NewsPostTable.vue';
import AdNewsPage from '../pages/admin/AddNews.vue';
import LocationPage from '../pages/admin/Location.vue';
import UserDetailsPage from '../pages/UserDetailsPage.vue';
import RegionPage from '../pages/admin/product/Region.vue';
import AdminRetailerPage from '../pages/AdminRetailer.vue';
import ProductCategoryPage from '../pages/admin/product/ProductCategory.vue';
import RetailerDetailsPage from '../pages/RetailerDetailsPage.vue';

import BasicLayout from '../layouts/BasicLayout';
import RegisterPage from '../pages/RegisterPage';
import RecoverPasswordPage from '../pages/RecoverPasswordPage.vue';

import FeedBackPage from '../pages/FeedBackPage.vue';

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
            { path: 'retailers', component: AdminRetailerPage },
            { path: 'wholesalers', component: WholealerPage },
            { path: 'user/details/:userId', component: UserDetailsPage, name: 'user_details', props: true },
            { path: 'user/page/:userId', component: RetailerDetailsPage, name: 'user_page', props: true },
            { path: 'products', component: AdminProductsPage},
            { path: 'products/add', component: AdProductsPage},
            { path: 'products/edit', component: AdProductsPage},
            { path: 'products/view', component: AdProductsPage},
            { path: 'settings', component: DashboardPage },
            { path: 'news', component: DashboardPage },
            { path: 'news/category', component: DashboardPage },
            { path: 'manufacturers', component: ManufacturerPage },
            { path: 'manufacturers/add', component: AdManufacturerPage},
            { path: 'product-category', component: CategoryPage },
            { path: 'category-types', component:ProductCategoryPage},
            { path: 'drug-class', component: DrugClassPage },
            {  path: 'news-post', component: NewsPage},
            {path: 'add-news', component: AdNewsPage},
            { path: 'drug-dosage-form', component: DosageFormPage },
            { path: 'drug-dosage-form/add', component: AdDosagePage},
            { path: 'location', component: LocationPage },
            { path: 'region', component: RegionPage },
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
        children: wholsaleroutes
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
        children: retailroutes
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
