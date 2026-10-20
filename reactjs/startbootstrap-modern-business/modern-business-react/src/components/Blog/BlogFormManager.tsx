import { useEffect, useMemo } from 'react';
import { Formik, Form, type FormikHelpers } from 'formik';
import * as Yup from 'yup';
import { useDispatch, useSelector } from 'react-redux';
import { useLocation, useNavigate } from 'react-router';
import { toast } from 'sonner';
import { insertBlog, updateBlog } from '@/app/store/blogs/blogSlice';
import { fetchCategories } from '@/app/store/categories/categorySlice';
type BlogFormValues = {
    id?: number;
    title: string;
    content: string;
    category_id: string | number;
};
type Category = {
    id: number;
    name: string;
};
const blogDataSchema = Yup.object({
    title: Yup.string()
        .max(255, 'Blog title cannot exceed 255 characters')
        .required('Blog Title is required'),
    content: Yup.string()
        .required('Blog Description is required'),
    category_id: Yup.string()
        .required('Blog Category is required'),
});
export default function BlogFormManager() {
    const dispatch = useDispatch<any>();
    const navigate = useNavigate();
    const location = useLocation();
    const blog = location.state?.blog;
    const { categories = [] } = useSelector(
        (state: any) => state.categories
    );
    useEffect(() => {
        dispatch(fetchCategories({ isAll: true }))
            .unwrap()
            .catch(() => {
                toast.error('Failed to load categories.');
            });
    }, [dispatch]);
    const initialValues: BlogFormValues = useMemo(
        () => ({
            id: blog?.id,
            title: blog?.title ?? '',
            content: blog?.content ?? '',
            category_id: blog?.category_id
                ? String(blog.category_id)
                : '',
        }),
        [blog]
    );
    const handleSubmit = async (
        values: BlogFormValues,
        helpers: FormikHelpers<BlogFormValues>
    ) => {
        const { setErrors, setStatus, setSubmitting, resetForm } = helpers;
        try {
            const response = blog
                ? await dispatch(
                      updateBlog({
                          id: values.id,
                          blogData: values,
                      })
                  ).unwrap()
                : await dispatch(insertBlog(values)).unwrap();
            toast.success(
                response?.message ??
                    (blog
                        ? 'Blog updated successfully.'
                        : 'Blog created successfully.')
            );
            resetForm();
            navigate('/my-articles', { replace: true });
        } catch (error: any) {
            if (error?.errors && typeof error.errors === 'object') {
                setErrors(error.errors);
            } else {
                const message =
                    error?.message ||
                    (blog
                        ? 'An error occurred while updating the blog.'
                        : 'An error occurred while creating the blog.');
                setStatus({ message });
                toast.error(message);
            }
        } finally {
            setSubmitting(false);
        }
    };
    return (
        <Formik
            initialValues={initialValues}
            validationSchema={blogDataSchema}
            onSubmit={handleSubmit}
            enableReinitialize
        >
            {({
                values,
                errors,
                touched,
                handleChange,
                handleBlur,
                isSubmitting,
                status,
            }) => (
                <Form noValidate>
                    <div className="d-flex flex-wrap justify-content-between
                        align-items-center gap-2 mb-3">
                        <h4 className="fw-bold mb-0">
                            {blog ? 'Update Article' : 'New Article'}
                        </h4>
                        <span className="text-secondary small">
                            Fields marked * are required
                        </span>
                    </div>
                    <hr />
                    {status?.message && (
                        <div className="alert alert-danger" role="alert">
                            {status.message}
                        </div>
                    )}
                    <div className="mb-3">
                        <label
                            htmlFor="category_id"
                            className="form-label fw-semibold"
                        >
                            Blog Category *
                        </label>
                        <select
                            id="category_id"
                            name="category_id"
                            className={`form-select ${
                                touched.category_id && errors.category_id
                                    ? 'is-invalid'
                                    : ''
                            }`}
                            value={values.category_id}
                            onChange={handleChange}
                            onBlur={handleBlur}
                        >
                            <option value="">Select a category</option>
                            {categories.map((category: Category) => (
                                <option
                                    key={category.id}
                                    value={String(category.id)}
                                >
                                    {category.name}
                                </option>
                            ))}
                        </select>
                        {touched.category_id && errors.category_id && (
                            <div className="invalid-feedback">
                                {errors.category_id}
                            </div>
                        )}
                    </div>
                    <div className="mb-3">
                        <label
                            htmlFor="title"
                            className="form-label fw-semibold"
                        >
                            Blog Title *
                        </label>
                        <input
                            id="title"
                            name="title"
                            type="text"
                            maxLength={255}
                            className={`form-control ${
                                touched.title && errors.title
                                    ? 'is-invalid'
                                    : ''
                            }`}
                            placeholder="Enter blog title"
                            value={values.title}
                            onChange={handleChange}
                            onBlur={handleBlur}
                        />
                        {touched.title && errors.title && (
                            <div className="invalid-feedback">
                                {errors.title}
                            </div>
                        )}
                    </div>
                    <div className="mb-4">
                        <label
                            htmlFor="content"
                            className="form-label fw-semibold"
                        >
                            Blog Description *
                        </label>
                        <textarea
                            id="content"
                            name="content"
                            rows={6}
                            className={`form-control ${
                                touched.content && errors.content
                                    ? 'is-invalid'
                                    : ''
                            }`}
                            placeholder="Enter blog description"
                            value={values.content}
                            onChange={handleChange}
                            onBlur={handleBlur}
                        />
                        {touched.content && errors.content && (
                            <div className="invalid-feedback">
                                {errors.content}
                            </div>
                        )}
                    </div>
                    <hr />
                    <div className="d-flex justify-content-end flex-wrap
                        gap-2">
                        <button
                            type="button"
                            className="btn btn-outline-secondary"
                            disabled={isSubmitting}
                            onClick={() => navigate('/my-articles')}
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            className="btn btn-primary"
                            disabled={isSubmitting}
                        >
                            {isSubmitting ? (
                                <>
                                    <span
                                        className="spinner-border spinner-border-sm me-2"
                                        aria-hidden="true"
                                    />
                                    Saving...
                                </>
                            ) : blog ? (
                                'Update Article'
                            ) : (
                                'Create Article'
                            )}
                        </button>
                    </div>
                </Form>
            )}
        </Formik>
    );
}
