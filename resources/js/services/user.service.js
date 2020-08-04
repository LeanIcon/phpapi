/*jshint esversion:8 */

const API_URL = 'http:127.0.0.1:8000/api';

class UserService {
    getPublicContent() {
        return axios.get(API_URL + 'all');
    }
}

export default new UserService();