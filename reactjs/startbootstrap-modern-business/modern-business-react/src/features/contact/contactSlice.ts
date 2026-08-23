import { createAsyncThunk, createSlice } from '@reduxjs/toolkit';
import { http } from '../../services/http';
import type { ContactFormValues } from '../../types/contact';

type ContactState = {
  status: 'idle' | 'submitting' | 'succeeded' | 'failed';
  error: string | null;
};

const initialState: ContactState = { status: 'idle', error: null };

export const submitContact = createAsyncThunk(
  'contact/submit',
  async (values: ContactFormValues, { rejectWithValue }) => {
    try {
      const path = import.meta.env.VITE_CONTACT_API_PATH || '/posts';
      const response = await http.post(path, values);
      return response.data;
    } catch (error) {
      return rejectWithValue(error instanceof Error ? error.message : 'Unable to submit the form.');
    }
  },
);

const contactSlice = createSlice({
  name: 'contact',
  initialState,
  reducers: { resetContactStatus: (state) => { state.status = 'idle'; state.error = null; } },
  extraReducers: (builder) => {
    builder
      .addCase(submitContact.pending, (state) => { state.status = 'submitting'; state.error = null; })
      .addCase(submitContact.fulfilled, (state) => { state.status = 'succeeded'; })
      .addCase(submitContact.rejected, (state, action) => { state.status = 'failed'; state.error = String(action.payload ?? 'Submission failed.'); });
  },
});

export const { resetContactStatus } = contactSlice.actions;
export default contactSlice.reducer;
