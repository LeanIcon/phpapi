/*jshint esversion:8 */

// import router from "../../router";

const state = {

    products: [],
    product:{},
    errors:{},
};

const mutations = {
    'SET_PRODUCTS'(state, data){
        state.products = data;
    },
    'SET_ERRORS'(state, data){
        state.errors = data;
    },
};

const actions = {
    saveProduct({commit}, user){

    },
    loadProduct: ({commit, dispatch}) => {
        axios.get('admin_products')
        .then(({data}) => {
            commit('SET_PRODUCTS', data);
        })
        .catch(({response}) => {
            commit('SET_ERRORS', response);
        });
    },
    // 'GET_PRODUCT': ({commit, dispatch}) => {

    // },
    // 'UPDATE_PRODUCT': ({commit, dispatch}) => {

    // },
    // 'DELETE_PRODUCT': ({commit, dispatch}) => {

    // }

};

const getters = {
    getAllProduct: state => {
        return state.products;
    },
    getProduct: state => {
        return state.product;
    },
};


export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
};