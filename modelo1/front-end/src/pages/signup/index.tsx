import { useState } from "react"

export default function Signup(){

    const [username, setUsername] = useState("");
    const [email, setEmail] = useState("");
    const [pwd, setPwd] = useState("");
    const [message, setMessage] = useState("")

    async function handleSubmit(e: React.FormEvent){
        e.preventDefault()

        const response = await fetch("http://localhost/Signup-system/modelo1/api/signup/signup.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({username, pwd, email}),
          });
      
          const data = await response.json();
          
          // get the msg erros from api
          setMessage(data.success ? "User registered successfully!" : Object.values(data.errors).join(", "));

          setUsername("");
          setEmail("");
          setPwd("");


    }

    return (
        
        
        <div className="d-flex justify-content-center align-items-center min-vh-100 d-flex flex-column">

        <form onSubmit={handleSubmit}>

            <div className="form-group mb-3">

                <input type="text" className="form-control form-control-lg" value={username} onChange={(e) => setUsername(e.target.value)}  placeholder="Enter your username" />
                      
            </div>

            <div className="form-group mb-3">

                <input type="text" className="form-control  form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" value={email} onChange={(e) => setEmail(e.target.value)} placeholder="Enter email"/>    

            </div>

            <div className="form-group mb-3">
    

                <input type="password" className="form-control  form-control-lg" id="exampleInputPassword1" value={pwd} onChange={(e) => setPwd(e.target.value)} placeholder="Password"/>
                     

            </div>

            <button className="btn btn-primary w-100 p-3 h-15 mb-3" type="submit">Sign up</button>            
      


        </form>

        {message && <div className="alert alert-danger mt-3">{message}</div>}



    </div>


    )
}