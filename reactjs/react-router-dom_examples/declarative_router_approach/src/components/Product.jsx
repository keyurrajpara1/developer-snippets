function Product(props) {  
  console.log(props.product)
  return (
    <>
      <div className="row mt-3">
        <div className="col-5">
          <h2>{props.product.name}<span className="badge text-bg-secondary">₹{props.product.price}</span></h2>
        </div>
        <div className="col-3">
          <div className="btn-group" role="group" aria-label="Basic mixed styles example">
            <button type="button" className="btn btn-danger" onClick={() => {props.decrementQuantity(props.product.id)}}>-</button>
            <button type="button" className="btn btn-warning">{props.product.quantity}</button>
            <button type="button" className="btn btn-success" onClick={() => {props.incrementQuantity(props.product.id)}}>+</button>
          </div>
        </div>
        <div className="col-2">
          {props.product.quantity * props.product.price}
        </div>
        <div className="col-2">
          <button className="btn btn-danger" onClick={() => {props.removeItem(props.product.id)}}>Remove</button>
        </div>
      </div>
    </>
  );
}
export default Product;
