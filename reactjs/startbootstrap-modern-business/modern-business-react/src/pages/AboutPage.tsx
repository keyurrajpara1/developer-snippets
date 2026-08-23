import { PageHeader } from "../components/common/PageHeader";
export function AboutPage() {
	return (
		<>
			<PageHeader
				title="About us"
				subtitle="A reusable React implementation inspired by the Modern Business template."
			/>
			<section className="py-5">
				<div className="container px-5">
					<div className="row gx-5">
						<div className="col-lg-6">
							<h2 className="fw-bolder">Our mission</h2>
							<p className="lead fw-normal text-muted">
								Create maintainable frontend foundations that
								teams can extend confidently as requirements
								grow.
							</p>
						</div>
						<div className="col-lg-6">
							<div className="p-5 bg-light rounded-3">
								<h3 className="h5">Architecture principles</h3>
								<p className="mb-0">
									Feature-oriented modules, typed boundaries,
									reusable UI components and predictable state
									management.
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
		</>
	);
}
