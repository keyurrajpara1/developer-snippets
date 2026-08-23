import { useAppSelector } from "../../app/hooks";

export function Footer() {
	const year = useAppSelector((state) => state.site.currentYear);
	return (
		<footer className="py-5 bg-dark text-white">
			<div className="container px-5">
				<p className="m-0 text-center">
					Copyright © Modern Business {year}
				</p>
			</div>
		</footer>
	);
}
