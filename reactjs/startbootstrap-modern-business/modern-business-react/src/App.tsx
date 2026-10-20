import { Toaster } from "sonner";
import { AppRoutes } from './routes/AppRoutes';
function App() {
  return (
    <>
      <Toaster position="top-right" />
      <AppRoutes />
    </>
  );
}
export default App;