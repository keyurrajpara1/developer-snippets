export function FeatureIcon({ icon }: { icon: string }) {
	return (
		<div className="feature-icon bg-primary bg-gradient text-white rounded-3 mb-3">
			<i className={`bi ${icon}`} aria-hidden="true" />
		</div>
	);
}
