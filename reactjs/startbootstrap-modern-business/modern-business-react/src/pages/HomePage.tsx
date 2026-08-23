import { Link } from "react-router";
import { Hero } from "../components/sections/Hero";
import { ServiceCards } from "../components/sections/ServiceCards";
import { features } from "../data/siteData";

export function HomePage() {
	return (
		<>
			<Hero />
			<section className="py-5">
				<div className="container px-5 my-5">
					<div className="row gx-5">
						<div className="col-lg-6">
							<h2 className="fw-bolder mb-0">
								A better way to build.
							</h2>
						</div>
						<div className="col-lg-6">
							<p className="lead fw-normal text-muted mb-0">
								The static design is transformed into a scalable
								React application without losing the clean
								Modern Business look.
							</p>
						</div>
					</div>
				</div>
			</section>
			<section className="py-5 bg-light">
				<div className="container px-5 my-5">
					<h2 className="fw-bolder text-center mb-5">Services</h2>
					<ServiceCards />
				</div>
			</section>
			<section className="py-5">
				<div className="container px-5 my-5">
					<div className="row gx-5 align-items-center">
						<div className="col-lg-6">
							<div className="feature-illustration rounded-3" />
						</div>
						<div className="col-lg-6">
							<h2 className="fw-bolder">Built for future APIs</h2>
							<p className="lead fw-normal text-muted">
								The contact flow already has validation, Redux
								async state and Axios. Replace the dummy
								endpoint with your backend when ready.
							</p>
							<ul className="mb-4">
								{features.map((feature) => (
									<li key={feature} className="mb-2">
										{feature}
									</li>
								))}
							</ul>
							<Link className="btn btn-primary" to="/contact">
								Contact us
							</Link>
						</div>
					</div>
				</div>
			</section>
		</>
	);
}
