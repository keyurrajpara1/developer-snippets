import { useFormik } from "formik";
import * as Yup from "yup";
import { PageHeader } from "../components/common/PageHeader";
import { useAppDispatch, useAppSelector } from "../app/hooks";
import {
	resetContactStatus,
	submitContact,
} from "../features/contact/contactSlice";
import type { ContactFormValues } from "../types/contact";

const schema = Yup.object({
	name: Yup.string()
		.trim()
		.min(2, "Please enter at least 2 characters.")
		.max(100)
		.required("Name is required."),
	email: Yup.string()
		.trim()
		.email("Enter a valid email address.")
		.required("Email is required."),
	phone: Yup.string()
		.trim()
		.matches(/^[+\d\s().-]{7,20}$/, "Enter a valid phone number.")
		.required("Phone is required."),
	message: Yup.string()
		.trim()
		.min(10, "Please enter at least 10 characters.")
		.max(2000)
		.required("Message is required."),
});

const initialValues: ContactFormValues = {
	name: "",
	email: "",
	phone: "",
	message: "",
};

export function ContactPage() {
	const dispatch = useAppDispatch();
	const { status, error } = useAppSelector((state) => state.contact);
	const formik = useFormik({
		initialValues,
		validationSchema: schema,
		onSubmit: async (values, helpers) => {
			const result = await dispatch(submitContact(values));
			if (submitContact.fulfilled.match(result)) {
				helpers.resetForm();
			}
		},
	});
	const fieldError = (name: keyof ContactFormValues) =>
		formik.touched[name] && formik.errors[name] ? (
			<div className="invalid-feedback d-block">
				{formik.errors[name]}
			</div>
		) : null;
	return (
		<>
			<PageHeader
				title="Contact us"
				subtitle="Send us a message. This starter currently submits to a dummy API."
			/>
			<section className="py-5">
				<div className="container px-5">
					<div className="row gx-5 justify-content-center">
						<div className="col-lg-8">
							<div className="card border-0 shadow-sm">
								<div className="card-body p-5">
									<div className="text-center mb-5">
										<div className="feature-icon bg-primary bg-gradient text-white rounded-3 mb-3 mx-auto">
											<i className="bi bi-envelope" />
										</div>
										<h2 className="fw-bolder">
											Get in touch
										</h2>
										<p className="lead fw-normal text-muted mb-0">
											We would love to hear from you.
										</p>
									</div>
									{status === "succeeded" && (
										<div className="alert alert-success">
											Your message was submitted
											successfully.
										</div>
									)}
									{status === "failed" && (
										<div className="alert alert-danger">
											{error}
										</div>
									)}
									<form
										onSubmit={formik.handleSubmit}
										noValidate
									>
										<div className="form-floating mb-3">
											<input
												className={`form-control ${formik.touched.name && formik.errors.name ? "is-invalid" : ""}`}
												id="name"
												name="name"
												placeholder="Name"
												value={formik.values.name}
												onChange={formik.handleChange}
												onBlur={formik.handleBlur}
											/>
											<label htmlFor="name">
												Full name
											</label>
											{fieldError("name")}
										</div>
										<div className="form-floating mb-3">
											<input
												className={`form-control ${formik.touched.email && formik.errors.email ? "is-invalid" : ""}`}
												id="email"
												name="email"
												type="email"
												placeholder="name@example.com"
												value={formik.values.email}
												onChange={formik.handleChange}
												onBlur={formik.handleBlur}
											/>
											<label htmlFor="email">
												Email address
											</label>
											{fieldError("email")}
										</div>
										<div className="form-floating mb-3">
											<input
												className={`form-control ${formik.touched.phone && formik.errors.phone ? "is-invalid" : ""}`}
												id="phone"
												name="phone"
												placeholder="Phone"
												value={formik.values.phone}
												onChange={formik.handleChange}
												onBlur={formik.handleBlur}
											/>
											<label htmlFor="phone">
												Phone number
											</label>
											{fieldError("phone")}
										</div>
										<div className="form-floating mb-3">
											<textarea
												className={`form-control ${formik.touched.message && formik.errors.message ? "is-invalid" : ""}`}
												id="message"
												name="message"
												placeholder="Message"
												style={{ height: 160 }}
												value={formik.values.message}
												onChange={formik.handleChange}
												onBlur={formik.handleBlur}
											/>
											<label htmlFor="message">
												Message
											</label>
											{fieldError("message")}
										</div>
										<button
											className="btn btn-primary btn-lg w-100"
											type="submit"
											disabled={
												formik.isSubmitting ||
												status === "submitting"
											}
										>
											{status === "submitting"
												? "Sending…"
												: "Submit message"}
										</button>
										{status !== "idle" && (
											<button
												type="button"
												className="btn btn-link d-block mx-auto mt-2"
												onClick={() =>
													dispatch(
														resetContactStatus(),
													)
												}
											>
												Clear status
											</button>
										)}
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</>
	);
}
