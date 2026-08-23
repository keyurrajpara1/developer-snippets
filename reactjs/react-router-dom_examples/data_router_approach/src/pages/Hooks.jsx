import React from "react";
import { createBrowserRouter, RouterProvider, Link, Outlet } from 'react-router';
const Hooks = () => {
  const img = null;
  return (
    <>
      <br />
      <Link to="/hooks/usestate">useState</Link> |{" "}
      <Link to="/hooks/useeffect">useEffect</Link> |{" "}
      <Link to="/hooks/useeffect2">UseEffectHook2</Link> |{" "}
      <Link to="/hooks/useReducer">UseReducer</Link> |{" "}
      <Link to="/hooks/useCallback">UseCallback</Link> |{" "}
      <Link to="/hooks/useMemo">UseMemo</Link> |{" "}
      <Link to="/hooks/useRef">UseRef</Link> |{" "}
      <br />
      <br />
      <Outlet /> {/* Child routes render here */}
    </>
  );
};

export default Hooks;
