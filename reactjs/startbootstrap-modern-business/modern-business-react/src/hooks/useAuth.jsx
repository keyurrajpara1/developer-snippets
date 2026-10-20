import { useSelector } from "react-redux";
export const useAuth = () => {
  const { user, isAuthenticated } = useSelector((state) => state.auth);
  console.log("USE AUTH - isAuthenticated:", isAuthenticated);
  console.log("USE AUTH - user:", user);
  return { user, isAuthenticated };
};