import { useState, useEffect } from "react"

export default function Login(){

    const [email, setEmail] = useState("")
    const [pwd, setPwd] = useState("")
    const [user, setUser] = useState<{ username: string } | null>(null);

    const [message, setMessage] = useState("")

    useEffect(() => {
        //verify if local storage has a user key and is not undefined
        const storedUser = localStorage.getItem("user");
        if (storedUser && storedUser !== "undefined") {

            try {
                const parsedUser = JSON.parse(storedUser);
                setUser(parsedUser);
            } catch (error) {
                console.error("Error parsing stored user:", error);
            }

          
        }
      }, []);


      async function handleSubmit(e: React.FormEvent){
        e.preventDefault()

        try {
            

            const response = await fetch("http://localhost/Signup-system/modelo1/api/login/login.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({pwd, email}),
            });
        
            const data = await response.json();

            if(data.success){
                localStorage.setItem("user", JSON.stringify(data.user));
                setUser(data.user);
            }

                setMessage(data.success ? "User Logged in successfully!" : Object.values(data.errors).join(", "));

                setEmail("");
                setPwd("");

            } catch (error) {
                setMessage("An error occurred. Please try again.");
            }

      
          

        }   


        function handleLogout() {
            fetch("http://localhost/Signup-system/modelo1/api/login/logout.php", { method: "POST" })
              .then(() => {
                localStorage.removeItem("user");
                setUser(null); 
              })
              .catch(() => alert("Logout failed"));
          }

    return (
        

        <div className="d-flex justify-content-center align-items-center min-vh-100  d-flex flex-column">

                {user ? (

                    <div className="text-center">
                    <h2>Welcome, {user.username}!</h2>
                    <button className="btn btn-danger mt-3" onClick={handleLogout}>
                    Logout
                    </button>
                    </div>
                ): (

                    <form onSubmit={handleSubmit}>

                    <div className="form-group mb-3">
                        <input type="text" className="form-control   form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" value={email} onChange={(e) => setEmail(e.target.value)} placeholder="Enter email"/>    
                    </div>
    
                    <div className="form-group mb-3">
                        <input type="password" className="form-control  form-control-lg" id="exampleInputPassword1" value={pwd} onChange={(e) => setPwd(e.target.value)} placeholder="Password"/>
                    </div>
    
                    <button className="btn btn-primary w-100 p-3 h-15 mb-3" type="submit">Login</button>            
    
                    </form>

                )}


                {message && <div className="alert  alert-success mt-3">{message}</div>}



 

        </div>
 



    )

} 
