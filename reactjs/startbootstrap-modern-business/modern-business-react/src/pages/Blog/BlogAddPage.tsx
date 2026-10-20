import { useEffect } from 'react';
import { Navigate } from 'react-router';
import { toast } from 'sonner';
import BlogFormManager from '@/components/Blog/BlogFormManager';
import { useAuth } from '@/hooks/useAuth';
import config from '@/config.json';
export default function BlogAddPage() {
    const { user } = useAuth();
    const adminRoleId = Number(config.roles.ADMIN_ROLE_ID);
    const isAdmin = Number(user?.role_id) === adminRoleId;
    useEffect(() => {
        if (isAdmin) {
            toast.info(
                'Article creation and editing are restricted for administrators.'
            );
        }
    }, [isAdmin]);
    if (isAdmin) {
        return <Navigate to="/" replace />;
    }
    return (
        <div className="container py-4">
            <div className="card border-0 shadow-sm">
                <div className="card-body p-3 p-md-4">
                    <BlogFormManager />
                </div>
            </div>
        </div>
    );
}
