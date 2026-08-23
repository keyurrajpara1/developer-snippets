import React from 'react'
import { Link, Outlet } from 'react-router-dom'

const Products = () => {
  return (
    <div>
      <h1>Products Page</h1>
      <div>
        <nav>
          <Link to="phones">Phones</Link> | 
          <Link to="laptops">Laptops</Link> | 
          <Link to="cameras">Cameras</Link>
        </nav>
        <Outlet />
      </div>
    </div>
  )
}

export default Products;
