<?php include "../database/config.php";
session_start();

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $usercheck = "SELECT * from login where username ='$username' and password='$password'";

    $query = $conn->query($usercheck);
    
    if ($query->num_rows > 0){
        while($data = $query->fetch_array()){
            $role = $data['role'];  
        }
        $_SESSION['role']=$role;
        $_SESSION['user']=$username;
        
        header("Location: ../index.php");
    }
    else{
        $_SESSION['alert']="Username or Password not matched";
        header("Location: ../login.php");
        // session_destroy();
    }
}

?>