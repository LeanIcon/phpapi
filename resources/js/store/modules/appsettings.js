/*jshint esversion:8 */

// import router from "../../router";

const state = {

    settings: [],
    appsettings:{},
    notification:{},
    product_update:{},
    news_info:{},
    shortage_list:{},
    expiry:{},
    pos:{},
    errors:{},
};

const mutations = {
    'SET_APP_SETTINGS'(state, data){
        var settings = JSON.parse(data.settings);
        state.appsettings = settings;
    },
    'SET_ERRORS'(state, data){
        state.appsettings = data;
    },
};

const actions = {
    saveAppSettings({commit, dispatch}, settings){
        var data = {
            'settings': settings
        };
        axios.post('app_settings', data)
        .then(({data}) => {
            dispatch('getAppAllSettings')
        })
        .catch(({response}) => {
            // commit('SET_ERRORS', response);
        });
    },
    getAppAllSettings({commit}){
        console.log("Getting App Settings...");
        axios.get('app_settings')
        .then(({data}) => {
            console.log(data);
            commit('SET_APP_SETTINGS', data);
        })
        .catch(({response}) => {
            commit('SET_ERRORS', response);
        });
    },

};

const getters = {

    getAppSettings: state => {
        return state.appsettings;
    },
};


export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
};
