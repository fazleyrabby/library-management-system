<?php $title = 'Book Management';?>
<?php include 'includes/headlink.php';?>

<body>

<?php include 'includes/sidebar.php';?>
<?php include 'includes/navbar.php';?>

<div class="main_section">
<div class="">
    
    <!-- <a href="manageBooks.php?activePage=manageBooks" class="btn btn-success mb-2 border-0 rounded-0">Add New Books</a> -->
    <div class="mx-auto d-block border col-12 p-4 bg-white m-height200">
        <table class="table table-bordered display" id="example" style="table-layout: fixed;">
        <h4 class="text-center font-weight-bold">Book List</h4>
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
                <th width="7%">ID</th>
                <th width="">Book Name</th>
                <th width="">Authors</th>
                <th width="10%">Quantity</th>
                <th width="">ISBN</th>
                <th width="">Publisher</th>
                <th width="8%">Update</th>
                <!-- <th>Status</th> -->
                <th width="15%">Change Status</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                $query = "SELECT * from books where active_status = 1"; 
                //showing active books
                $row = $conn->query($query);
                if ($row->num_rows > 0) {
                    while ($data = $row->fetch_array()) {
                        $id = $data['id'];
                        $book_name = $data['book_name'];
                        $isbn = $data['isbn'];
                        $author = $data['author'];
                        $publisher = $data['publisher'];
                        $stock = $data['stock'];
                        $category = $data['category'];
                        $active_status = $data['active_status'];

                        if ($isbn == 0) { $isbn = 'NULL'; }
                        
                        if ($active_status == 0) { $status = 'Inactive';}
                        else {
                           $status = 'Active';
                        }
                        ?>
               
                    <tr>
                        <td><?=$id;?></td>
                        <td><?=$book_name;?></td>
                        <td><?=$author;?></td>
                        <td><?=$stock;?></td>
                        <td><?=$isbn;?></td>
                        <td><?=$publisher;?></td>
                        <td>
                            <a href="editBooks.php?book_id=<?=$id?>&&activePage=bookList" class="btn btn-success">Edit</a>
                        </td>
                        <!-- <td><?=$status?></td> -->
                        <td>
                            <a href="action/manageBooksAction.php?status=<?=$active_status?>&&book_id=<?=$id?>" class="btn btn-danger">Change Status</a>
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