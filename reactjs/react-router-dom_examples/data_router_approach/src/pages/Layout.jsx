import React from "react";
import { createBrowserRouter, RouterProvider, Link, Outlet } from 'react-router';
const Layout = () => {
	return (
		<div>
			<header>
				<h1></h1>
				<nav>
					<Link to="/">Home</Link> |{" "}
					<Link to="/products">Products</Link> |{" "}
					<Link to="/about">About</Link> |{" "}
					{/* <Link to="/profile" prefetch="intent">
						Profile
					</Link> |{" "} */}
					<Link to="/hooks">Hooks</Link>
				</nav>
			</header>
			<main>
				<Outlet /> {/* Child routes render here */}
			</main>
			<footer>
				{/* <p>© 2026</p> */}
			</footer>
		</div>
	);
};

export default Layout;
