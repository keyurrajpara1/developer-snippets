import React from 'react';
import { Navigate } from 'react-router';
import { useAuth } from '@/hooks/useAuth';
export function PublicRoute({ children }: { children: React.ReactNode }) {
    return <>{children}</>;
}
export function GuestRoute({ children }: { children: React.ReactNode }) {
    const { isAuthenticated } = useAuth();
    if (isAuthenticated) {
        return <Navigate to="/" replace />;
    }
    return <>{children}</>;
}
export function AuthenticatedRoute({ children }: { children: React.ReactNode }) {
    const { isAuthenticated } = useAuth();
    if (!isAuthenticated) {
        return <Navigate to="/sign-in" replace />;
    }
    return <>{children}</>;
}
export function PrivateRoute({ children, roles }: { children: React.ReactNode; roles: number[] }) {
    const { isAuthenticated, user } = useAuth();
    console.log("PRIVATE ROUTE - isAuthenticated:", isAuthenticated);
    console.log("PRIVATE ROUTE - user:", user);
    console.log("PRIVATE ROUTE - roles:", roles);
    if (!isAuthenticated) {
        console.log("PRIVATE ROUTE - REDIRECTING TO SIGN-IN");
        return <Navigate to="/sign-in" replace />;
    }
    if (!user || !roles.includes(user.role_id)) {
        console.log("PRIVATE ROUTE - ROLE CHECK FAILED");
        return <Navigate to="/" replace />;
    }
    console.log("PRIVATE ROUTE - ACCESS GRANTED");
    return <>{children}</>;
}