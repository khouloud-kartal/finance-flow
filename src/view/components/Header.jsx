function Header({ onPageChange }) {

    return (
        <>
            <header>
                <img src="" alt="logo KIM finance" />
                <nav>
                    <ul>
                        <li>
                            <a href="">Home
                                <img src="" alt="" />
                            </a>
                        </li>
                        <li>
                            <a onClick={() => onPageChange("register")}>Register
                                <img src="" alt="" />
                            </a>
                        </li>
                        <li>
                            <a onClick={() => onPageChange("login")}>Login
                                <img src="" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="">Profil
                                <img src="" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="">Transaction
                                <img src="" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="">Chart
                                <img src="" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="">Disconnect
                                <img src="" alt="" />
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>
        </>
    );
}

export default Header;