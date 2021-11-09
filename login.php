<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/DataTables/datatables.css"></script>
</head>

<body class="bg-login">
<h4 class="text-center p-4 mt-5 text-light font-weight-bold">Library Management System</h4>
    <div class="container">
        <div class="row">
            <form class="d-block mx-auto border col-6 mt-5 mb-5 bg-light p-4 custom-shadow" action="action/loginAction.php" method="post">
                <?php
                session_start();
                if (isset($_SESSION['alert']))
                {
                    echo "<span class='d-block text-center alert alert-danger ' role='alert'>".$_SESSION['alert']."<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span>
                    </button></span>";
                }
                unset($_SESSION['alert']);
                ?>
                <h3 class="d-block text-center p-4">Login</h3>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label-sm">User Name</label>
                    <div class="col-md-9">
                        <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label-sm">Password</label>
                    <div class="col-md-9">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 text-center">
                        <button type="submit" name="login" class="btn btn-success">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include 'includes/footer_link.php';?>
</body>
<html>