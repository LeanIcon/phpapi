/*jshint esversion:8 */

// import router from "../../router";

const state = {
    wholesaler: {},
};

const mutations = {
    'SET_WHOLESALER'(state, data){
        state.wholesaler = data;
    },
    'CLEAR_WHOLESALER':(state) => {
        state.wholesaler = {};
    }
};

const actions = {
    addWholesaler({commit}, data){
        commit('SET_WHOLESALER', data);
        console.log("From Store...", data)
    },
    clearWholesaler({commit}){
        commit('CLEAR_WHOLESALER');
    },
};

const getters = {
    getSelectedWholesaler: state => {
        return state.wholesaler;
    },
};


export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
};