<?php $title = 'Dashboard';?>
<?php include 'includes/headlink.php';?>
<body>

<?php include 'includes/sidebar.php';?>
<?php include 'includes/navbar.php';?>

<div class="">
<div class="main_section">
    <h4 class="text-center pt-lg-5 font-weight-bold text-danger">Welcome to Library Management System </h4>
    <br>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-3">
            <div class="dashbox bg-primary border shadow">
                <span class="dashboxtext text-center d-block font-weight-bold">Books</span>
            <span class="qty text-right d-block p-2 font-weight-bold">
                <?php $books = "SELECT * from books where active_status=1";
                      $fetch = $conn->query($books);
                      $row = $fetch->num_rows;
                      echo "$row";
                ?>
            </span>
            </div>
        </div>
        <div class="col-3">
            <div class="dashbox bg-success border shadow">
                <span class="dashboxtext text-center d-block">Student</span>
            <span class="qty text-right d-block p-2">
                <?php $student = "SELECT * from student where active_status=1";
                      $fetch = $conn->query($student);
                      $row = $fetch->num_rows;
                      echo "$row";
                ?></span>
            </div>
        </div>
        <div class="col-3">
            <div class="dashbox bg-primary border shadow">
                <span class="dashboxtext text-center d-block">Issued</span>
            <span class="qty text-right d-block p-2">
                <?php $borrow = "SELECT * from borrow where status=1";
                      $fetch = $conn->query($borrow);
                      $row = $fetch->num_rows;
                      echo "$row";
                ?></span>
            </span>
            </div>
        </div>
        <div class="col-3">
            <div class="dashbox bg-success border shadow">
                <span class="dashboxtext text-center d-block">Pending</span>
            <span class="qty text-right d-block p-2">
                <?php $pending = "SELECT * from borrow where status=1";
                      $fetch = $conn->query($pending);
                      $row = $fetch->num_rows;
                      echo "$row";
                ?></span></span>
            </div>
        </div>
    
       
    </div>
</div>
</div>


<?php include 'includes/footer_link.php';?>

</body>
<html>