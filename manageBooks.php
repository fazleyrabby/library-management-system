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
                <form class="d-block mx-auto border col-12 mt-1 mb-5 pl-5 pr-5 m-height200 font-weight-bold" action="action/manageBooksAction.php" method="post">
                    <h4 class="d-block text-center p-4 font-weight-bold">Book Details</h4>
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
                            <input type="text" name="bookname" class="form-control" placeholder=" Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Author Name</label>
                        <div class="col-md-9">
                            <input type="text" name="author" class="form-control" placeholder="Author Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Stock</label>
                        <div class="col-md-9">
                            <input type="number" value="1" min="1" name="stock" class="form-control" placeholder="Copy of books" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">ISBN</label>
                        <div class="col-md-9">
                            <input type="text" name="isbn" class="form-control" placeholder="ISBN number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Publisher Name</label>
                        <div class="col-md-9">
                            <input type="text" name="publisher" class="form-control" placeholder="Publisher Name">
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