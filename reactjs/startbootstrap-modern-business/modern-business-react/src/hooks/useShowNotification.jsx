import { toast } from "sonner";
export const useShowNotification = () => {
    const showNotification = (message, variant = "info") => {
        const errorMsg = String(message || "").replace(/<br\s*\/?>|\r\n|\n|\r/gi, "\n");
        const messages = errorMsg.split("\n");
        const content = messages.map((line, index) => (<div key={index}>{line}</div>));
        switch (variant) {
            case "success":
                return toast.success(content);
            case "error":
                return toast.error(content);
            case "warning":
                return toast.warning(content);
            case "info":
            default:
                return toast.info(content);
        }
    };
    return { showNotification };
};