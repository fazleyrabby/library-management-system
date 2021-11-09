
<?php $title = 'Manage Admin & User Details';?>
<?php include 'includes/headlink.php';?>
<body>

<?php include 'includes/sidebar.php';?>
<?php include 'includes/navbar.php';?>


<div class="main_section">
        <div class="container">
            <div class="row">
                <?php if($_SESSION['role'] == 1 && isset($_GET['id'])) {
                    //Only Accessable for superadmin
                    $id=$_GET['id'];
                ?>
                <!-- <a href="borrowIssueList.php?activePage=borrowIssueList" class="btn btn-success mt-4 mb-2 border-0 rounded-0">All user list</a> -->
                <form class="d-block mx-auto border col-12 mt-1 mb-5 pl-5 pr-55 m-height200" action="action/manageUserAction.php" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                    <h4 class="d-block text-center p-4 font-weight-bold">Edit User/Admin Password</h4>
                    <?php
                    if (isset($_SESSION['alert']))
                    {
                        echo "<span class='d-block text-center alert alert-danger ' role='alert'>".$_SESSION['alert']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span>
                        </button></span>";
                    }
                    unset($_SESSION['alert']);
                    ?>
                    <div id="alert_box"></div>
                    <?php 
                    $sub = "SELECT username from login where id=$id";
                    $row = $conn->query($sub);
                    if($row->num_rows > 0){
                    while ($data = $row->fetch_assoc()) {
                        // $name = $data['username'];
                    
                    ?>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Name</label>
                        <div class="col-md-9">
                            <input type="text" name="username" class="form-control" value="<?=$data['username']?>" placeholder="Enter Name" readonly>
                        </div>
                    </div>
                    
                    <?php }
                    }?>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Old Password</label>
                        <div class="col-md-9">
                        <input type="password" name="old_password" class="form-control" placeholder="Enter Old Password" id="oldpassword" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">New Password</label>
                        <div class="col-md-9">
                        <input type="password" name="new_password" class="form-control" placeholder="Enter Password" id="password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Re-enter Password</label>
                        <div class="col-md-9">
                        <input type="password" id="re_password" name="" class="form-control" placeholder="Enter Password" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                            <button type="submit" id="submit" name="edit_password" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
  
    <?php  }
    else { ?>
            <h2 class='d-block mx-auto p-5 text-danger'><strong>Error!</strong> Sorry you cannot access this page</h2>      
    <?php } ?>
        </div>
        </div>
        </div>
    <?php include 'includes/footer_link.php';?>


    <script>
        var pass = document.querySelector('#password');
        var re_pass = document.querySelector('#re_password');
        var alert = document.querySelector('#alert_box');
        var submitBtn = document.querySelector('#submit');
        
        re_pass.onkeyup = function(e){
           main_pass = pass.value;
           if (this.value == main_pass) {
            alert.innerHTML = "<span class='d-block alert alert-success'>Password matched !!</span>";
            submitBtn.disabled = false;
           } 
           else{
            alert.innerHTML = "<span class='d-block alert alert-danger'>Password not matched!!</span>";
            submitBtn.disabled = true;
           }
        }
    
    </script>

    </body>
    <html>