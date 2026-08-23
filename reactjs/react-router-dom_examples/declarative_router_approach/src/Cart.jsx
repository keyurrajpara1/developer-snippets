import { useFormik } from "formik";
import * as Yup from "yup";
import './App.css';
import Navbar from "./components/Navbar";
import ProductList from "./components/ProductList";
import Footer from "./components/Footer";
import { useState } from 'react';
function Cart() {
  const products = [
    {
      id: 1,
      price: 10,
      name: "Product A",
      quantity: 0,
    },
    {
      id: 2,
      price: 20,
      name: "Product B",
      quantity: 0,
    }
  ];

  let [productsData, setProductsData] = useState(products);
  let [totalAmount, setTotalAmount] = useState(0);

  const incrementQuantity = (productId) => {
    let newProductsData = [...productsData];
    let newTotalAmount = totalAmount;
    const index = newProductsData.findIndex(
      (product) => product.id === productId
    );
    if (index !== -1) {
      newProductsData[index].quantity++;
      newTotalAmount += newProductsData[index].price;
      setTotalAmount(newTotalAmount);
      setProductsData(newProductsData);
    }
  };

  const decrementQuantity = (productId) => {
    let newProductsData = [...productsData];
    let newTotalAmount = totalAmount;
    const index = newProductsData.findIndex(
      (product) => product.id === productId
    );
    if (index !== -1 && newProductsData[index].quantity > 0) {
      newProductsData[index].quantity--;
      newTotalAmount -= newProductsData[index].price;
      setTotalAmount(newTotalAmount);
      setProductsData(newProductsData);
    }
  };

  const resetQuantity = () => {
    let newProductsData = [...productsData];
    newProductsData.map((product) => {
      product.quantity = 0;
    });
    setProductsData(newProductsData);
    setTotalAmount(0);
  };

  const removeItem = (productId) => {
    let newProductsData = [...productsData];
    const index = newProductsData.findIndex(
      (product) => product.id === productId
    );
    if (index !== -1) {
      const product = newProductsData[index];
      const updatedTotalAmount = totalAmount - (product.price * product.quantity); // subtract total amount of that product
      newProductsData.splice(index, 1); // remove item from array
      setProductsData(newProductsData);
      setTotalAmount(updatedTotalAmount);
    }
  };
  
  return (
    <>
      <Navbar />
      <main className="container mt-5">
        <ProductList products={productsData} incrementQuantity={incrementQuantity} decrementQuantity={decrementQuantity} removeItem={removeItem} />
        {/* DEBUG VIEW */}
        <pre className="mt-4 bg-light p-3">{JSON.stringify(productsData, null, "\t")}</pre>
      </main>
      <Footer totalAmount={totalAmount} resetQuantity={resetQuantity} />
    </>
  );
}
export default Cart;
