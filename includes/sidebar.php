<?php 
function setMenuActive($menu){
    if (isset($_GET['activePage'])){
        if (in_array($_GET['activePage'], $menu)) return 'activePage';
    }
}
?>
<div class="sidenav bg-light border-right">
    <h5 class="pt-3 d-block text-center text-danger font-weight-bold text-uppercase">
        <?=$_SESSION['user'];?></h5>
        <ul class="sidebar_menu p-0">
            <li>
                <a href="index.php?activePage=dashboard" class="<?=setMenuActive(['dashboard'])?>">Dashboard</a> 
            </li>
            <li>
                <a href="bookList.php?activePage=bookList" class="<?=setMenuActive(['bookList'])?>">Book List</a>
                <a href="bookTrashlist.php?activePage=bookTrashlist" class="<?=setMenuActive(['bookTrashlist'])?>">Book Trash List</a>
                <a href="manageBooks.php?activePage=manageBooks" class="<?=setMenuActive(['manageBooks'])?>">Add New Books</a>
            </li>
            <li>
                <a href="studentList.php?activePage=student" class="<?=setMenuActive(['student','editStudentDetails'])?>">Student List</a>
                <a href="manageStudent.php?activePage=manageStudent" class="<?=setMenuActive(['manageStudent'])?>">Add Student</a>
            </li>
            <li>
                <a href="manageBorrowIssue.php?activePage=manageBorrowIssue" class="<?=setMenuActive(['manageBorrowIssue','editBooks','manageReturnIssue'])?>">Borrow Issue</a> 
                <a href="borrowIssueList.php?activePage=borrowIssueList" class="<?=setMenuActive(['borrowIssueList'])?>">Borrow Issue List</a>
            </li>
        </ul>
</div>