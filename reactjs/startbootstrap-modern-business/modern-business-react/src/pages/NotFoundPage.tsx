import { Link } from "react-router";
export default function NotFoundPage() {
	return (
		<section className="py-5">
			<div className="container px-5 text-center">
				<h1 className="display-1">404</h1>
				<p className="lead mb-4">
					The page you requested could not be found.
				</p>
				<Link to="/" className="btn btn-black">
					Back to home
				</Link>
			</div>
		</section>
	);
}
