import React, { useEffect } from "react";
import { useFormik } from "formik";
import { Link, useNavigate, useLocation } from "react-router";
import { useDispatch, useSelector } from "react-redux";
import { login, resetError } from "@/app/store/authenticationSlice";
import { PageHeader } from "../components/common/PageHeader";
import { signinSchema } from '@/schemas/signinSchema'
import { useShowNotification } from "@/hooks/useShowNotification";
import { NotificationMessage } from "@/components/common/NotificationMessage";
const initialValues = { email: "", password: "", remember: true };
export default function SignInPage() {
    const { showNotification } = useShowNotification();
    const dispatch = useDispatch();
    const navigate = useNavigate();
    const { isLoading, message } = useSelector((state) => state.auth);
    const location = useLocation();
    const messageFromNavigate = location.state?.message;
    useEffect(() => {
        dispatch(resetError());
    }, [dispatch]);
    const formik = useFormik({
        initialValues,
        validationSchema: signinSchema,
        onSubmit: async (values, helpers) => {
            const { email, password, remember } = values;
            try {
                const response = await dispatch(login({ email, password, rememberMe: remember })).unwrap();
                helpers.resetForm();
                // navigate("/dashboard");
                navigate("/");
                showNotification(response?.message || "Login successful.", "success");
            }
            catch (error: any) {
                if (error?.errors && Object.keys(error.errors).length > 0) {
                    helpers.setErrors(error.errors);
                }
                else {
                    // showNotification(error?.message || "Unable to sign in.", "error");
                }
            }
            finally {
                helpers.setSubmitting(false);
            }
        },
    });
    const fieldError = (name: keyof typeof initialValues) => {
        return formik.touched[name] && formik.errors[name] ? <div className="invalid-feedback d-block">{formik.errors[name]}</div> : null;
    };
    return (
        <>
            {/* <PageHeader title="Sign In" subtitle="Sign in to your account to continue." /> */}
            <section className="py-0">
                <div className="container px-5">
                    <div className="row gx-5 justify-content-center">
                        <div className="col-lg-4">
                            <div className="">
                                <div className="p-5">
                                    <div className="text-center mb-5">
                                        {/* <div className="feature-icon bg-black text-white mb-3 mx-auto">
                                            <i className="bi bi-person-circle" />
                                        </div> */}
                                        <h2>Welcome Back</h2>
                                        <p className="mb-0">Sign in to continue to your account.</p>
                                    </div>
                                    {message ? (<NotificationMessage message={message} type="error" />
                                    ) : messageFromNavigate ? (<NotificationMessage message={messageFromNavigate} type="success" />) : null}
                                    <form onSubmit={formik.handleSubmit} noValidate>
                                        <div className="form-floating mb-3">
                                            <input className={`form-control ${formik.touched.email && formik.errors.email ? "is-invalid" : ""}`}
                                                id="email" name="email" type="email"
                                                placeholder="name@example.com" value={formik.values.email}
                                                onChange={formik.handleChange} onBlur={formik.handleBlur} />
                                            <label htmlFor="email">Email address</label>
                                            {fieldError("email")}
                                        </div>
                                        <div className="form-floating mb-3">
                                            <input className={`form-control ${formik.touched.password && formik.errors.password ? "is-invalid" : ""}`}
                                                id="password" name="password" type="password"
                                                placeholder="Password" value={formik.values.password}
                                                onChange={formik.handleChange} onBlur={formik.handleBlur}
                                            />
                                            <label htmlFor="password">Password</label>
                                            {fieldError("password")}
                                        </div>
                                        <div className="d-flex justify-content-between align-items-center mb-4">
                                            {/* <div className="form-check">
                                                <input className="form-check-input" type="checkbox" id="remember" name="remember"
                                                    checked={formik.values.remember} onChange={formik.handleChange} />
                                                <label className="form-check-label" htmlFor="remember">Remember me</label>
                                            </div> */}
                                            <Link to="/forgot-password">Forgot password?</Link>
                                        </div>
                                        <button className="btn btn-black btn-lg w-100" type="submit" disabled={isLoading || formik.isSubmitting}>
                                            {isLoading || formik.isSubmitting ? (
                                                <><span className="spinner-border spinner-border-sm me-2" aria-hidden="true" />Signing in...</>
                                            ) : ("Sign In")}
                                        </button>
                                    </form>
                                    <div className="text-center mt-4">
                                        <p className="mb-0">Don't have an account?{" "}<Link to="/sign-up">Sign Up</Link></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </>
    );
}