/*jshint esversion:8 */
import router from "./router";
import VModal from "./plugins/vue-js-modal/index.nocss";
import Vuesax   from "./plugins/vuesax/dist/vuesax.min";
import VueNoty from './plugins/vue-noty/dist/vuejs-noty';
import "./plugins/vuesax/dist/vuesax.min.css";
import "./plugins/vue-js-modal/styles.css";
import "./plugins/vue-noty/dist/vuejs-noty.css";
import store from "./store/store";
import SweetModal from 'sweet-modal-vue/src/plugin.js';
import carousel from 'vue-owl-carousel2';
import VueSweetalert2 from 'vue-sweetalert2';
import VueSuglify from "vue-suglify";
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'



// import Modal from 'vmodal';
// import Axios from "axios";


// import Vuex from 'vuex';


// import  "../../public/assets/css/app.css";
// import  "../../public/css/app.css";
// import  "../../public/assets/css/bootstrap.min.css";

// window.noty = require('vuejs-noty');
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


Vue.component('pagination', require('laravel-vue-pagination'));
Vue.use(VueNoty);
Vue.use(VModal, {dynamicDefault: { draggable: true, resizable: true , height: "auto"} });
Vue.use(Vuesax);
// Vue.component('modemodal', Modal);
Vue.use(SweetModal);
Vue.use(VueSweetalert2);
Vue.component("suglify", VueSuglify);
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY hh:mm');
    }
});
// Vue.use(Vuex);
// axios.defaults.headers.common['Accept'] = 'application/json';
// axios.defaults.headers.common['Content-Type'] = 'application/json';

window.axios.defaults.headers.get['Accept'] = 'application/json'; // default header for all get request
window.axios.defaults.headers.post['Accept'] = 'application/json';


const token = localStorage.getItem('access_token');
if(token) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

window.axios.interceptors.response.use(function(response){
    return response;
}, function (error) {
    if (401 === error.response.status) {
        store.dispatch('account/userLogout')
        .then(() => {
            // router.push('/login');
            location.reload();
        });
    }else{
        return Promise.reject(error);
    }
});


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    store,
    // el: '#app',
}).$mount("#app");
