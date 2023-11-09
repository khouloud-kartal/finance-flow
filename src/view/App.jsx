import { useState } from 'react'
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

let index = <Index />

function App() {
  const [page, setPage] = useState(index);

  return (
    <>
      {page}
    </>
  );
}

export default App
