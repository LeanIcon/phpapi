/*jshint esversion:8 */

// import router from "../../router";

const state = {

    selected_products: [],
    select_product_count: 0
};

const mutations = {
    'SET_PRODUCTS'(state, data){
        var count = Object.keys(state.selected_products).length;
        if (count === 0) {
            state.selected_products.push(data);
            count = Object.keys(state.selected_products).length;
            state.select_product_count = count;
            console.log(count);
            return;
        }
        if (state.selected_products.some(product => product.products_id === data.products_id)) {
            alert("Item Already added");
            return;
        }else{
            state.selected_products.push(data);
            count = Object.keys(state.selected_products).length;
            state.select_product_count = count;
            console.log(count);
        }
    },
    'CLEAR_PRODUCTS':(state) => {
        state.select_product_count = 0;
        state.selected_products = [];
    }
};

const actions = {
    saveSelectedProduct({commit}, product){
        commit('SET_PRODUCTS', product);
    },
    clearSelectedProduct({commit}){
        commit('CLEAR_PRODUCTS');
    },
};

const getters = {
    getSelectedProducts: state => {
        return state.selected_products;
    },
    getSelectedProductCount: state => {
        return state.select_product_count;
    }
};


export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
};