import * as Yup from "yup";

export const changePasswordSchema = Yup.object({
    current_password: Yup.string()
        .required("Current password is required"),

    password: Yup.string()
        .min(8, "Password must be at least 8 characters")
        .required("New password is required"),

    password_confirmation: Yup.string()
        .oneOf(
            [Yup.ref("password")],
            "Passwords must match"
        )
        .required("Confirm new password is required"),
});