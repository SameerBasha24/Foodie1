<?php
session_start();
include("config.php");

   if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($db, $_POST['email']);
        
        $USER_PASSWORD = mysqli_real_escape_string($db, $_POST['password']);
        $query = "SELECT * FROM customer WHERE email = '$email' and USER_PASSWORD = '$USER_PASSWORD'";
       
        $result = $db->query($query);
        
        if(mysqli_num_rows($result) == 0){
          $_SESSION['lg']="Invalid username or password";
          
          header("location: index.php");
        }
        else{
        $_SESSION['login']="loggedin";
        $_SESSION['email']=$email;
        header("location: homepage.php");
      
       
      
        // If result matched $myusername and $mypassword, table row must be 1 row
		
      
        }

   }


        
        

        
   

?>