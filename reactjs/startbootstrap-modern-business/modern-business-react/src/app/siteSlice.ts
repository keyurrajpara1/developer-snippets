import { createSlice } from '@reduxjs/toolkit';

type SiteState = { companyName: string; currentYear: number };

const initialState: SiteState = {
  companyName: 'Modern Business',
  currentYear: new Date().getFullYear(),
};

const siteSlice = createSlice({
  name: 'site',
  initialState,
  reducers: {},
});

export default siteSlice.reducer;
