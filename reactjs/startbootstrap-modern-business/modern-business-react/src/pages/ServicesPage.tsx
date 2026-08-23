import { PageHeader } from "../components/common/PageHeader";
import { ServiceCards } from "../components/sections/ServiceCards";
export function ServicesPage() {
	return (
		<>
			<PageHeader
				title="Services"
				subtitle="Flexible building blocks for a growing business application."
			/>
			<section className="py-5">
				<div className="container px-5 my-5">
					<ServiceCards />
				</div>
			</section>
		</>
	);
}
