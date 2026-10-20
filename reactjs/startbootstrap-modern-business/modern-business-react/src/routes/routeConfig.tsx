import React from 'react';
import { createBrowserRouter } from 'react-router';
import { SiteLayout } from '@/components/layout/SiteLayout';
import { PublicRoute, GuestRoute, AuthenticatedRoute, PrivateRoute } from './CustomRoutes';
import config from '@/config.json';
const HomePage = React.lazy(() => import('@/pages/HomePage'));
const AboutUsPage = React.lazy(() => import('@/pages/AboutUsPage'));
const ServicesPage = React.lazy(() => import('@/pages/ServicesPage'));
const ContactUsPage = React.lazy(() => import('@/pages/ContactUsPage'));
const SignInPage = React.lazy(() => import('@/pages/SignInPage'));
const SignUpPage = React.lazy(() => import('@/pages/SignUpPage'));
const DashboardPage = React.lazy(() => import('@/pages/DashboardPage'));
const NotFoundPage = React.lazy(() => import('@/pages/NotFoundPage'));
const ProfilePage = React.lazy(() => import('@/pages/ProfilePage'));
const BlogListPage = React.lazy(() => import('@/pages/Blog'));
const BlogAddPage = React.lazy(() => import('@/pages/Blog/BlogAddPage'));
// const BlogListPublicPage = React.lazy(() => import('@/pages/Blog/BlogListPublic'));
const adminRoleId = config.roles.ADMIN_ROLE_ID;
const userRoleId = config.roles.USER_ROLE_ID;
export const router = createBrowserRouter([
    {
        path: '/',
        element: <SiteLayout />,
        children: [
            // Public pages
            {
                index: true,
                element: (
                    <PublicRoute>
                        <HomePage />
                    </PublicRoute>
                ),
            },
            {
                path: 'about-us',
                element: (
                    <PublicRoute>
                        <AboutUsPage />
                    </PublicRoute>
                ),
            },
            {
                path: 'services',
                element: (
                    <PublicRoute>
                        <ServicesPage />
                    </PublicRoute>
                ),
            },
            {
                path: 'contact-us',
                element: (
                    <PublicRoute>
                        <ContactUsPage />
                    </PublicRoute>
                ),
            },
            /* {
                path: 'articles',
                element: (
                    <PublicRoute>
                        <BlogListPublicPage />
                    </PublicRoute>
                ),
            }, */
            // Guest-only pages
            {
                path: 'sign-in',
                element: (
                    <GuestRoute>
                        <SignInPage />
                    </GuestRoute>
                ),
            },
            {
                path: 'sign-up',
                element: (
                    <GuestRoute>
                        <SignUpPage />
                    </GuestRoute>
                ),
            },
            // Authenticated pages
            {
                path: 'my-profile',
                element: (
                    <AuthenticatedRoute>
                        <ProfilePage />
                    </AuthenticatedRoute>
                ),
            },
            {
                path: 'update-password',
                element: (
                    <AuthenticatedRoute>
                        <ProfilePage />
                    </AuthenticatedRoute>
                ),
            },
            // Dashboard
            {
                path: 'dashboard',
                element: (
                    <PrivateRoute roles={[adminRoleId, userRoleId]}>
                        <DashboardPage />
                    </PrivateRoute>
                ),
            },
            // Blog CRUD - Authenticated pages
            {
                path: 'my-articles',
                element: (
                    <AuthenticatedRoute>
                        <BlogListPage />
                    </AuthenticatedRoute>
                ),
            },
            {
                path: 'article-post',
                element: (
                    <AuthenticatedRoute>
                        <BlogAddPage />
                    </AuthenticatedRoute>
                ),
            },
            {
                path: 'article-post/:id',
                element: (
                    <AuthenticatedRoute>
                        <BlogAddPage />
                    </AuthenticatedRoute>
                ),
            },
            // 404
            {
                path: '*',
                element: (
                    <PublicRoute>
                        <NotFoundPage />
                    </PublicRoute>
                ),
            },
        ],
    },
]);