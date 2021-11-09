<?php $title = 'Assign Books';?>
<?php include 'includes/headlink.php';?>

<body>

<?php include 'includes/sidebar.php';?>
<?php include 'includes/navbar.php';?>

<div class="main_section">

<div class="">
    <!-- <a href="manageBorrowIssue.php?activePage=manageBorrowIssue" class="btn btn-success mb-2 border-0 rounded-0">Assign Books</a> -->
    
    <div class="mx-auto d-block border col-12 p-4 bg-white m-height200">
        
        <table class="table table-bordered display" id="example">
        <h4 class="text-center font-weight-bold">Borrow List</h4>
        <?php
            if (isset($_SESSION['alert']))
            {
                echo "<span class='d-block text-center alert alert-danger ' role='alert'>".$_SESSION['alert']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span>
                </button></span>";
            }
            unset($_SESSION['alert']);
        ?>
            <thead>
            <tr>
                <th>ID</th>
                <th>Borrowed By</th>
                <th>Book Name</th>
                <th>Number Of copy</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Return Issue</th>
                <!-- <th>Edit</th> -->
            </tr>
            </thead>
            <tbody>
            <?php 
            $query = "SELECT 
            books.book_name as book_name,
            student.name as student_name,
            student.student_id as student_id,
            borrow.id as borrow_id,
            borrow.copies as number_of_books,
            borrow.borrow_date as borrow_date,
            borrow.expiration_date as expired_date,
            borrow.return_date as return_date
            FROM books 
            INNER JOIN borrow on books.id=borrow.book_id
            INNER JOIN student on student.id=borrow.student_id
            ";
            $row = $conn->query($query);
            // if ($row->num_rows > 0) {
            if($row->num_rows > 0){
                while ($data = $row->fetch_assoc()) {
                    $borrow_id = $data['borrow_id'];
                    $book_name = $data['book_name'];
                    $student_name = $data['student_name'];
                    $student_id = $data['student_id'];
                    $number_of_books = $data['number_of_books'];
                    $borrow_date = $data['borrow_date'];
                    $expired_date = $data['expired_date'];
                    $return_date = $data['return_date'];
                    if ($return_date == '')
                    {
                        $return_date = 'Pending';
                        $returnButton = "<a class='btn btn-primary' href='manageReturnIssue.php?activePage=manageReturnIssue&&issue_id=$borrow_id'>Return</a>";
                        $edit = "<a class='btn btn-success' href='editBorrowIssue.php?activePage=manageReturnIssue&&issue_id=$borrow_id'>Edit</a>";
                    }
                    else 
                    {
                        $returnButton = "Book is Returned";
                        $edit = 'Not Editable';
                    }
                    ?>
               
            <tr>
                <td><?=$borrow_id;?></td>
                <td><?=$student_name;?></td>
                <td><?=$book_name;?></td>
                <td><?=$number_of_books;?></td>
                <td><?=$borrow_date;?></td>
                <td><?=$return_date;?></td>
                <td><?=$returnButton?></td>
                <!-- // <td><?=$edit;?></td> -->
            </tr>
             <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
<?php include 'includes/footer_link.php';?>


</body>
<html>