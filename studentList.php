<?php $title = 'Student Management';?>
<?php include 'includes/headlink.php';?>

<body>

<?php include 'includes/sidebar.php';?>
<?php include 'includes/navbar.php';?>

<div class="main_section">

<div class="">
    
    <!-- <a href="manageStudent.php?activePage=manageStudent" class="btn btn-success mb-2 border-0 rounded-0">Add Student</a> -->
    <div class="mx-auto d-block border col-12 p-4 bg-white m-height200">
        <table class="table table-bordered display" id="example">
        <h4 class="text-center font-weight-bold">Student List</h4>
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
                <th width="15%">Student Name</th>
                <th>Student ID</th>
                <th>Dept.</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Update</th>
                <th>Status</th>
                <th width="35%">Change Status</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT * from student";
                $row = $conn->query($query);
                if ($row->num_rows > 0) {
                    while ($data = $row->fetch_array()) {
                        $id = $data['id'];
                        $name = $data['name'];
                        $contact = $data['contact'];
                        $email = $data['email'];
                        $student_id = $data['student_id'];
                        $department = $data['department'];
                        $active_status = $data['active_status'];
                        if ($active_status == 0) { $status = '<span class="text-danger">Not Acitve</span>'; }
                        else { $status = '<span class="text-success">Active</span>';}
                        ?>
                    <tr>
                        <td><?=$id?></td>
                        <td><?=$name?></td>
                        <td><?=$student_id?></td>
                        <td><?=$department?></td>
                        <td><?=$contact?></td>
                        <td><?=$email?></td>
                        <td>
                            <a href="editStudentDetails.php?activePage=editStudentDetails&&id=<?=$id?>" class="btn btn-success">Edit</a>
                        </td>
                        <td><?=$status;?></td>
                        <td>
                            
                            <a href="action/manageStudentAction.php?status=<?=$active_status?>&&id=<?=$id?>" class="btn btn-danger">Change Status</a>
                        </td>
                       
                    </tr>
                      <?php }
                        }
                    ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<?php include 'includes/footer_link.php';?>
</body>
<html>