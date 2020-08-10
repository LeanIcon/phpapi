/*jshint esversion:8 */

// import router from "../../router";

const state = {

    authUser: {},
    isAuth: false,
    userType: null,
    userRole: [],
    token: localStorage.getItem('access_token') || ''
};

const mutations = {
    'SET_USER'(state, data){
        localStorage.setItem('user', JSON.stringify(data));
        localStorage.setItem('auth', true);
        localStorage.setItem('access_token', data.user.accessToken);
        state.authUser = JSON.parse(localStorage.getItem('user'));
        state.isAuth = JSON.parse(localStorage.getItem('auth'));
        state.token = data.user.accessToken;
        state.userType = data.user.type;
        state.userRole = data.user.role;
        // router.push({name: 'admin'});
        location.reload();
    },
    'AUTH_SUCCESS'(state, data){
        state.token = data.user.accessToken;
    },
    'USER_LOGOUT'(state){
        state.isAuth = false;
        localStorage.removeItem('access_token');
    }
};

const actions = {
    userLogin({commit}, user){
        axios.post('auth/login', {
            email: user.email,
            password: user.password
        }).then((response) => {
            commit('AUTH_SUCCESS', response.data);
            commit('SET_USER', response.data);
        }).catch(({response}) =>{
            console.log(response.data);
        });
    },
    userLogout: ({commit, dispatch}) => {
        return new Promise((resolve, reject) => {
            commit('USER_LOGOUT');
            state.isAuth = false;
            localStorage.removeItem('user');
            localStorage.removeItem('auth');
            localStorage.removeItem('vuex');
            state.authUser = {};
            resolve();
            // router.replace('/login');
        });
    }

};

const getters = {
    loggedInUser: state => {
        return state.authUser.user.name;
    },
    isLoggedIn: state => {
        return !!state.token;
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