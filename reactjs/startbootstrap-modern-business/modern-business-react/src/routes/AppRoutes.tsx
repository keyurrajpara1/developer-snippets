import React from 'react'
import { RouterProvider } from 'react-router'
import { router } from './routeConfig'
export function AppRoutes() {
    return (
        <React.Suspense fallback={<div>Loading...</div>}>
            <RouterProvider router={router} />
        </React.Suspense>
    )
}