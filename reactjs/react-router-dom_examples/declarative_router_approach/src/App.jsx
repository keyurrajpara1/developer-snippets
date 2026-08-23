import { useFormik } from "formik";
import * as Yup from "yup";
import './App.css';
import Navbar from "./components/Navbar";
import ProductList from "./components/ProductList";
import Footer from "./components/Footer";
import { useState } from 'react';
import Home from './pages/Home';
import About from './pages/About';
import Contact from './pages/Contact';
import Users from './pages/Users';
import User from './pages/User';
import Nav from "./components/Nav";
import { BrowserRouter, Routes, Route } from 'react-router-dom';
function App() {
  return (
    <>
      <BrowserRouter>
        {/* <Navbar /> */}
        <Nav />
        <Routes>
          <Route path='/' element={<Home />} />
          <Route path='/about' element={<About />} />
          <Route path='/contact' element={<Contact />} />
          <Route path='/users' element={<Users />} />
          <Route path='/user/:id' element={<User />} />
        </Routes>
      </BrowserRouter>
    </>
  );
}
export default App;
