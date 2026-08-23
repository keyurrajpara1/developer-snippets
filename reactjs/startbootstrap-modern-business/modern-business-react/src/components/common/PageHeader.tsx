export function PageHeader({
	title,
	subtitle,
}: {
	title: string;
	subtitle: string;
}) {
	return (
		<header className="page-header py-5">
			<div className="container px-5">
				<div className="row gx-5 align-items-center">
					<div className="col-lg-8">
						<h1 className="display-5 fw-bolder text-white mb-2">
							{title}
						</h1>
						<p className="lead text-white-50 mb-0">{subtitle}</p>
					</div>
				</div>
			</div>
		</header>
	);
}
