const handleSubmit = async (e) => {
    e.preventDefault();
    const image = e.target.image.value;
    const userName = e.target.userName.value;  
    const password = e.target.password.value;
    const confirmPassword = e.target.confirmPassword.value;

    const form = document.getElementById('registerForm');

    const formData = new FormData(form);
    const response = await fetch('http://localhost/finance-flow/src/view/actions/actions.php?register=true', 
                    {method: "POST", 
                    body: formData,
                    headers : {
                        'Access-Control-Allow-Origin ': 'http://localhost:5174/'
                    }
                    });
    const responseData = await response.text();

    console.log(responseData);

};


function Register() {
    return (
      <>
        <form action="/actions/actions.php" method="post" onSubmit={handleSubmit}id="registerForm">
            <label htmlFor="image"></label>
            <input type="file" placeholder="image" name="image"/>

            <label htmlFor="userName">User Name</label>
            <input type="text" placeholder="User Name" name="userName"/>

            <label htmlFor="password">Password</label>
            <input type="password" placeholder="password" name="password"/>

            <label htmlFor="confirmPassword">Confirm Password</label>
            <input type="password" placeholder="Confirm Password" name="confirmPassword"/>

            <button type="submit">Submit</button>
        </form>
      </>
    )
  }
  
  export default Register
  