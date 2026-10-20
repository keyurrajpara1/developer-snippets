/* export function Footer() {
	// const year = useAppSelector((state) => state.site.currentYear);
	const year = 2026;
	return (
		<footer className="py-5 bg-dark text-white">
			<div className="container px-5">
				<p className="m-0 text-center">
					Copyright © Lauren {year}
				</p>
			</div>
		</footer>
	);
} */
import { Link } from "react-router";
export function Footer() {
	const year = new Date().getFullYear();
	return (
		<footer className="bg-dark py-4 mt-auto">
			<div className="container px-5">
				<div className="row align-items-center justify-content-between flex-column flex-sm-row">
					<div className="col-auto">
						<div className="small m-0 text-white">
							Copyright © Lauren {year}
						</div>
					</div>
					<div className="col-auto">
						<Link className="link-light small" to="/privacy-policy">
							Privacy
						</Link>
						<span className="text-white mx-1">·</span>
						<Link className="link-light small" to="/terms-and-conditions">
							Terms
						</Link>
						<span className="text-white mx-1">·</span>
						<Link className="link-light small" to="/contact-us">
							Contact Us
						</Link>
					</div>
				</div>
			</div>
		</footer>
	);
}