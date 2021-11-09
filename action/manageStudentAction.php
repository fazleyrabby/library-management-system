<?php
include '../database/config.php';
session_start();
// =================  ADD NEW STUDENT SECTION STARTS  ================= //
    if(isset($_POST['submit'])){

        $student_name = $_POST['student_name'];
        $student_id = $_POST['student_id'];
        $dept = $_POST['dept'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];

        $validation = "SELECT * from student where student_id = '$student_id'";
        $query = $conn->query($validation);
        if ($query->num_rows == 0)
        {
            $query = "INSERT into student (name,contact,email,student_id,department,created_at) values 
            ('$student_name','$contact','$email','$student_id','$dept',now())";
            if ($conn->query($query) === TRUE){
                $_SESSION['alert'] = "Student Successfully Added!";
                header("Location: ../manageStudent.php?activePage=manageStudent");
            }
            else{
                $_SESSION['alert'] = "Error Occured While Adding New Data!";
                header("Location: ../manageStudent.php?activePage=manageStudent");
            }
        }
        else
        {
            $_SESSION['alert'] = "This Student Already Exist!!";
            header("Location: ../manageStudent.php?activePage=manageStudent");

        }
    }
 
//======================== ADD NEW STUDENT SECTION ENDS ==========================//

//===================== UPDATE EXSISTING STUDENT DETAILS SECTION STARTS ========//


   if (isset($_POST['update'])){
        $id = $_POST['id'];
        $student_name = $_POST['student_name'];
        $student_id = $_POST['student_id'];
        $department = $_POST['dept'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $validation = "SELECT * from student where student_id = '$student_id' and id !=$id"; 
        $query = $conn->query($validation);
        if ($query->num_rows == 0)
        {
            $query = "UPDATE student SET name='$student_name',contact='$contact',email='$email',student_id='$student_id',department='$department' where id = $id";
            if ($conn->query($query) === TRUE)
            {
                $_SESSION['alert'] = "Successfully Updated!";
                header("Location: ../editStudentDetails.php?activePage=editStudentDetails&&id=$id");
            }
            else{
                // echo $conn->error;
                $_SESSION['alert'] = "Error Occured While Updating Data!";
                header("Location: ../editStudentDetails.php?activePage=editStudentDetails&&id=$id");
            }
        }
        else
        {
            $_SESSION['alert'] = "Student ID Already Exist!!";
            header("Location: ../editStudentDetails.php?activePage=editStudentDetails&&id=$id");

        }
    }









//======================= UPDATE EXSISTING STUDENT DETAILS SECTION ENDS ========================//



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
  $query = "UPDATE student set active_status='$change_status' where id=$id";
    if ($conn->query($query) === TRUE)
    {
        $_SESSION['alert'] = "Successfully Updated!";
        header("Location: ../studentList.php?activePage=student");
    }
    else {
        $_SESSION['alert'] = "Update Error!";
        header("Location: ../studentList.php?activePage=student");
    }
}

//==================== ACTIVE/Deactive student status  ENDS ======================//