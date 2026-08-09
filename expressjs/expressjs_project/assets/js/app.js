/* import "../scss/app.scss";
import * as bootstrap from "bootstrap";
window.bootstrap = bootstrap; */
import "../scss/app.scss";
import * as bootstrap from "bootstrap";
import { loginSchema } from "../../validators/authValidator.js";
window.bootstrap = bootstrap;
const loginForm = document.querySelector("#loginForm");
if (loginForm) {
    loginForm.addEventListener("submit", (event) => {
        const formData = new FormData(loginForm);
        const data = {
            email: formData.get("email"),
            password: formData.get("password"),
        };
        const result = loginSchema.safeParse(data);
        // Remove previous errors
        document.querySelectorAll(".validation-error").forEach((element) => {
            element.remove();
        });
        document.querySelectorAll(".is-invalid").forEach((element) => {
            element.classList.remove("is-invalid");
        });
        if (!result.success) {
            event.preventDefault();
            result.error.issues.forEach((issue) => {
                const field = issue.path[0];
                const input = loginForm.querySelector(`[name="${field}"]`);
                if (!input) return;
                input.classList.add("is-invalid");
                const error = document.createElement("div");
                error.className = "invalid-feedback validation-error";
                error.textContent = issue.message;
                input.parentElement.appendChild(error);
            });
        }
    });
}
