import axios from 'axios';

export const http = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL || 'https://jsonplaceholder.typicode.com',
  headers: { 'Content-Type': 'application/json' },
  timeout: 10_000,
});
