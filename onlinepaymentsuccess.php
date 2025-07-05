<?php include_once('config/db.php') ?>
<?php

if (isset($_GET['online_appoint_id']) && isset($_GET['payment_id'])) {
    // your code her 
    $appoint_id = $_GET['online_appoint_id'];
    $payment_id = $_GET['payment_id'];
    $user_id = $USERDETAIL['id'];


    $appointdetailquery = $connect->query("SELECT * FROM appointments WHERE id='$appoint_id'");
    $appointdetail = $appointdetailquery->fetch_assoc();
    $appointserviceid = $appointdetail['appointservice'];
    $appointserviceidquery = $connect->query("SELECT * FROM services WHERE name='$appointserviceid'");
    $appointserviceiddetail = $appointserviceidquery->fetch_assoc();
    $servicefee = $appointserviceiddetail['price'];



    $insertpaymentquery = $connect->query("UPDATE appointments SET paymentmode = 'online', status='approve', ispaid='paid', payment_id='$payment_id' WHERE id = '$appoint_id'");

    if ($insertpaymentquery) {
        $insertrevenuedata = $connect->query("INSERT INTO revenue(userid,payment_id,type,amount) VALUE ('$user_id','$payment_id','credit','$servicefee')");
        if ($insertrevenuedata) {
            echo "<script>window.location.href='paymentconfirm.php?offline_appoint_id=$appoint_id';</script>";
        }
    }
} else {
    echo "<script>history.back();</script>";
}



?>