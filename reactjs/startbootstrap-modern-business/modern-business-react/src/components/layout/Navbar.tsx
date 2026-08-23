import { NavLink } from 'react-router';

export function Navbar() {
  const linkClass = ({ isActive }: { isActive: boolean }) => `nav-link${isActive ? ' active' : ''}`;
  return (
    <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
      <div className="container px-5">
        <NavLink className="navbar-brand fw-bold" to="/">Modern Business</NavLink>
        <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
          <span className="navbar-toggler-icon" />
        </button>
        <div className="collapse navbar-collapse" id="mainNav">
          <ul className="navbar-nav ms-auto mb-2 mb-lg-0">
            <li className="nav-item"><NavLink end className={linkClass} to="/">Home</NavLink></li>
            <li className="nav-item"><NavLink className={linkClass} to="/about">About</NavLink></li>
            <li className="nav-item"><NavLink className={linkClass} to="/services">Services</NavLink></li>
            <li className="nav-item"><NavLink className={linkClass} to="/contact">Contact</NavLink></li>
          </ul>
        </div>
      </div>
    </nav>
  );
}
