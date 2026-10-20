export function _loader({
	type,
	isSubmitting = false,
	isAdd = true,
	btnTitle = "",
}) {
	if (type === "body") {
		return (
			<div
				className="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center"
				style={{
					backgroundColor: "rgba(255, 255, 255, 0.8)",
					zIndex: 1,
				}}
			>
				<div
					className="spinner-border"
					role="status"
					aria-label="Loading"
				/>
			</div>
		);
	}
	if (type === "crud") {
		return isSubmitting ? (
			<span
				className="spinner-border spinner-border-sm"
				role="status"
				aria-hidden="true"
			/>
		) : isAdd ? (
			"Update"
		) : (
			"Add"
		);
	}
	if (type === "btn") {
		return isSubmitting ? (
			<>
				<span
					className="spinner-border spinner-border-sm me-2"
					role="status"
					aria-hidden="true"
				/>
				{btnTitle}
			</>
		) : (
			btnTitle
		);
	}
	if (type === "w") {
		return isSubmitting ? (
			<span
				className="spinner-border spinner-border-sm"
				role="status"
				aria-hidden="true"
			/>
		) : (
			"Next"
		);
	}
	return (
		<div className="p-5">
			<div className="d-flex justify-content-center align-items-center">
				<span
					className="spinner-border spinner-border-sm me-2"
					role="status"
					aria-hidden="true"
				/>
				Loading...
			</div>
		</div>
	);
}
