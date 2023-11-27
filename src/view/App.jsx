
import './assets/App.css';
import React, { useState } from 'react';
import Register from './Register';
import Login from './login';

function App() {

  const [main, setMain] = useState("");

  if(main === ""){
    return (
    <>
      {/* <Register></Register> */}
      <Login></Login>
    </>
    )
  }

  
}

export default App
