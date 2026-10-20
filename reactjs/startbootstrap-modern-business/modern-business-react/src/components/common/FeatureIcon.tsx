export function FeatureIcon({ icon }: { icon: string }) {
	return (
		<div className="feature-icon bg-dark text-white mb-3">
			<i className={`bi ${icon}`} aria-hidden="true" />
		</div>
	);
}
