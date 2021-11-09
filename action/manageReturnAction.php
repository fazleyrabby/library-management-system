<?php
include '../database/config.php';
session_start();

//================= RETURN BOOKS SECTION STARTS ===================//

    if(isset($_POST['returnBook'])){
        $book_id = $_POST['book_id'];
        $std_id = $_POST['std_id'];
        $stock = $_POST['stock'];
        $return_date = $_POST['return_date'];
        $borrow_id = $_POST['borrow_id'];
        // print_r($_POST);
        // die();
        $return = "UPDATE borrow set return_date = '$return_date',status = 2 where id = $borrow_id";
        if ($conn->query($return)=== TRUE) {
            $update_stock = "UPDATE books set stock = stock+$stock where id='$book_id'";
            if ($conn->query($update_stock)===TRUE) {
                $_SESSION['alert'] = "Book Successfully Returned and stock updated!";
                header("Location: ../borrowIssueList.php?activePage=borrowIssueList");
            }
            else {
                
                $_SESSION['alert'] = "Book return and stock update Error!";
                header("Location: ../borrowIssueList.php?activePage=borrowIssueList");
            }
        }
        else {
            $_SESSION['alert'] = "Book return Error!";
            header("Location: ../borrowIssueList.php?activePage=borrowIssueList");
        }


    }

//===================== RETURN BOOKS SECTION ENDS =======================//
?>