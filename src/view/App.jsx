
import './assets/App.css';
import React, { useState } from 'react';
import Register from './Register';
import Login from './login';
// import reactLogo from './assets/react.svg'
// import viteLogo from '/vite.svg'
// import './assets/App.css'
// import Header from "./components/Header"
// import TopBar from "./components/TopBar"
// import Balance from "./components/Balance"
// import CategoriesDisplay from "./components/CategoriesDisplay"
// import AddTransaction from "./components/AddTrasaction"
// import FourLastestTransaction from "./components/FourLastestTransaction"
import Index from "./components/pages"

function App() {


let index = <Index />

  const [page, setPage] = useState(index);

  const [main, setMain] = useState("");

    return (
    <>
      {/* <Register></Register> */}
      <Login></Login>
    </>
    )
}

export default App
