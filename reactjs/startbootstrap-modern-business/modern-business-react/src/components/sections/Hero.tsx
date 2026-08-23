import { Link } from "react-router";

export function Hero() {
	return (
		<header className="bg-dark py-5">
			<div className="container px-5">
				<div className="row gx-5 align-items-center justify-content-center">
					<div className="col-lg-8 col-xl-7 col-xxl-6">
						<div className="my-5 text-center text-xl-start">
							<h1 className="display-5 fw-bolder text-white mb-2">
								A Bootstrap-inspired business site, built
								properly in React.
							</h1>
							<p className="lead fw-normal text-white-50 mb-4">
								Reusable components, TypeScript, centralized
								state and an API-ready architecture give this
								classic template a modern application
								foundation.
							</p>
							<div className="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
								<Link
									className="btn btn-primary btn-lg px-4 me-sm-3"
									to="/services"
								>
									Get Started
								</Link>
								<Link
									className="btn btn-outline-light btn-lg px-4"
									to="/about"
								>
									Learn More
								</Link>
							</div>
						</div>
					</div>
					<div className="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
						<div className="hero-placeholder rounded-3 shadow-lg">
							<i className="bi bi-laptop" />
						</div>
					</div>
				</div>
			</div>
		</header>
	);
}
