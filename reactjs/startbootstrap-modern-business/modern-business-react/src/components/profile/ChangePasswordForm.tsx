import React from "react";
import { useFormik } from "formik";
import { useDispatch, useSelector } from "react-redux";
import { updatePassword } from "@/app/store/authenticationSlice";
import { changePasswordSchema } from "@/schemas/changePasswordSchema";
import { NotificationMessage } from "@/components/common/NotificationMessage";
import { _loader } from "@/utils/loaderHelper";
const initialValues = { current_password: "", password: "", password_confirmation: "" };
export function ChangePasswordForm() {
    const dispatch = useDispatch();
    const { updateLoading, message } = useSelector((state: any) => state.auth);
    const formik = useFormik({
        initialValues,
        validationSchema: changePasswordSchema,
        onSubmit: async (values, helpers) => {
            try {
                await dispatch(updatePassword(values) as any).unwrap();
                helpers.resetForm();
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
        <div className="card border-0 shadow-sm">
            <div className="card-body p-4">
                <h2 className="mb-3">Change Password</h2>
                <hr />
                {message && (<NotificationMessage message={message} type="success" />)}
                <form onSubmit={formik.handleSubmit} noValidate>
                    <div className="form-floating mb-3">
                        <input
                            className={`form-control ${formik.touched.current_password && formik.errors.current_password ? "is-invalid" : ""}`}
                            id="current_password" name="current_password" type="password"
                            placeholder="Current password" value={formik.values.current_password}
                            onChange={formik.handleChange} onBlur={formik.handleBlur}
                        />
                        <label htmlFor="current_password">Current password</label>
                        {fieldError("current_password")}
                    </div>
                    <div className="form-floating mb-3">
                        <input
                            className={`form-control ${formik.touched.password && formik.errors.password ? "is-invalid" : ""}`}
                            id="password" name="password" type="password"
                            placeholder="New password" value={formik.values.password}
                            onChange={formik.handleChange} onBlur={formik.handleBlur}
                        />
                        <label htmlFor="password">New password</label>
                        {fieldError("password")}
                    </div>
                    <div className="form-floating mb-4">
                        <input
                            className={`form-control ${formik.touched.password_confirmation && formik.errors.password_confirmation ? "is-invalid" : ""}`}
                            id="password_confirmation" name="password_confirmation" type="password"
                            placeholder="Confirm password" value={formik.values.password_confirmation}
                            onChange={formik.handleChange} onBlur={formik.handleBlur}
                        />
                        <label htmlFor="password_confirmation">Confirm new password</label>
                        {fieldError("password_confirmation")}
                    </div>
                    <button type="submit" className="btn btn-black" disabled={updateLoading || formik.isSubmitting}>
                        {_loader({type: "btn", isSubmitting: updateLoading || formik.isSubmitting, btnTitle: "Update Password"})}
                    </button>
                </form>
            </div>
        </div>
    );
}