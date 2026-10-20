import React, { useEffect } from "react";
import { useFormik } from "formik";
import { useDispatch, useSelector } from "react-redux";
import { fetchProfile, updateProfile } from "@/app/store/authenticationSlice";
import { profileSchema } from "@/schemas/profileSchema";
import { NotificationMessage } from "@/components/common/NotificationMessage";
import { _loader } from "@/utils/loaderHelper";
export function ProfileForm() {
    const dispatch = useDispatch();
    const { isLoading, updateLoading, user, message } = useSelector((state: any) => state.auth);
    useEffect(() => {
        dispatch(fetchProfile() as any);
    }, [dispatch]);
    const formik = useFormik({
        enableReinitialize: true,
        initialValues: {
            first_name: user?.first_name || "",
            last_name: user?.last_name || "",
            email: user?.email || "",
            phone_number: user?.phone_number || "",
        },
        validationSchema: profileSchema,
        onSubmit: async (values, helpers) => {
            try {
                await dispatch(updateProfile(values) as any).unwrap();
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
    const fieldError = (name: keyof typeof formik.values) =>
        formik.touched[name] && formik.errors[name] ? (
            <div className="invalid-feedback d-block">
                {String(formik.errors[name])}
            </div>
        ) : null;
    if (isLoading) {
        return _loader({ type: "" });
    }
    return (
        <div className="card border-0 shadow-sm">
            <div className="card-body p-4">
                <h2 className="mb-3">Update Profile</h2>
                <hr />
                {message && (<NotificationMessage message={message} type="success" />)}
                <form onSubmit={formik.handleSubmit} noValidate>
                    <div className="form-floating mb-3">
                        <input
                            className={`form-control ${formik.touched.first_name && formik.errors.first_name ? "is-invalid" : ""}`}
                            id="first_name" name="first_name" type="text"
                            placeholder="First name" value={formik.values.first_name}
                            onChange={formik.handleChange} onBlur={formik.handleBlur}
                        />
                        <label htmlFor="first_name">First name</label>
                        {fieldError("first_name")}
                    </div>
                    <div className="form-floating mb-3">
                        <input
                            className={`form-control ${formik.touched.last_name && formik.errors.last_name ? "is-invalid" : ""}`}
                            id="last_name" name="last_name" type="text"
                            placeholder="Last name" value={formik.values.last_name}
                            onChange={formik.handleChange} onBlur={formik.handleBlur}
                        />
                        <label htmlFor="last_name">Last name</label>
                        {fieldError("last_name")}
                    </div>
                    <div className="form-floating mb-3">
                        <input
                            className="form-control"
                            id="email" name="email" type="email"
                            placeholder="Email" value={formik.values.email}
                            disabled
                        />
                        <label htmlFor="email">Email address</label>
                    </div>
                    <div className="form-floating mb-4">
                        <input
                            className={`form-control ${formik.touched.phone_number && formik.errors.phone_number ? "is-invalid" : ""}`}
                            id="phone_number" name="phone_number" type="tel"
                            placeholder="Phone number" value={formik.values.phone_number}
                            onChange={formik.handleChange} onBlur={formik.handleBlur}
                        />
                        <label htmlFor="phone_number">Phone number</label>
                        {fieldError("phone_number")}
                    </div>
                    <button type="submit" className="btn btn-black" disabled={updateLoading || formik.isSubmitting}>
                        {_loader({ type: "btn", isSubmitting: updateLoading || formik.isSubmitting, btnTitle: "Save Changes" })}
                    </button>
                </form>
            </div>
        </div>
    );
}