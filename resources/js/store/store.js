/*jshint esversion:8 */
import Vue from 'vue';
import Vuex from 'vuex';
import account from './modules/account';
import products from './modules/products';
import wholesalers from './modules/wholesalers';
import purchase_orders from './modules/purchase_orders';
import shortage_list from './modules/shortage_list';
import appsettings from "./modules/appsettings";
import createPersistedState from "vuex-persistedstate";
import SecureLS from "secure-ls";
var ls = new SecureLS({isCompression: false});


Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        account,
        products,
        purchase_orders,
        shortage_list,
        wholesalers,
        appsettings
    },
    plugins: [createPersistedState({
        key: 'vuex',
        reducer(val){
            if (val.account.isAuth === false) {
                return {};
            }
            return val;
        },
        storage: {
            getItem: (key) => ls.get(key),
            setItem: (key, value) => ls.set(key, value),
            removeItem: (key) => ls.remove(key),
        }
    })],
    state: {
        user: {},
    },
    mutations: {
        loginCreds(state, user) {
            state.user = user;
            // console.log(state.user);
        }
    },
    actions: {

    },
    getters: {

    }
});
