/*jshint esversion:8 */

// import router from "../../router";

const state = {

    shortage_list_products: [],
    shortage_list_products_count: 0,
};

const mutations = {
    'SET_PRODUCTS'(state, data){
        state.shortage_list_products = data;
        var count = Object.keys(state.shortage_list_products).length;
        if (count === 0) {
            state.shortage_list_products.push(data);
            count = Object.keys(state.selected_products).length;
            state.shortage_list_products_count = count;
            return;
        }
        if (state.shortage_list_products.some(product => product.products_id === data.products_id)) {
            alert("Item Already added");
            return;
        }else{
            state.shortage_list_products.push(data);
            count = Object.keys(state.shortage_list_products).length;
            state.shortage_list_products_count = count;
        }
    },
};

const actions = {
    saveSelectedProduct({commit}, product){
        commit('SET_PRODUCTS', product);
    },
};

const getters = {
    getSelectedProducts: state => {
        return state.selected_products;
    },
};


export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
};