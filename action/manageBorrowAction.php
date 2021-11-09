<?php
include '../database/config.php';
session_start();
// =================  ADD NEW BORROW ISSUE SECTION STARTS  ================= //
    if(isset($_POST['submit'])){
        $book_id = $_POST['book_id'];
        $std_id = $_POST['std_id'];
        $stock = $_POST['stock'];
        $borrow_date = $_POST['borrow_date'];
        $expiration_date = date('Y-m-d', strtotime($borrow_date. ' + 10 days'));

        $query = "INSERT into borrow (borrow_date,expiration_date,book_id,student_id,copies,created_at) values 
        ('$borrow_date','$expiration_date','$book_id','$std_id','$stock',now())";
        if ($conn->query($query) === TRUE){
        	$update_stock = "UPDATE books set stock = stock-$stock where id=$book_id";
        	if ($conn->query($update_stock) === TRUE) {
        		$_SESSION['alert'] = "New Book Successfully Issued!";
            header("Location: ../manageBorrowIssue.php?activePage=manageBorrowIssue");
        	}
        }
        else{
            $_SESSION['alert'] = "Error Occured While Issuing New Book!";
            header("Location: ../manageBorrowIssue.php?activePage=manageBorrowIssue");
        }
    }
//=========================== ADD BORROW ISSUE SECTION ENDS ===========================//

//=============== UPDATE EXSISTING BORROW ISSUE SECTION STARTS =================//

    if(isset($_POST['update'])){
        $book_id = $_POST['book_id'];
        $std_id = $_POST['std_id'];
        $stock = $_POST['stock'];
        $prev_copy = $_POST['prev_copy'];
        $borrow_date = $_POST['borrow_date'];
        
        $expiration_date = date('Y-m-d', strtotime($borrow_date. ' + 10 days'));
        
            if ($prev_copy == $stock) 
            {
                $query = "UPDATE borrow set book_id='$book_id',student_id='$std_id',copies='$stock',borrow_date='$borrow_date',expiration_date='$expiration_date'";

                if ($conn->query($query) === TRUE){

                $_SESSION['alert'] = "Successfuly Updated!";
                header("Location: ../borrowIssueList.php?activePage=borrowIssueList");
                }
                else{
                    $_SESSION['alert'] = "Error Occured While Updating!";
                    header("Location: ../borrowIssueList.php?activePage=borrowIssueList");
                }
            }
            else {
            
            if ($prev_copy < $stock) {
                $newStock = $stock-$prev_copy;
                $finalStock = 'stock-'."$newStock";
            }
            else{
                $newStock = $prev_copy-$stock;
                $finalStock = 'stock+'."$newStock";
            }

            $query = "UPDATE borrow set book_id='$book_id',student_id='$std_id',copies='$stock',borrow_date='$borrow_date',expiration_date='$expiration_date'";

                if ($conn->query($query) === TRUE){
                $update_stock = "UPDATE books set stock = $finalStock where id=$book_id";
            	if ($conn->query($update_stock) === TRUE) {
                    $_SESSION['alert'] = "Successfuly Updated!";
                    header("Location: ../borrowIssueList.php?activePage=borrowIssueList");
                }
                else{
                    $_SESSION['alert'] = "Error Occured While Updating!";
                    header("Location: ../borrowIssueList.php?activePage=borrowIssueList");
                    // echo mysqli_error($conn);
                }
                
            }
        else{
            $_SESSION['alert'] = "Error Occured While Updating!";
            header("Location: ../borrowIssueList.php?activePage=borrowIssueList");
        }
        }
        
        
    }
//================= UPDATE EXSISTING BORROW ISSUE SECTION ENDS ==================//
?>