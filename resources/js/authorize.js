import axios from 'axios';

const authorize = axios.create({
    withCredentials: true,
    credentials: "same-origin"
})

// Add a request interceptor
authorize.interceptors.request.use(config => {
    let token = localStorage.getItem('auth');
    token ? config.headers['Authorization'] = `Bearer ${token}` : console.log('401 Unauthorized');
    config.headers['X-Requested-With'] = "XMLHttpRequest";
    return config;
}, err => Promise.reject(err));

export default authorize;