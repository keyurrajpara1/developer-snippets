import { createSlice } from "@reduxjs/toolkit";
import { login, register, logout, fetchProfile, updateProfile, updatePassword } from "./authThunks";
console.log("AUTH SLICE - localStorage user:", localStorage.getItem("user"));
console.log("AUTH SLICE - sessionStorage user:", sessionStorage.getItem("user"));
console.log("AUTH SLICE - localStorage token:", localStorage.getItem("token"));
console.log("AUTH SLICE - sessionStorage token:", sessionStorage.getItem("token"));
console.log("AUTH SLICE - rememberMe:", localStorage.getItem("rememberMe"));
//const storedUser = localStorage.getItem("user");
const storedUser = localStorage.getItem("user") || sessionStorage.getItem("user");
const initialState = {
	user: storedUser ? JSON.parse(storedUser) : null,
	isAuthenticated: !!storedUser,
	isLoading: false,
	updateLoading: false,
	message: null,
	errors: null,
};
export const authenticationSlice = createSlice({
	name: "authentication",
	initialState,
	reducers: {
		resetError: (state) => {
			state.isLoading = false;
			state.updateLoading = false;
			state.message = null;
			state.errors = null;
		},
		setUser: (state, action) => {
			state.user = action.payload;
			state.isAuthenticated = !!action.payload;
		},
	},
	extraReducers: (builder) => {
		builder
			// Login
			.addCase(login.pending, (state) => {
				state.isLoading = true;
				state.message = null;
				state.errors = null;
			})
			.addCase(login.fulfilled, (state, action) => {
				state.isLoading = false;
				state.isAuthenticated = true;
				state.user = action.payload.user;
			})
			.addCase(login.rejected, (state, action) => {
				state.isLoading = false;
				state.isAuthenticated = false;
				state.user = null;
				state.message = action.payload?.message;
				state.errors = action.payload?.errors;
			})
			// Register
			.addCase(register.pending, (state) => {
				state.isLoading = true;
				state.message = null;
				state.errors = null;
			})
			.addCase(register.fulfilled, (state, action) => {
				state.isLoading = false;
				state.message = action.payload?.message;
			})
			.addCase(register.rejected, (state, action) => {
				state.isLoading = false;
				state.message = action.payload?.message;
				state.errors = action.payload?.errors;
			})
			// Logout
			.addCase(logout.fulfilled, (state) => {
				state.user = null;
				state.isAuthenticated = false;
				state.message = null;
				state.errors = null;
			})
			// Fetch Profile
			.addCase(fetchProfile.pending, (state) => {
				state.isLoading = true;
			})
			.addCase(fetchProfile.fulfilled, (state, action) => {
				state.isLoading = false;
				state.user = action.payload.user;
				state.isAuthenticated = true;
			})
			.addCase(fetchProfile.rejected, (state) => {
				state.isLoading = false;
				state.user = null;
				state.isAuthenticated = false;
			})
			// Update Profile
			.addCase(updateProfile.pending, (state) => {
				state.updateLoading = true;
				state.message = null;
				state.errors = null;
			})
			.addCase(updateProfile.fulfilled, (state, action) => {
				state.updateLoading = false;
				state.user = action.payload.user;
				state.message = action.payload.message;
			})
			.addCase(updateProfile.rejected, (state, action) => {
				state.updateLoading = false;
				state.message = action.payload?.message;
				state.errors = action.payload?.errors;
			})
			// Update Password
			.addCase(updatePassword.pending, (state) => {
				state.updateLoading = true;
			})
			.addCase(updatePassword.fulfilled, (state, action) => {
				state.updateLoading = false;
				state.message = action.payload?.message;
			})
			.addCase(updatePassword.rejected, (state, action) => {
				state.updateLoading = false;
				state.message = action.payload?.message;
				state.errors = action.payload?.errors;
			});
	},
});
export const { resetError, setUser } = authenticationSlice.actions;
export { login, register, logout, fetchProfile, updateProfile, updatePassword };
export default authenticationSlice.reducer;