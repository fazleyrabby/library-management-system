<?php
include '../database/config.php';
session_start();
// =================  ADD NEW BOOK SECTION STARTS  ================= //
    if(isset($_POST['submit'])){
        $bookname = $_POST['bookname'];
        $isbn = $_POST['isbn'];
        $author = $_POST['author'];
        $stock = $_POST['stock'];
        $publisher = $_POST['publisher'];

        $validation = "SELECT * from books where isbn = '$isbn'";
        $query = $conn->query($validation);
        if ($query->num_rows == 0)
        {
            $query = "INSERT into books (book_name,isbn,author,stock,publisher,created_at) values 
            ('$bookname','$isbn','$author','$stock','$publisher',now())";
            if ($conn->query($query) === TRUE){
                $_SESSION['alert'] = "New Book Successfully Added!";
                header("Location: ../manageBooks.php?activePage=manageBooks");
            }
            else{
                $_SESSION['alert'] = "Error Occured While Adding New Book!";
                header("Location: ../manageBooks.php?activePage=manageBooks");
            }
        }
        else
        {
            $_SESSION['alert'] = "This Book Already Exists!";
            header("Location: ../manageBooks.php?activePage=manageBooks");

        }


    }
//=========================== ADD NEW BOOK SECTION ENDS ===========================//

//=================== UPDATE EXSISTING BOOK SECTION STARTS ==============//
    if(isset($_POST['update'])){
        $bookname = $_POST['bookname'];
        $isbn = $_POST['isbn'];
        $author = $_POST['author'];
        $stock = $_POST['stock'];
        $publisher = $_POST['publisher'];
        $book_id = $_POST['book_id'];

        $validation = "SELECT * from books where isbn = '$isbn' and id != $book_id";
        $query = $conn->query($validation);
        if ($query->num_rows == 0)
        {
            $query = "UPDATE books set book_name='$bookname',isbn='$isbn',author='$author',stock='$stock',publisher='$publisher' where id=$book_id";
            if ($conn->query($query) === TRUE){
                $_SESSION['alert'] = "Successfully Updated!";
                header("Location: ../editBooks.php?activePage=editBooks&&book_id=$book_id");
            }
            else{
                // echo $conn->error;
                $_SESSION['alert'] = "Error Occured While Updating Book!";
                header("Location: ../editBooks.php?activePage=editBooks&&book_id=$book_id");
            }
        }
        else
        {
            
            
            $_SESSION['alert'] = "This Book Already Exists!";
            header("Location: ../editBooks.php?activePage=editBooks&&book_id=$book_id");

        }


    }
//====================== UPDATE EXSISTING BOOK SECTION ENDS =================//

//=================== ACTIVE/Deactive BOOK  STARTS ==============//
if(isset($_GET['status']) and isset($_GET['book_id'])){
 $status=$_GET['status'];
 $book_id=$_GET['book_id'];
 if($status==0){
    $change_status = 1;
 }
 else {
    $change_status = 0;
 }
  $query = "UPDATE books set active_status='$change_status' where id=$book_id";
    if ($conn->query($query) === TRUE)
    {
        $_SESSION['alert'] = "Successfully Updated!";
        header("Location: ../bookList.php?activePage=bookList");
    }
    else {
        $_SESSION['alert'] = "Update Error!";
        header("Location: ../bookList.php?activePage=bookList");
    }
}

//========================== ACTIVE/Deactive BOOK  ENDS ========================//




//=================== DELETE BOOK  STARTS ==============//
if(isset($_GET['delete']) and isset($_GET['book_id'])){

 $book_id=$_GET['book_id'];

  $query = "DELETE from books where id=$book_id";
    if ($conn->query($query) === TRUE)
    {
        $_SESSION['alert'] = "Successfully Deleted!";
        header("Location: ../bookTrashlist.php?activePage=bookTrashlist");
    }
    else {
        $_SESSION['alert'] = "Delete Error!";
        header("Location: ../bookTrashlist.php?activePage=bookTrashlist");
    }
}

//========================== DELETE BOOK  ENDS ========================//
?>