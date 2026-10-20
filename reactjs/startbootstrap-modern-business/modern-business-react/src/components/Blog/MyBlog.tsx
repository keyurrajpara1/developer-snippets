import { useCallback, useEffect, useRef, useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { useNavigate } from 'react-router';
import { toast } from 'sonner';
import {
    fetchBlogs,
    resetBlogs,
    deleteBlog,
} from '@/app/store/blogs/blogSlice';
import { useAuth } from '@/hooks/useAuth';
import config from '@/config.json';
type BlogRecord = {
    id: number;
    title: string;
    content: string;
    category_id?: number | string;
    blog_image_url?: {
        original?: string;
    };
    formatted_created_at?: string;
};
type BlogApiResponse = {
    data?: {
        list?: BlogRecord[];
        pagination?: {
            totalPages?: number;
            currentPage?: number;
            totalItems?: number;
        };
    };
};
export default function MyBlog() {
    const dispatch = useDispatch<any>();
    const navigate = useNavigate();
    const { user, isAuthenticated } = useAuth();
    const adminRoleId = Number(config.roles.ADMIN_ROLE_ID);
    const isAdmin = Number(user?.role_id) === adminRoleId;
    const {
        blogs = [],
        isLoading = false,
        rowCount = 0,
    } = useSelector((state: any) => state.blogs);
    const [pageIndex, setPageIndex] = useState(0);
    const [isFetching, setIsFetching] = useState(false);
    const [hasMore, setHasMore] = useState(true);
    const pageSize = 9;
    // Prevent overlapping API requests.
    const requestInProgress = useRef(false);
    // Prevent stale requests from updating pagination after a reset.
    const requestVersion = useRef(0);
    // Reset the blog list when the component mounts.
    useEffect(() => {
        dispatch(resetBlogs());
        setPageIndex(0);
        setHasMore(true);
        return () => {
            requestVersion.current += 1;
            requestInProgress.current = false;
        };
    }, [dispatch]);
    const loadBlogs = useCallback(async () => {
        if (requestInProgress.current || !hasMore) {
            return;
        }
        requestInProgress.current = true;
        setIsFetching(true);
        const currentRequestVersion = requestVersion.current;
        try {
            const result: BlogApiResponse = await dispatch(
                fetchBlogs({
                    pageIndex,
                    pageSize,
                    isAuthenticated,
                    isAdmin,
                })
            ).unwrap();
            // Ignore responses from an outdated request.
            if (currentRequestVersion !== requestVersion.current) {
                return;
            }
            // API response structure:
            // data.list
            // data.pagination.totalPages
            // data.pagination.totalItems
            const payload = result?.data;
            const records = Array.isArray(payload?.list)
                ? payload.list
                : [];
            const pagination = payload?.pagination;
            const totalPages = Number(
                pagination?.totalPages ?? 0
            );
            const totalItems = Number(
                pagination?.totalItems ?? 0
            );
            // Stop if the API returns no records or the final page.
            const moreRecordsAvailable =
                records.length > 0 &&
                totalItems > 0 &&
                pageIndex + 1 < totalPages;
            setHasMore(moreRecordsAvailable);
        } catch (error: any) {
            if (currentRequestVersion === requestVersion.current) {
                toast.error(
                    error?.message || 'Failed to load articles.'
                );
            }
        } finally {
            if (currentRequestVersion === requestVersion.current) {
                requestInProgress.current = false;
                setIsFetching(false);
            }
        }
    }, [
        dispatch,
        pageIndex,
        pageSize,
        isAuthenticated,
        isAdmin,
        hasMore,
    ]);
    // Load the current page.
    useEffect(() => {
        loadBlogs();
    }, [loadBlogs]);
    // Infinite scroll: load another page when near the bottom.
    useEffect(() => {
        const handleScroll = () => {
            const nearBottom =
                window.innerHeight + window.scrollY >=
                document.documentElement.scrollHeight - 150;
            if (
                nearBottom &&
                !requestInProgress.current &&
                !isFetching &&
                !isLoading &&
                hasMore &&
                blogs.length < rowCount
            ) {
                setPageIndex((previous) => previous + 1);
            }
        };
        window.addEventListener('scroll', handleScroll);
        return () => {
            window.removeEventListener('scroll', handleScroll);
        };
    }, [
        blogs.length,
        rowCount,
        isFetching,
        isLoading,
        hasMore,
    ]);
    const handleDelete = async (blog: BlogRecord) => {
        const confirmed = window.confirm(
            `Are you sure you want to delete "${blog.title}"?`
        );
        if (!confirmed) {
            return;
        }
        try {
            await dispatch(deleteBlog(blog.id)).unwrap();
            toast.success('Article deleted successfully.');
            // Invalidate any request currently in progress.
            requestVersion.current += 1;
            requestInProgress.current = false;
            // Reset the list and fetch the first page again.
            dispatch(resetBlogs());
            setPageIndex(0);
            setHasMore(true);
            // The effect may not run if pageIndex was already 0,
            // so trigger the first-page request explicitly.
            const result: BlogApiResponse = await dispatch(
                fetchBlogs({
                    pageIndex: 0,
                    pageSize,
                    isAuthenticated,
                    isAdmin,
                })
            ).unwrap();
            const payload = result?.data;
            const records = Array.isArray(payload?.list)
                ? payload.list
                : [];
            const pagination = payload?.pagination;
            setHasMore(
                records.length > 0 &&
                Number(pagination?.totalItems ?? 0) > 0 &&
                Number(pagination?.currentPage ?? 1) <
                    Number(pagination?.totalPages ?? 1)
            );
        } catch (error: any) {
            toast.error(
                error?.message || 'Failed to delete article.'
            );
        }
    };
    return (
        <section className="blogs-page">
            <div className="text-center mb-4">
                <h2 className="fw-bold">
                    {isAdmin ? 'All Articles' : 'My Articles'}
                </h2>
                <div
                    className="bg-primary mx-auto mt-3 mb-4"
                    style={{ height: 3, width: 60 }}
                />
                <p className="text-secondary">
                    Manage your articles, update their details, or remove
                    articles you no longer need.
                </p>
            </div>
            {!isAdmin && (
                <div className="alert alert-info" role="alert">
                    Articles you create are accessible only to you
                    until they are published according to the site's
                    publishing rules.
                </div>
            )}
            <div
                className="d-flex flex-wrap justify-content-between
                align-items-center gap-3 mb-4"
            >
                {!isAdmin ? (
                    <button
                        type="button"
                        className="btn btn-primary"
                        onClick={() => navigate('/article-post')}
                    >
                        <span className="me-2">+</span>
                        Add Article
                    </button>
                ) : (
                    <div />
                )}
                <span className="badge text-bg-primary fs-6 py-2 px-3">
                    Total Records: {rowCount}
                </span>
            </div>
            <div className="row g-4">
                {blogs.map((blog: BlogRecord) => (
                    <div
                        className="col-12 col-sm-6 col-lg-4"
                        key={blog.id}
                    >
                        <div className="card h-100 shadow-sm article-card">
                            <img
                                src={
                                    isAdmin
                                        ? blog.blog_image_url?.original ||
                                          'https://placehold.co/600x400?text=No+Image'
                                        : 'https://placehold.co/600x400?text=Article'
                                }
                                className="card-img-top"
                                alt={blog.title}
                                style={{
                                    height: 180,
                                    objectFit: 'cover',
                                }}
                                onError={(event) => {
                                    event.currentTarget.onerror = null;
                                    event.currentTarget.src =
                                        'https://placehold.co/600x400?text=No+Image';
                                }}
                            />
                            <div className="card-body">
                                <h5 className="card-title fw-bold">
                                    {blog.title}
                                </h5>
                                <p
                                    className="card-text text-secondary"
                                    style={{
                                        display: '-webkit-box',
                                        WebkitLineClamp: 4,
                                        WebkitBoxOrient: 'vertical',
                                        overflow: 'hidden',
                                        whiteSpace: 'pre-line',
                                    }}
                                >
                                    {blog.content}
                                </p>
                            </div>
                            <div
                                className="card-footer bg-transparent
                                d-flex justify-content-between
                                align-items-center gap-2"
                            >
                                <small className="text-secondary">
                                    {blog.formatted_created_at || 'N/A'}
                                </small>
                                {!isAdmin && (
                                    <div className="d-flex gap-2">
                                        <button
                                            type="button"
                                            className="btn btn-sm btn-outline-primary"
                                            aria-label={`Edit ${blog.title}`}
                                            title="Edit article"
                                            onClick={() =>
                                                navigate(
                                                    `/article-post/${blog.id}`,
                                                    { state: { blog } }
                                                )
                                            }
                                        >
                                            Edit
                                        </button>
                                        <button
                                            type="button"
                                            className="btn btn-sm btn-outline-danger"
                                            aria-label={`Delete ${blog.title}`}
                                            title="Delete article"
                                            onClick={() => handleDelete(blog)}
                                        >
                                            Delete
                                        </button>
                                    </div>
                                )}
                            </div>
                        </div>
                    </div>
                ))}
                {!isFetching && blogs.length === 0 && (
                    <div className="col-12">
                        <div className="alert alert-light border text-center">
                            No articles are available at the moment.
                        </div>
                    </div>
                )}
            </div>
            {(isFetching || isLoading) && (
                <div className="text-center py-4">
                    <div
                        className="spinner-border text-primary"
                        role="status"
                    >
                        <span className="visually-hidden">
                            Loading...
                        </span>
                    </div>
                    <p className="text-secondary mt-2 mb-0">
                        Loading articles...
                    </p>
                </div>
            )}
            {!hasMore && blogs.length > 0 && (
                <p className="text-center text-secondary py-3">
                    You have reached the end of the article list.
                </p>
            )}
        </section>
    );
}