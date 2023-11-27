
import './assets/App.css';
import React, { useState } from 'react';
import Register from './Register';
import Login from './login';
import Index from "./components/pages"
import Header from "./components/Header";

function App() {

  const [page, setPage] = useState("");

  const handlePageChange = (newPage) => {
    setPage(newPage);
  };

  return (
    <>
      <Header onPageChange={handlePageChange}></Header>
      {page === "" && <Index></Index>}
      {page === "register" && <Register></Register>}
      {page === "login" && <Login></Login>}
    </>
  );

    
}

export default App
