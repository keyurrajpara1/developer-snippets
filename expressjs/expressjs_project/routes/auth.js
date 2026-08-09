import express from "express";
import AuthController from "../controllers/AuthController.js";
import auth from "../middleware/auth.js";
const router = express.Router();
router.get("/", (req, res) => { // Home - public
    res.render("home", { title: "Home" });
});
router.get("/login", AuthController.loginPage); // Login
router.post("/login", AuthController.login);
router.get("/logout", AuthController.logout); // Logout
router.get("/about", (req, res) => { // About
    res.render("about", { title: "About Us" });
});
router.get("/contact", (req, res) => { // Contact
    res.render("contact", { title: "Contact Us" });
});
export default router;