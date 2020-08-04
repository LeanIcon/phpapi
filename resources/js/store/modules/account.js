/*jshint esversion:8 */

const state = {
    useracc: {}
};

const mutations = {

};

const actions = {
    userLogin({state}, user){
        axios.post('auth/login', {
            email: user.email,
            password: user.password
        }).then((response) => {
            console.log(response);
        }).catch((error) =>{
            console.log(error);
        });
    }

};

const getters = {

};


export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
};