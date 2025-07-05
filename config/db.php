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

$totalAppointments = $connect->query("SELECT COUNT(*) as total FROM appointments")->fetch_assoc()['total'];

$totalUser = $connect->query("SELECT COUNT(*) as total From users")->fetch_assoc()['total'];

$weekStart = date('Y-m-d', strtotime('monday  this week'));
$weekEnd = date('Y-m-d', strtotime('sunday this week '));

$query = "select count(*) as total FROM appointments where created_at BETWEEN '$weekStart' AND '$weekEnd'";

$result = mysqli_query($connect, $query);
$row = mysqli_fetch_array($result);
$serviceThisWeek = $row['total'] ;




?>