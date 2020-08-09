/*jshint esversion:8 */

const API_URL = 'http:127.0.0.1:8000/api';

class UserService {
    getPublicContent() {
        return axios.get(API_URL + 'all');
    }

    getAdminDashboard(){
        return axios.get('admin', {headers: {}});
    }
    getWholesalerDashboard(){
        return axios.get('wholesaler', {headers: {}});
    }
    getRetailerDashboard(){
        return axios.get('retaler', {headers: {}});
    }
    getAnyDashboard(){
        return axios.get('any', {headers: {}});
    }
}

export default new UserService();