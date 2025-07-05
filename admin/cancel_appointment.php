<?php include_once('../config/db.php') ?>
<?php include_once('includes/adminaccess.php') ?>
<?php
$connect = mysqli_connect("localhost", "root", "", "saloon");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE appointments SET status = 'cancelled' WHERE id = $id";
    mysqli_query($connect, $query);
    header("Location: index.php?msg=cancelled");
    exit();
}
?>
