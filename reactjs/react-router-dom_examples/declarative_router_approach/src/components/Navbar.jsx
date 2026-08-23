import { Link, NavLink } from "react-router-dom";
function Navbar() {  
  return (
    <>
      {/* <nav className="navbar navbar-expand-lg bg-body-tertiary">
        <div className="container-fluid">
          <a className="navbar-brand" href="#">Cart</a>
        </div>
      </nav> */}
      <div style={{background: '#ccc', padding: '10px'}}>
        <NavLink style={({isActive}) => ({
          color: isActive ? "#fff" : "blue",
          backgroundColor: isActive ? "green" : "transparent",
          padding: "5px 10px",
          borderRadius: "5px",
          textDecoration: "none",
        })} to={'/'}>Home</NavLink>
        <NavLink style={({isActive}) => ({
          color: isActive ? "#fff" : "blue",
          backgroundColor: isActive ? "green" : "transparent",
          padding: "5px 10px",
          borderRadius: "5px",
          textDecoration: "none",
        })} to={'/about'}>About</NavLink>
        <NavLink style={({isActive}) => ({
          color: isActive ? "#fff" : "blue",
          backgroundColor: isActive ? "green" : "transparent",
          padding: "5px 10px",
          borderRadius: "5px",
          textDecoration: "none",
        })} to={'/contact'}>Contact Us</NavLink>
        <NavLink style={({isActive}) => ({
          color: isActive ? "#fff" : "blue",
          backgroundColor: isActive ? "green" : "transparent",
          padding: "5px 10px",
          borderRadius: "5px",
          textDecoration: "none",
        })} to={'/users'}>Users</NavLink>
      </div>
    </>
  );
}
export default Navbar;
