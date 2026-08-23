import Product from "./Product";

function ProductList(props) {  
  return (
    <>
      {props.products.length > 0 ? (
        props.products.map((product) => {
          return (
            <Product
              product={product}
              key={product.id}
              incrementQuantity={props.incrementQuantity}
              decrementQuantity={props.decrementQuantity}
              removeItem={props.removeItem}
            />
          );
        })
      ) : (
        <h3 className="text-center mt-5">No products in cart</h3>
      )}
    </>
  );
}

export default ProductList;