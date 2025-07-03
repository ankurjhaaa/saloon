<?php $connect = mysqli_connect('localhost', 'root', '', 'saloon') ?>

<?php

session_start();
date_default_timezone_set('Asia/Kolkata');

function UserDetail()
{
    global $connect;
    $email = $_SESSION['email'];
    $query = $connect->query("select * from users where email='$email'");
    $UserDetail = $query->fetch_assoc();
    return $UserDetail;
}

if (isset($_SESSION['email'])) {
    $USERDETAIL = UserDetail();

}
?>