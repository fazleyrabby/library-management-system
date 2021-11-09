
<?php $title = 'Manage Admin & User Details';?>
<?php include 'includes/headlink.php';?>
<body>

<?php include 'includes/sidebar.php';?>
<?php include 'includes/navbar.php';?>


<div class="main_section">
        <!-- <div class="container"> -->
            <!-- <div class="row"> -->
                <?php if($_SESSION['role'] == 1) {
                    //Only Accessable for superadmin
                ?>
                
        <div class="mx-auto d-block border col-12 bg-white m-height200">
        <table class="table table-bordered display" id="example">
        
        <h4 class="pt-2 text-center font-weight-bold">User List</h4>
        
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
                <th>Name</th>
                <!-- <th>Role</th> -->
                <th>Status</th>
                <th>Edit Username</th>
                <th>Edit Password</th>
                <th>Change Status</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT id,username,role,status from login";
                $row = $conn->query($query);
                if ($row->num_rows > 0) {
                    while ($data = $row->fetch_array()) {
                        $id = $data['id'];
                        $username = $data['username'];
                        $role = $data['role'];
                        $active_status = $data['status'];
                    
                        if ($active_status == 0) { $status = '<span class="text-danger">Not Acitve</span>'; }
                        else { $status = '<span class="text-success">Active</span>';}

                        // if ($role == 1) {
                          
                        // }
                        ?>
                        <tr>
                            <td><?=$username?></td>
                            <td><?=$status;?></td>
                            <td>
                                <a href="editUser.php?activePage=userList&&id=<?=$id?>" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="editUserPassword.php?activePage=userList&&id=<?=$id?>" class="btn btn-success">Edit</a>
                            </td>
                            <td>                            
                                <a href="action/manageUserAction.php?status=<?=$active_status?>&&id=<?=$id?>" class="btn btn-danger">Change Status</a>
                            </td>
                            <td>                            
                                <a OnClick="return confirm('Are you sure?');" href="action/manageUserAction.php?delete=delete_status&&id=<?=$id?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                      <?php }
                        }
                    ?>
            </tbody>
        </table>
    </div>
    <?php  }
    else { ?>
           <h2 class='d-block p-5 text-danger text-center'><strong>Error!</strong> Sorry you cannot access this page! </h2> 
    <?php } ?>
        <!-- </div> -->
        <!-- </div> -->
        </div>
    <?php include 'includes/footer_link.php';?>

    </body>
    <html>