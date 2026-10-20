import { createAsyncThunk } from '@reduxjs/toolkit';
import authService from './authService';
import axiosServices from '@/utils/axios'
export const login = createAsyncThunk('authentication/login', async ({ email, password, rememberMe }, { rejectWithValue }) => {
        try {
            const response = await authService.login(email, password)
            const data = response.data
            const token = data?.data?.token
            const user = data?.data?.user
            if (!token) {
                return rejectWithValue({
                    message: 'Login failed. Authentication token not received.',
                    errors: null,
                })
            }
            axiosServices.setJwtToken(token, rememberMe)
            axiosServices.setUser(JSON.stringify(user), rememberMe)
            return { user, message: data?.message }
        }
        catch (error) {
            return rejectWithValue(error)
        }
    }
)
export const register = createAsyncThunk('authentication/register', async (data, { rejectWithValue }) => {
        try {
            const response = await authService.register(data);
            return response.data;
        }
        catch (error) {
            return rejectWithValue(error);
        }
    }
);
/* export const logout = createAsyncThunk('authentication/logout', async (_, { rejectWithValue }) => {
        try {
            console.log("Try::");
            await authService.logout();
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            sessionStorage.removeItem('token');
            sessionStorage.removeItem('user');
            return true;
        }
        catch (error) {
            return rejectWithValue(error);
        }
    }
); */
export const logout = createAsyncThunk("authentication/logout", async () => {
    //await AuthService.logout();

    localStorage.clear();
    sessionStorage.clear();
    return true;
});
export const fetchProfile = createAsyncThunk('authentication/fetchProfile', async (_, { rejectWithValue }) => {
        try {
            const response = await authService.fetchProfile();
            const user = response.data?.data?.user;
            axiosServices.setUser(JSON.stringify(user));
            return { user };
        }
        catch (error) {
            return rejectWithValue(error);
        }
    }
);
export const updateProfile = createAsyncThunk('authentication/updateProfile', async (data, { rejectWithValue }) => {
        try {
            const response = await authService.updateProfile(data);
            const user = response.data?.data?.user;
            localStorage.setItem('user', JSON.stringify(user));
            return { user, message: response.data?.message };
        }
        catch (error) {
            return rejectWithValue(error);
        }
    }
);
export const updatePassword = createAsyncThunk('authentication/updatePassword', async (data, { rejectWithValue }) => {
        try {
            const response = await authService.updatePassword(data);
            return response.data;
        }
        catch (error) {
            return rejectWithValue(error);
        }
    }
);