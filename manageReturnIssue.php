<?php $title = 'Book Management';?>
<?php include 'includes/headlink.php';?>

<body>

<?php include 'includes/sidebar.php';?>
<?php include 'includes/navbar.php';?>


    <div class="main_section">
<!--        <h4 class="text-center pt-4 font-weight-bold">Books</h4>-->

        <div class="container">
            <div class="row">
                <!-- <a href="borrowIssueList.php?activePage=borrowIssueList" class="btn btn-success mt-4 mb-2 border-0 rounded-0 font-weight-bold">Borrow Issue List</a> -->
                <form class="d-block mx-auto border col-12 mt-1 mb-5 pl-5 pr-55 m-height200" action="action/manageReturnAction.php" method="post">
                <?php if (isset($_GET['issue_id'])) {
                    $issue_id = $_GET['issue_id'];
                }
                
                ?>
                    <h4 class="d-block text-center p-4 font-weight-bold">Return Issue Details</h4>
                    <?php
                    $query = "SELECT 
                    books.id as book_id,
                    books.book_name as book_name,
                    books.isbn as isbn,
                    student.name as student_name,
                    student.student_id as student_id,
                    student.id as std_id,
                    borrow.id as borrow_id,
                    borrow.copies as number_of_books,
                    borrow.borrow_date as borrow_date,
                    borrow.expiration_date as expired_date,
                    borrow.return_date as return_date
                    FROM books 
                    INNER JOIN borrow on books.id=borrow.book_id
                    INNER JOIN student on student.id=borrow.student_id
                    WHERE borrow.id=$issue_id";
                    $row = $conn->query($query);
                    if($row->num_rows == 1){
                        while ($data = $row->fetch_assoc()) {?>
                    <input type="hidden" name="borrow_id" value="<?php echo $data['borrow_id']?>">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Book Name</label>
                        <div class="col-md-9">
                            <select name="book_id" class="form-control" readonly>
                                <!-- <option value="">Select</option> -->
                                
                            <option value="<?php echo $data['book_id']?>"><?php echo $data['book_name']?>
                            <?php echo "(".$data['isbn'].")"?></option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Borrow By (Student Name)</label>
                        <div class="col-md-9">
                            <select name="std_id" class="form-control" readonly>
                                <!-- <option value="">Select</option>      -->
                               <option value="<?php echo $data['std_id']?>"><?php echo $data['student_name']." "; echo "(".$data['student_id'].")"?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Number of Copies</label>
                        <div class="col-md-9">
                            <input type="number" value="<?php echo $data['number_of_books']?>" min=1 max="<?php echo $data['number_of_books']?>" name="stock" class="form-control" placeholder="Copy of books" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Borrowed on</label>
                        <div class="col-md-9 input-group date">
                       
                           <input type="text" class="datepicker" disabled value="<?=$data['borrow_date']?>" class="form-control" placeholder="Select a Date" name="borrow_date">
                            
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Return on</label>
                        <div class="col-md-9 input-group date">
                           <input type="text" class="datepicker" value="<?=date("Y-m-d")?>" class="form-control" placeholder="Select a Date" name="return_date">
                           
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                            <button type="submit" name="returnBook" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                     <?php }
                    }
                    ?>
                </form>
            </div>
        </div>

    </div>


<?php include 'includes/footer_link.php';?>


</body>
<html>