import * as Yup from "yup";
export const profileSchema = Yup.object({
    first_name: Yup.string()
        .required("First Name is required"),

    last_name: Yup.string()
        .required("Last Name is required"),

    phone_number: Yup.string()
        .required("Phone number is required"),
});