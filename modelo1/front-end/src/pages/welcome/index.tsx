import { Link } from "react-router";



export default function Welcome (){

    return (
        
        <div className="d-flex justify-content-center align-items-center min-vh-100 d-flex flex-column">
       
            <p className='h1'> Welcome !</p>


                <Link to="/login"> 
                    
                    <button className="btn btn-primary w-10 p-3 h-15 mb-3">Login</button>

                </Link>   
                
                   
                

               <Link to="/signup">

                    <button className="btn btn-primary w-10 p-3 h-15 mb-3">Sign up</button>
               </Link>
    

    
        </div>

        
    );

}