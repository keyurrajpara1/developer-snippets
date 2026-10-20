import { combineReducers } from 'redux';
import { authenticationSlice } from '@/app/store/authenticationSlice';
import categoryReducer from "@/app/store/categories/categorySlice";
import blogReducer from '@/app/store/blogs/blogSlice';
const rootReducer = combineReducers({
    auth: authenticationSlice.reducer,
    categories: categoryReducer,
    blogs: blogReducer,
});
export default rootReducer;