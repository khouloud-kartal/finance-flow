import { useState } from 'react';

import './assets/index.css';

// import Message from './Message';

function Login() {

    const handleSubmit = async (e) => {
        e.preventDefault();
        
        const form = e.target;
    
        const formData = new FormData(form);
        const response = await fetch('http://localhost/finance-flow/src/view/actions/actions.php?login=true', 
                        {method: "POST", 
                        body: formData,
                        });
        const responseData = await response.text();
    }

    return (
      <>
        <form action="/actions/actions.php" method="post" onSubmit={handleSubmit}>

            <label htmlFor="userName">User Name</label>
            <input type="text" placeholder="User Name" name="userName"/>

            <label htmlFor="password">Password</label>
            <input type="password" placeholder="password" name="password"/>

            <button type="submit" name="submit">Submit</button>
            {/* <Message message={message}/> */}
            
        </form>
      </>
    )
  }
  
  export default Login
  