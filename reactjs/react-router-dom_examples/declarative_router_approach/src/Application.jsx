import React from 'react'
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import About from './pages/About';
import Layout from './components/Layout';
import Home from './pages/Home';
import Products from './pages/Products';
import Phones from './pages/Phones';
import Laptops from './pages/Laptops';
import Cameras from './pages/Cameras';
const Application = () => {
  return (
    <>
        <BrowserRouter>
            <Routes>
                <Route path='/' element={<Layout />}>
                  <Route index element={<Home />} />
                  <Route path='about' element={<About />} />

                  <Route path='products' element={<Products />}>
                    <Route path='phones' element={<Phones />} />
                    <Route path='laptops' element={<Laptops />} />
                    <Route path='cameras' element={<Cameras />} />
                  </Route>
                </Route>
            </Routes>
        </BrowserRouter>
    </>
  )
}

export default Application