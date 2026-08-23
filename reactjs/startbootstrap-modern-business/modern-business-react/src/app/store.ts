import { configureStore } from '@reduxjs/toolkit';
import siteReducer from './siteSlice';
import contactReducer from '../features/contact/contactSlice';

export const store = configureStore({
  reducer: { site: siteReducer, contact: contactReducer },
  devTools: import.meta.env.DEV,
});

export type RootState = ReturnType<typeof store.getState>;
export type AppDispatch = typeof store.dispatch;
