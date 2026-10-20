import * as Yup from 'yup'
export const signinSchema = Yup.object({
    email: Yup.string()
        .trim()
        .email("Enter a valid email address.")
        .required("Email address is required."),
    password: Yup.string()
        .required("Password is required.")
        .min(6, "Password must be at least 6 characters."),
});