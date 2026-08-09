import express from "express";
import path from "path";
import { fileURLToPath } from "url";
import authRoutes from "./routes/auth.js";
import session from "express-session";
import expressLayouts from "express-ejs-layouts";
import fs from "fs";
const app = express();
const PORT = process.env.APP_PORT;
// Required for __dirname in ES Modules
// console.log(import.meta.url);
const __filename = fileURLToPath(import.meta.url);
// console.log(__filename);
const __dirname = path.dirname(__filename);
const manifestPath = path.join(__dirname, "public", "build", ".vite", "manifest.json" );
let manifest = {};
if (fs.existsSync(manifestPath)) { manifest = JSON.parse(fs.readFileSync(manifestPath, "utf8")); }
// console.log(__dirname);
// View engine setup
app.set("view engine", "ejs");
app.set("views", path.join(__dirname, "views"));
app.use(expressLayouts);
app.set("layout", "layouts/main");
// Middleware
app.use(express.urlencoded({ extended: true }));
app.use(express.json());
app.use(session({ secret: process.env.SESSION_SECRET, resave: false, saveUninitialized: false }));
app.use(express.static(path.join(__dirname, "public")));
app.use((req, res, next) => {
    res.locals.appName = process.env.APP_NAME;
    res.locals.currentYear = new Date().getFullYear();
    res.locals.user = req.session.user || null;
    next();
});
/* app.use((req, res, next) => {
    const appAsset = manifest["assets/js/app.js"];
    res.locals.viteAssets = () => `<link rel="stylesheet" href="/build/${appAsset.css[0]}"><script type="module" src="/build/${appAsset.file}"></script>`;
    next();
}); */
app.use((req, res, next) => {
    const appAsset = manifest["assets/js/app.js"];
    res.locals.vite = { css: "/build/" + appAsset.css[0], js: "/build/" + appAsset.file };
    next();
});
// Routes
app.use("/", authRoutes);
// Start server
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});