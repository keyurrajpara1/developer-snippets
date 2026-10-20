import * as Yup from "yup";
export const signupSchema = Yup.object({
    first_name: Yup.string()
        .trim()
        .min(2, "First name must be at least 2 characters.")
        .max(50, "First name cannot exceed 50 characters.")
        .required("First name is required."),
    last_name: Yup.string()
        .trim()
        .min(2, "Last name must be at least 2 characters.")
        .max(50, "Last name cannot exceed 50 characters.")
        .required("Last name is required."),
    email: Yup.string()
        .trim()
        .email("Enter a valid email address.")
        .required("Email address is required."),
    phone_number: Yup.string()
        .trim()
        .matches(
            /^[0-9+\-\s()]+$/,
            "Enter a valid phone number."
        )
        .min(7, "Phone number must be at least 7 characters.")
        .max(20, "Phone number cannot exceed 20 characters.")
        .required("Phone number is required."),
    password: Yup.string()
        .min(6, "Password must be at least 6 characters.")
        .required("Password is required."),
    password_confirmation: Yup.string()
        .oneOf([Yup.ref("password")], "Passwords must match.")
        .required("Please confirm your password."),
    terms: Yup.boolean()
        .oneOf([true], "You must accept the Terms & Conditions.")
        .required(),
});