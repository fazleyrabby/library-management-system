<?php $title = 'Book Management';?>
<?php include 'includes/headlink.php';?>

<body>

<?php include 'includes/sidebar.php';?>
<?php include 'includes/navbar.php';?>


    <div class="main_section">
<!--        <h4 class="text-center pt-4 font-weight-bold">Books</h4>-->

        <div class="container">
            <div class="row">
                <!-- <a href="borrowIssueList.php?activePage=borrowIssueList" class="btn btn-success mt-4 mb-2 border-0 rounded-0">Borrow Issue List</a> -->
                <form class="d-block mx-auto border col-12 mt-1 mb-5 pl-5 pr-55 m-height200" action="action/manageBorrowAction.php" method="post">
                    <h4 class="d-block text-center p-4 font-weight-bold">Borrow Issue Details</h4>
                    <?php
                    if (isset($_SESSION['alert']))
                    {
                        echo "<span class='d-block text-center alert alert-danger ' role='alert'>".$_SESSION['alert']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span>
                        </button></span>";
                    }
                    unset($_SESSION['alert']);
                    ?>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Book Name</label>
                        <div class="col-md-9">
                            <!-- <input type="text" name="name" class="form-control" placeholder="Enter Name" required> -->
                            <select name="book_id" class="form-control" required>
                                <option value="">Select</option>
                                <?php $query = "SELECT id,book_name,isbn from books where active_status=1";
                                     $row = $conn->query($query);
                                     if ($row->num_rows > 0) {
                                         while ($data = $row->fetch_assoc()) { 
                                            $id = $data['id'];
                                            $book_name = $data['book_name'];
                                            $isbn = $data['isbn'];
                                            if ($isbn == 0) {$isbn = '';}
                                            else{
                                                $isbn = "(".$isbn.")";
                                            }
                                        ?>
                                        <option value="<?=$id?>"><?php echo "$book_name $isbn"?></option>
                                        <?php }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Borrow By (Student Name)</label>
                        <div class="col-md-9">
                            <select name="std_id" class="form-control" required>
                                <option value="">Select</option>     
                                <?php $query = "SELECT id,name,student_id from student where active_status=1";
                                     $row = $conn->query($query);
                                     if ($row->num_rows > 0) {
                                         while ($data = $row->fetch_assoc()) { 
                                            $id = $data['id'];
                                            $student_name = $data['name'];
                                            $student_id = $data['student_id'];
                                        ?>
                                        <option value="<?=$id?>"><?php echo "$student_name ($student_id)"?></option>
                                        <?php }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Number of Copies</label>
                        <div class="col-md-9">
                            <input type="number" value="1" min="1" max="3" name="stock" class="form-control" placeholder="Copy of books" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Issue Date</label>
                        <div class="col-md-9 input-group date">
                           <input type="text" class="datepicker" value="<?=date("Y-m-d")?>" class="form-control" name="borrow_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>


<?php include 'includes/footer_link.php';?>


</body>
<html>