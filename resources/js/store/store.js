/*jshint esversion:8 */
import Vue from 'vue';
import Vuex from 'vuex';
import account from './modules/account';


Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        account
    },
    state: {
        user: {},
        products: []
    },
    mutations: {
        loginCreds(state, user) {
            state.user = user;
            console.log(state.user);
        }
    },
    actions: {

    },
    getters: {

    }
});