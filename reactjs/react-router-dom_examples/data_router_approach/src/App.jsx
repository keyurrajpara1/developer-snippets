import React, { Children } from 'react'
import Home from './pages/Home';
import About from './pages/About';
import Products from './pages/Products';
import Profile from './pages/Profile';
import Layout from './pages/Layout';
import Hooks from './pages/Hooks';
import UseStateHook from './pages/UseStateHook';
import UseEffectHook from './pages/UseEffectHook';
import UseEffectHook2 from './pages/UseEffectHook2';
import UseReducer from './pages/UseReducer';
import Index from './pages/UseCallback/Index';
import UseMemo from './pages/UseMemo';
import UseRef from './pages/UseRef';
import { createBrowserRouter, RouterProvider, Link, Outlet } from 'react-router';
async function githubProfileLoader(){
  const res = await fetch("https://api.github.com/users/VikrantParmar");
  // debugger;
  if(!res.ok){
    // debugger;
    throw new Error('Failed to fetch profile');
  }
  else{
    // debugger;
    return res.json();
  }
}
const App = () => {
  const router = createBrowserRouter([
    {
      path: "/",
      element: <Layout />,
      children: [
        { index: true, element: <Home /> },
        { path: 'about', element: <About /> },
        { path: 'products', element: <Products /> },
        { path: 'profile', element: <Profile />, loader: githubProfileLoader },
        {
          path: 'hooks',
          element: <Hooks />,
          children: [
            { path: 'usestate', element: <UseStateHook /> },
            { path: 'useeffect', element: <UseEffectHook /> },
            { path: 'useeffect2', element: <UseEffectHook2 /> },
            { path: 'useReducer', element: <UseReducer /> },
            { path: 'useCallback', element: <Index /> },
            { path: 'useMemo', element: <UseMemo /> },
            { path: 'useRef', element: <UseRef /> },
          ]
        },
      ]
    }
  ]);
  return (
    <RouterProvider router={router} />
  )
}

export default App