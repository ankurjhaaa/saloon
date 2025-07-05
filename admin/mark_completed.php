<?php include_once('../config/db.php') ?>
<?php include_once('includes/adminaccess.php') ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "update appointments set status = 'completed' where id = $id";
    $markResult = mysqli_query($connect, $query);

    if ($markResult) {
        echo "<script>window.location.href ='appointmentview.php?id=$id&msg=completed'</script>";
    } else {
        echo "Failed to update status.";
    }
}


















?>