/*jshint esversion:8 */

import router from "../../router";

const state = {

    authUser: {},
    isAuth: false,
    accountGetter: {
        name: "James Bond"
    },
};

const mutations = {
    'SET_USER'(state, data){
        localStorage.setItem('user', JSON.stringify(data));
        localStorage.setItem('auth', true);
        state.authUser = JSON.parse(localStorage.getItem('user'));
        state.isAuth = JSON.parse(localStorage.getItem('auth'));
        router.push({name: 'admin'});
    }
};

const actions = {
    userLogin({commit}, user){
        axios.post('auth/login', {
            email: user.email,
            password: user.password
        }).then((response) => {
            commit('SET_USER', response.data);
        }).catch(({response}) =>{
            console.log(response.data);
        });
    }

};

const getters = {
    loggedInUser: state => {
        return state.authUser.user.name;
    },
    userAuth: state => {
        return state.isAuth;
    },
    returnFrmAccGetter: state => {
        return state.accountGetter;
    }

};


export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
};