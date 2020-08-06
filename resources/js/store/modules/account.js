/*jshint esversion:8 */

import router from "../../router";

const state = {

    authUser: {},
    isAuth: false,
    userType: null,
    userRole: []
};

const mutations = {
    'SET_USER'(state, data){
        localStorage.setItem('user', JSON.stringify(data));
        localStorage.setItem('auth', true);
        state.authUser = JSON.parse(localStorage.getItem('user'));
        state.isAuth = JSON.parse(localStorage.getItem('auth'));
        state.userType = data.user.type;
        state.userRole = data.user.role;
        // router.push({name: 'admin'});
        router.forward();
    },
    'USER_LOGOUT'(state){
        localStorage.removeItem('user');
        localStorage.removeItem('auth');
        state.authUser = {};
        state.isAuth = false;
        router.replace('/login');
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
    },
    userLogout({commit}){
            commit('USER_LOGOUT');
    }

};

const getters = {
    loggedInUser: state => {
        return state.authUser.user.name;
    },
    userAuth: state => {
        return state.isAuth;
    },
    userType: state => {
        return state.userType;
    },
    userData: state => {
        return state.authUser.user;
    },
};


export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
};