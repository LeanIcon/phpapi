/*jshint esversion:8 */
import Vue  from 'vue';
import VueRouter  from "vue-router";
import store from '../store/store';
import { UserTypes, Role } from '../_helpers/role';
import wholsaleroutes from "./wholsalers";
import retailroutes from "./retailers";
import adminroutes from "./adminroutes";

// import Login  from "../components/Login.vue";
import LoginPage  from "../pages/LoginPage.vue";
// import RetailerPage from '../pages/Retailer.vue';
import DefaultPage from '../pages/DefaultContainer';
import Page404 from '../pages/404.vue';

import BasicLayout from '../layouts/BasicLayout';
import RegisterPage from '../pages/RegisterPage';
import RecoverPasswordPage from '../pages/RecoverPasswordPage.vue';


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
        children: adminroutes
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
