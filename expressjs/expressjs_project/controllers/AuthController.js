import User from "../models/User.js";
import bcrypt from "bcrypt";
import { loginSchema } from "../validators/authValidator.js";
class AuthController {
    static loginPage(req, res) {
        if (req.session.user) {
            return res.redirect("/");
        }
        res.render("login", { title: "Login" });
    }
    static async login(req, res) {
        const result = loginSchema.safeParse(req.body);
        if (!result.success) {
            return res.render("login", { title: "Login", error: result.error.issues[0].message, email: req.body.email });
        }
        const { email, password } = result.data;
        const user = await User.findByEmail(email);
        if (!user) {
            return res.render("login", { title: "Login", error: "User not found", email });
        }
        const passwordMatch = await bcrypt.compare(password, user.password);
        if (!passwordMatch) {
            return res.render("login", { title: "Login", error: "Invalid password", email });
        }
        req.session.user = { id: user.id, name: user.first_name + " " + user.last_name, email: user.email };
        res.redirect("/");
    }
    static logout(req, res) {
        req.session.destroy((err) => {
            if (err) {
                return res.send("Logout failed");
            }
            res.redirect("/");
        });
    }
}
export default AuthController;