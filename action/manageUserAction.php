<?php
include '../database/config.php';
session_start();
// =================  ADD NEW Admin/user SECTION STARTS  ================= //
    if(isset($_POST['add_user'])){

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $validation = "SELECT * from login where username = '$username'";
        $query = $conn->query($validation);
        if ($query->num_rows == 0)
        {
            $query = "INSERT into login (username,password,role,created_at) values ('$username','$password',2,now())";
            if ($conn->query($query) === TRUE){
                $_SESSION['alert'] = "Successfully Added!";
                header("Location: ../manageUser.php?activePage=manageUser");
            }
            else{
                $_SESSION['alert'] = "Error Occured While Adding New Data!";
                header("Location: ../manageUser.php?activePage=manageUser");
            }
        }
        else
        {
            $_SESSION['alert'] = "Data Already Exist!!";
            header("Location: ../manageUser.php?activePage=manageUser");

        }
    }
 
//======================== ADD NEW Admin/user SECTION ENDS ==========================//



// =================  EDIT Admin/user name SECTION STARTS  ================= //
if(isset($_POST['edit_username'])){

    $username = $_POST['username'];
    $user_id = $_POST['user_id'];
    
    // print_r($_POST);
    // die();
    $validation = "SELECT * from login where (id != $user_id and username = '$username')"; 
    //to check if other user have same username
    $query = $conn->query($validation);
    if ($query->num_rows == 0)  
    {
        $query = "UPDATE login set username='$username' where id =$user_id";
        if ($conn->query($query) === TRUE){
            $_SESSION['alert'] = "Successfully Updated!";
            header("Location: ../userList.php?activePage=userList");
        }
        else{
            $_SESSION['alert'] = "Error Occured While Updating!";
            header("Location: ../userList.php?activePage=userList");
        }
    }
    else
    {
        $_SESSION['alert'] = "Username already exists!!";
        header("Location: ../editUser.php?activePage=userList&&id=$user_id");

    }
}

//======================== EDIT Admin/user name SECTION ENDS ==========================//


// =================  EDIT Password for admin/user SECTION STARTS  ================= //
if(isset($_POST['edit_password'])){

    $username = $_POST['username'];
    $old_password = md5($_POST['old_password']);
    $new_password = md5($_POST['new_password']);
    $id = $_POST['id'];

    $validation = "SELECT * from login where (password = '$old_password' and id = '$id')"; 
    $query = $conn->query($validation);
    if ($query->num_rows > 0)  //check if old password exist for that user
    {   
        $query = "UPDATE login set password ='$new_password' where id = '$id'";
        if ($conn->query($query) === TRUE){
            $_SESSION['alert'] = "Successfully Updated!";
            header("Location: ../manageUser.php?activePage=userList");
        }
        else{
            $_SESSION['alert'] = "Error Occured While Updating!";
            header("Location: ../manageUser.php?activePage=userList");
        }
    }
    else {
        $_SESSION['alert'] = "Old Password doesn't match!!";
        header("Location: ../editUserPassword.php?activePage=userList&&id=$id");
    }



}

//======================== EDIT Password for admin/user SECTION  ==========================//



//=================== ACTIVE/Deactive Student status  STARTS ==============//
if(isset($_GET['status']) and isset($_GET['id'])){
    $status=$_GET['status'];
    $id=$_GET['id'];

    if($status==0){
       $change_status = 1;
    }
    else {
       $change_status = 0;
    }

     $query = "UPDATE login set status='$change_status' where id=$id";
       if ($conn->query($query) === TRUE)
       {
           $_SESSION['alert'] = "Successfully Updated!";
           header("Location: ../userList.php?activePage=userList");
       }
       else {
           $_SESSION['alert'] = "Update Error!";
           header("Location: ../userList.php?activePage=userList");
       }
   }
   
   //==================== ACTIVE/Deactive student status  ENDS ======================//
?>