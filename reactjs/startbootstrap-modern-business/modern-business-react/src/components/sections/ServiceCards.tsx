import { services } from "../../data/siteData";
import { FeatureIcon } from "../common/FeatureIcon";

export function ServiceCards() {
	return (
		<div className="row gx-5 row-cols-1 row-cols-md-3">
			{services.map((service) => (
				<div className="col mb-5" key={service.title}>
					<FeatureIcon icon={service.icon} />
					<h2 className="h5">{service.title}</h2>
					<p className="mb-0">{service.text}</p>
				</div>
			))}
		</div>
	);
}
