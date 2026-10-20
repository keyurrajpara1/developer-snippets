import React from 'react';
import ReactDOM from 'react-dom/client';
import { QueryClient, QueryClientProvider } from '@tanstack/react-query';
import { Provider } from 'react-redux';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import './styles/theme.css';
import './styles/custom_style.css';
import App from './App';
import { store } from './app/store/index';
const queryClient = new QueryClient();
const container = document.getElementById('root');
if (!container) {
    throw new Error('Root element not found');
}
const root = ReactDOM.createRoot(container);
const isDevelopment = false;
root.render(
    isDevelopment ? (
        <React.StrictMode>
            <Provider store={store}>
                <QueryClientProvider client={queryClient}>
                    <App />
                </QueryClientProvider>
            </Provider>
        </React.StrictMode>
    ) : (
        <Provider store={store}>
            <QueryClientProvider client={queryClient}>
                <App />
            </QueryClientProvider>
        </Provider>
    )
);