import axios from '@/utils/axios';
const register = (data) => {
    return axios.post('/register', data);
};
const login = (email, password) => {
    return axios.post('/login', { email, password });
};
const logout = () => {
    return axios.post('/logout');
};
const fetchProfile = () => {
    return axios.get('/profile');
};
const updateProfile = (data) => {
    return axios.post('/profile', data);
};
const updatePassword = (data) => {
    return axios.post('/update-password', data);
};
const authService = { register, login, logout, fetchProfile, updateProfile, updatePassword };
export default authService;