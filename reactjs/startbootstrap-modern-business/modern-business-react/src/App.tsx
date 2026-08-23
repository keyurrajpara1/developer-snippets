import { createBrowserRouter, RouterProvider } from 'react-router';

import { SiteLayout } from './components/layout/SiteLayout';
import { HomePage } from './pages/HomePage';
import { AboutPage } from './pages/AboutPage';
import { ServicesPage } from './pages/ServicesPage';
import { ContactPage } from './pages/ContactPage';
import { NotFoundPage } from './pages/NotFoundPage';

const router = createBrowserRouter([
  {
    path: '/',
    element: <SiteLayout />,
    children: [
      {
        index: true,
        element: <HomePage />,
      },
      {
        path: 'about',
        element: <AboutPage />,
      },
      {
        path: 'services',
        element: <ServicesPage />,
      },
      {
        path: 'contact',
        element: <ContactPage />,
      },
      {
        path: '*',
        element: <NotFoundPage />,
      },
    ],
  },
]);

export default function App() {
  return <RouterProvider router={router} />;
}