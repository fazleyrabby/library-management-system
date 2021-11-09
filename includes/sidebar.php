<?php if (isset($_GET['activePage'])){
    $active = $_GET['activePage'];
    $activeClass = 'activePage';
}
else {
    $active = '';
    $activeClass = '';
}
?>

<div class="sidenav bg-light border-right">
    <h5 class="pt-3 d-block text-center text-danger font-weight-bold text-uppercase">
        <?=$_SESSION['user'];?></h5>
        <ul class="sidebar_menu p-0">
            <li>
                <a href="index.php?activePage=dashboard" class="<?php if($active == 'dashboard') echo $activeClass;?>">Dashboard</a> 
            </li>
            <li>
                <a href="bookList.php?activePage=bookList" class="<?php if($active == 'bookList') echo $activeClass;?>">Book List</a>
                <a href="bookTrashlist.php?activePage=bookTrashlist" class="<?php if($active == 'bookTrashlist') echo $activeClass;?>">Book Trash List</a>
                <a href="manageBooks.php?activePage=manageBooks" class="<?php if($active == 'manageBooks') echo $activeClass;?>">Add New Books</a>
            </li>
            <li>
                <a href="studentList.php?activePage=student" class="<?php if($active == 'student' || $active == 'editStudentDetails') echo $activeClass;?>">Student List</a>
                <a href="manageStudent.php?activePage=manageStudent" class="<?php if($active == 'manageStudent') echo $activeClass;?>">Add Student</a>
            </li>
            <li>
                <a href="manageBorrowIssue.php?activePage=manageBorrowIssue"
                class="<?php if($active == 'manageBorrowIssue' || $active == 'editBooks' || $active == 'manageReturnIssue') echo $activeClass;?>">Borrow Issue</a>
                <a href="borrowIssueList.php?activePage=borrowIssueList"
                class="<?php if($active == 'borrowIssueList') echo $activeClass;?>">Borrow Issue List</a>
            </li>
        </ul>
    
    
    
    
</div>