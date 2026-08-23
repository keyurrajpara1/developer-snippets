import { useFormik } from "formik";
import * as Yup from "yup";
import './App.css';
function Form() {
  const formik = useFormik({
    initialValues: { first_name: "", last_name: "" },

    validationSchema: Yup.object({
      first_name: Yup.string().required("First name is required"),
      last_name: Yup.string().required("Last name is required")
    }),

    onSubmit: (values, { resetForm }) => {
      console.log(values);
      resetForm();
    }
  });
  
  return (
    <>
      <form onSubmit={formik.handleSubmit}>
        <div>
          <label htmlFor="first_name">First Name: </label>
          <input type="text" id="first_name" name="first_name" onChange={formik.handleChange} onBlur={formik.handleBlur} value={formik.values.first_name} />
          {formik.touched.first_name && formik.errors.first_name && (
            <div style={{ color: "red" }}>
              {formik.errors.first_name}
            </div>
          )}
        </div>
        <br />
        <div>
          <label htmlFor="last_name">Last Name: </label>
          <input type="text" id="last_name" name="last_name" onChange={formik.handleChange} onBlur={formik.handleBlur} value={formik.values.last_name} />
          {formik.touched.last_name && formik.errors.last_name && (
            <div style={{ color: "red" }}>
              {formik.errors.last_name}
            </div>
          )}
        </div>
        <br />
        <div>
          <button type="submit">Save</button>
        </div>
      </form>
    </>
  );
}
export default App;
