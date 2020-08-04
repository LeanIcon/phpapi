/*jshint esversion:8 */
// import 
const API_URL = 'http:127.0.0.1:8000/api';
class AuthService {
    login(user) {
        return axios
            .post(API_URL + 'login', {
                username: user.name,
                password: user.password
            })
            .then(response => {
                if(response.data.accessToken){
                    localStorage.setItem('user', JSON.stringify(response.data));
                }
                return response.data;
            });
    }

    logout(){
        localStorage.removeItem('user');
    }

    register(user){
        return axios.post(API_URL + 'register', {
            username: user.name,
            email: user.email,
            password: user.password
        });
    }
}