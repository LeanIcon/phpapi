/*jshint esversion:6 */
import Vue  from 'vue'
import VueRouter  from "vue-router";
import Login  from "./components/Login.vue";
import LoginPage  from "./pages/LoginPage.vue";
import DashboardPage from './pages/DashboardPage.vue'


Vue.use(VueRouter);

const routes = [
    { path: '/', component: LoginPage },
    { path: '/dashboard', component: DashboardPage },
    { path: '/settings', component: DashboardPage },
    // { path: '', component: component },

];

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;