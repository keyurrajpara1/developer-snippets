import React from "react";
interface NotificationMessageProps {
    message: string | string[];
    type?: "success" | "error" | "warning" | "info";
    dismissible?: boolean;
    onClose?: () => void;
}
export function NotificationMessage({
    message,
    type = "error",
    dismissible = false,
    onClose,
}: NotificationMessageProps) {
    const alertClass = {
        success: "alert-success",
        error: "alert-danger",
        warning: "alert-warning",
        info: "alert-info",
    }[type];
    const messages = Array.isArray(message)
        ? message
        : String(message)
              .replace(/<br\s*\/?>|\r\n|\n|\r/gi, "\n")
              .split("\n");
    return (
        <div
            className={`alert ${alertClass} ${
                dismissible ? "alert-dismissible fade show" : ""
            }`}
            role="alert"
        >
            {messages.map((line, index) => (
                <div key={index}>{line}</div>
            ))}
            {dismissible && onClose && (
                <button
                    type="button"
                    className="btn-close"
                    aria-label="Close"
                    onClick={onClose}
                />
            )}
        </div>
    );
}