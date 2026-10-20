import { NavLink, Link, useNavigate } from 'react-router';
import { useDispatch, useSelector } from 'react-redux';
import { logout } from '@/app/store/authenticationSlice';
export function Navbar() {
    const navigate = useNavigate();
    const dispatch = useDispatch();
    const { isAuthenticated, user } = useSelector((state: any) => state.auth);
    const linkClass = ({ isActive }: { isActive: boolean }) => `nav-link${isActive ? ' active' : ''}`;
    const getInitials = (fullName: string = '') => {
        const names = fullName.trim().split(/\s+/);
        if (names.length === 1) {
            return names[0].charAt(0).toUpperCase();
        }
        return (names[0].charAt(0) + names[names.length - 1].charAt(0)).toUpperCase();
    };
    const handleLogout = async () => {
        await dispatch(logout() as any);
        navigate('/');
    };
    return (
        <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
            <div className="container px-5">
                <NavLink className="navbar-brand" to="/">
                    Lauren
                </NavLink>
                <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon" />
                </button>
                <div className="collapse navbar-collapse" id="mainNav">
                    <ul className="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li className="nav-item">
                            <NavLink end className={linkClass} to="/">Home</NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink className={linkClass} to="/about-us">About Us</NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink className={linkClass} to="/services">Services</NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink className={linkClass} to="/contact-us">Contact Us</NavLink>
                        </li>
                        {/* <li className="nav-item">
                            <NavLink className={linkClass} to="/articles">Article</NavLink>
                        </li> */}
                        {isAuthenticated && (
                            <li className="nav-item">
                                <NavLink className={linkClass} to="/my-articles">My Post</NavLink>
                            </li>
                        )}
                        {!isAuthenticated ? (
                            <>
                                <li className="nav-item">
                                    <NavLink className={linkClass} to="/sign-in">Sign In</NavLink>
                                </li>
                                <li className="nav-item">
                                    <NavLink className={linkClass} to="/sign-up">Sign Up</NavLink>
                                </li>
                            </>
                        ) : (
                            <li className="nav-item dropdown">
                                <button type="button" className="nav-link dropdown-toggle border-0 bg-transparent" data-bs-toggle="dropdown" aria-expanded="false">
                                    {getInitials(user?.full_name)}
                                </button>
                                <ul className="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <div className="dropdown-item-text">
                                            <strong>Hello, {user?.first_name}</strong>
                                            {user?.unique_id && (<div className="small text-muted">{user.unique_id}</div>)}
                                        </div>
                                    </li>
                                    <li>
                                        <hr className="dropdown-divider" />
                                    </li>
                                    <li>
                                        <Link className="dropdown-item" to="/my-profile">My Account</Link>
                                    </li>
                                    <li>
                                        <Link className="dropdown-item" to="/update-password">Change Password</Link>
                                    </li>
                                    <li>
                                        <button type="button" className="dropdown-item" onClick={handleLogout}>Logout</button>
                                    </li>
                                </ul>
                            </li>
                        )}
                    </ul>
                </div>
            </div>
        </nav>
    );
}