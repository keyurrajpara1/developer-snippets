import React, { useEffect } from "react";
import { useFormik } from "formik";
import { Link, useNavigate } from "react-router";
import { useDispatch, useSelector } from "react-redux";
import { register, resetError } from "@/app/store/authenticationSlice";
import { PageHeader } from "@/components/common/PageHeader";
import { NotificationMessage } from "@/components/common/NotificationMessage";
import { signupSchema } from "@/schemas/signupSchema";
import { _loader } from "@/utils/loaderHelper";
const initialValues = { first_name: "", last_name: "", email: "", phone_number: "", password: "", password_confirmation: "", terms: false };
export default function SignUpPage() {
    const dispatch = useDispatch();
    const navigate = useNavigate();
    const { isLoading, message } = useSelector((state: any) => state.auth);
    useEffect(() => {
        dispatch(resetError());
    }, [dispatch]);
    const formik = useFormik({
        initialValues,
        validationSchema: signupSchema,
        onSubmit: async (values, helpers) => {
            try {
                const response = await dispatch(register(values) as any).unwrap();
                helpers.resetForm();
                navigate("/sign-in", {
                    replace: true,
                    state: {
                        message: response?.message || "",
                    },
                });
            }
            catch (error: any) {
                if (error?.errors && Object.keys(error.errors).length > 0) {
                    helpers.setErrors(error.errors);
                }
            }
            finally {
                helpers.setSubmitting(false);
            }
        },
    });
    const fieldError = (name: keyof typeof initialValues) => {
        return formik.touched[name] && formik.errors[name] ? <div className="invalid-feedback d-block">{String(formik.errors[name])}</div> : null;
    };
    return (
        <>
            {/* <PageHeader title="Sign Up" subtitle="Create your account to get started." /> */}
            <section className="py-0">
                <div className="container px-5">
                    <div className="row gx-5 justify-content-center">
                        <div className="col-lg-5">
                            <div className="">
                                <div className="p-5">
                                    <div className="text-center mb-5">
                                        {/* <div className="feature-icon bg-black text-white mb-3 mx-auto">
                                            <i className="bi bi-person-plus" />
                                        </div> */}
                                        <h2>Create Your Account</h2>
                                        <p className="mb-0">Join us today and get started.</p>
                                    </div>
                                    {/* API message */}
                                    {message && (<NotificationMessage message={message} type="error" />)}
                                    <form onSubmit={formik.handleSubmit} noValidate>
                                        {/* First Name */}
                                        <div className="form-floating mb-3">
                                            <input
                                                className={`form-control ${formik.touched.first_name && formik.errors.first_name ? "is-invalid" : ""}`}
                                                id="first_name" name="first_name" type="text"
                                                placeholder="First name" value={formik.values.first_name}
                                                onChange={formik.handleChange} onBlur={formik.handleBlur} />
                                            <label htmlFor="first_name">First name</label>
                                            {fieldError("first_name")}
                                        </div>
                                        {/* Last Name */}
                                        <div className="form-floating mb-3">
                                            <input
                                                className={`form-control ${formik.touched.last_name && formik.errors.last_name ? "is-invalid" : ""}`}
                                                id="last_name" name="last_name" type="text"
                                                placeholder="Last name" value={formik.values.last_name}
                                                onChange={formik.handleChange} onBlur={formik.handleBlur} />
                                            <label htmlFor="last_name">Last name</label>
                                            {fieldError("last_name")}
                                        </div>
                                        {/* Email */}
                                        <div className="form-floating mb-3">
                                            <input
                                                className={`form-control ${formik.touched.email && formik.errors.email ? "is-invalid" : ""}`}
                                                id="email" name="email" type="email"
                                                placeholder="name@example.com" value={formik.values.email}
                                                onChange={formik.handleChange} onBlur={formik.handleBlur}
                                                autoComplete="new-email"
                                            />
                                            <label htmlFor="email">Email address</label>
                                            {fieldError("email")}
                                        </div>
                                        {/* Phone Number */}
                                        <div className="form-floating mb-3">
                                            <input
                                                className={`form-control ${formik.touched.phone_number && formik.errors.phone_number ? "is-invalid" : ""}`}
                                                id="phone_number" name="phone_number"
                                                type="tel" placeholder="Phone number"
                                                value={formik.values.phone_number}
                                                onChange={formik.handleChange} onBlur={formik.handleBlur}
                                            />
                                            <label htmlFor="phone_number">Phone number</label>
                                            {fieldError("phone_number")}
                                        </div>
                                        {/* Password */}
                                        <div className="form-floating mb-3">
                                            <input
                                                className={`form-control ${formik.touched.password && formik.errors.password ? "is-invalid" : ""}`}
                                                id="password" name="password" type="password"
                                                placeholder="Password" value={formik.values.password}
                                                onChange={formik.handleChange} onBlur={formik.handleBlur}
                                                autoComplete="new-password"
                                            />
                                            <label htmlFor="password">Password</label>
                                            {fieldError("password")}
                                        </div>
                                        {/* Confirm Password */}
                                        <div className="form-floating mb-3">
                                            <input
                                                className={`form-control ${formik.touched.password_confirmation && formik.errors.password_confirmation ? "is-invalid" : ""}`}
                                                id="password_confirmation" name="password_confirmation" type="password"
                                                placeholder="Confirm password" value={formik.values.password_confirmation}
                                                onChange={formik.handleChange} onBlur={formik.handleBlur}
                                                autoComplete="new-password"
                                            />
                                            <label htmlFor="password_confirmation">Confirm password</label>
                                            {fieldError("password_confirmation")}
                                        </div>
                                        {/* Terms */}
                                        <div className="mb-4">
                                            <div className="form-check">
                                                <input
                                                    className={`form-check-input ${formik.touched.terms && formik.errors.terms ? "is-invalid" : ""}`}
                                                    type="checkbox" id="terms" name="terms"
                                                    checked={formik.values.terms}
                                                    onChange={formik.handleChange} onBlur={formik.handleBlur}
                                                />
                                                <label className="form-check-label" htmlFor="terms">
                                                    I agree to the{" "}<Link to="/terms">Terms & Conditions</Link>
                                                </label>
                                            </div>
                                            {fieldError("terms")}
                                        </div>
                                        {/* Submit */}
                                        <button className="btn btn-black btn-lg w-100" type="submit" disabled={isLoading || formik.isSubmitting}>
                                            {_loader({type: "btn", isSubmitting: isLoading || formik.isSubmitting, btnTitle: "Sign Up"})}
                                        </button>
                                    </form>
                                    {/* Sign In */}
                                    <div className="text-center mt-4">
                                        <p className="mb-0">Already have an account?{" "}<Link to="/sign-in">Sign In</Link></p>
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