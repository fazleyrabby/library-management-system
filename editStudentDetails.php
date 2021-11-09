<?php $title = 'Book Management';?>
<?php include 'includes/headlink.php';?>

<body>

<?php include 'includes/sidebar.php';?>
<?php include 'includes/navbar.php';?>


    <div class="main_section">
    <!-- <h4 class="text-center pt-4 font-weight-bold">Books</h4>-->

        <div class="container">
            <div class="row">
                <!-- <a href="studentList.php?activePage=student" class="btn btn-success mt-4 mb-2 border-0 rounded-0 font-weight-bold">Student List</a> -->
                <form class="d-block mx-auto border col-12 mt-1 mb-5 pl-5 pr-5 m-height200" action="action/manageStudentAction.php" method="post">
                    <h4 class="d-block text-center p-4 font-weight-bold">Student Details</h4>
                    <?php
                    if (isset($_SESSION['alert']))
                    {
                        echo "<span class='d-block text-center alert alert-danger ' role='alert'>".$_SESSION['alert']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span>
                        </button></span>";
                    }
                    unset($_SESSION['alert']);
                    ?>
                    <?php 

                       // if ($_GET['id']) {
                       $id = $_GET['id'];
                       // }
                       $query = "SELECT * from student where id = $id";
                       $row = $conn->query($query);
                       if ($row->num_rows > 0 ) {
                           while($data = $row->fetch_array()) {
                            // print_r($data);
                            $student_name = $data['name'];
                            $student_id = $data['student_id'];
                            $department = $data['department'];
                            $contact = $data['contact'];
                            $email = $data['email'];
                        }
                     }
                       
                    

                    ?>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Student Name</label>
                        <div class="col-md-9">
                            <input type="text" name="student_name" class="form-control" placeholder="Enter Student Name" value="<?=$student_name?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Student ID</label>
                        <div class="col-md-9">
                            <input type="text" name="student_id" class="form-control" placeholder="Enter Student ID" value="<?=$student_id?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Department</label>
                        <div class="col-md-9">
                            <input type="text" name="dept" value="<?=$department?>" class="form-control" placeholder="Enter Department Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Contact</label>
                        <div class="col-md-9">
                            <input type="text" name="contact" value="<?=$contact?>" class="form-control" placeholder="Enter Contact Number" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">E-mail</label>
                        <div class="col-md-9">
                            <input type="email" name="email" value="<?=$email?>" class="form-control" placeholder="Enter E-mail" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                            <button type="submit" name="update" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

<?php include 'includes/footer_link.php';?>

</body>
<html>