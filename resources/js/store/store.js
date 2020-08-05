/*jshint esversion:8 */
import Vue from 'vue';
import Vuex from 'vuex';
import account from './modules/account';
import createPersistedState from "vuex-persistedstate";
import SecureLS from "secure-ls";
var ls = new SecureLS({isCompression: false});


Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        account
    },
    plugins: [createPersistedState({
        storage: {
            getItem: (key) => ls.get(key),
            setItem: (key, value) => ls.set(key, value),
            removeItem: (key) => ls.remove(key),
        }
    })],
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