
<?php $title = 'Manage Admin & User Details';?>
<?php include 'includes/headlink.php';?>
<body>

<?php include 'includes/sidebar.php';?>
<?php include 'includes/navbar.php';?>


<div class="main_section">
        
                <?php if($_SESSION['role'] == 1) {
                    //Only Accessable for superadmin
                ?>
                <div class="container">
            <div class="row">
                <!-- <a href="borrowIssueList.php?activePage=borrowIssueList" class="btn btn-success mt-4 mb-2 border-0 rounded-0">All user list</a> -->
                <form class="d-block mx-auto border col-12 mt-1 mb-5 pl-5 pr-55 m-height200" action="action/manageUserAction.php" method="post">
                    <h4 class="d-block text-center p-4 font-weight-bold">Add Subadmin</h4>
                    <?php
                    if (isset($_SESSION['alert']))
                    {
                        echo "<span class='d-block text-center alert alert-danger ' role='alert'>".$_SESSION['alert']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span>
                        </button></span>";
                    }
                    unset($_SESSION['alert']);
                    ?>
                    <div id="alert_box"></div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Name</label>
                        <div class="col-md-9">
                            <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Password</label>
                        <div class="col-md-9">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password" id="password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label-sm text-right">Re-enter Password</label>
                        <div class="col-md-9">
                        <input type="password" id="re_password" name="" class="form-control" placeholder="Enter Password">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                            <button type="submit" id="submit" name="add_user" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

                </div>
        </div>
  
    <?php  }
    else { ?>
            <h2 class='d-block p-5 text-danger text-center'><strong>Error!</strong> Sorry you cannot access this page! </h2>     
    <?php } ?>
       
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