<?php $title = 'Book Management';?>
<?php include 'includes/headlink.php';?>
<body>
<?php include 'includes/sidebar.php';?>
<?php include 'includes/navbar.php';?>

    <div class="main_section">

    <!-- <h4 class="text-center pt-4 font-weight-bold">Books</h4>-->
        <div class="container">
            <div class="row">
                <!-- <a href="bookList.php?activePage=bookList" class="btn btn-success mt-4 mb-2 border-0 rounded-0">Book List</a> -->
                <form class="d-block mx-auto border col-12 mt-1 mb-5 m-height200" action="action/manageBooksAction.php" method="post">
                    <h4 class="d-block text-center p-4 font-weight-bold">Book Details</h4>
   
                    <?php
                    if (isset($_SESSION['alert']))
                    {
                        echo "<span class='d-block text-center alert alert-danger ' role='alert'>".$_SESSION['alert']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span>
                        </button></span>";
                    }
                    unset($_SESSION['alert']);
                    if (isset($_GET['book_id']))
                    {
                        $book_id=$_GET['book_id'];
                    }
                    $book_details = "SELECT * from books where id=$book_id";
                    $row=$conn->query($book_details);
                    if ($row->num_rows>0) {
                        while ($data = $row->fetch_assoc()) { ?>
                     
                    <input type="hidden" value="<?=$book_id?>" name=book_id>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm">Book Name</label>
                        <div class="col-md-9">
                            <input type="text" value="<?php echo $data['book_name']?>" name="bookname" class="form-control" placeholder="Enter Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm">Author Name</label>
                        <div class="col-md-9">
                            <input type="text" value="<?php echo $data['author']?>" name="author" class="form-control" placeholder="Author Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm">Stock</label>
                        <div class="col-md-9">
                            <input type="number" value="<?php echo $data['stock']?>" min="1" name="stock" class="form-control" placeholder="Copy of books" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm">ISBN</label>
                        <div class="col-md-9">
                            <input type="text" value="<?php echo $data['isbn']?>" name="isbn" class="form-control" placeholder="ISBN number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm">Publisher Name</label>
                        <div class="col-md-9">
                            <input type="text" value="<?php echo $data['publisher']?>" name="publisher" class="form-control" placeholder="Publisher Name">
                        </div>
                    </div>



                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                            <button type="submit" name="update" class="btn btn-primary">Submit</button>
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