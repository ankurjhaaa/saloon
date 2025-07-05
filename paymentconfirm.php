<?php include_once('config/db.php') ?>
<?php

if (isset($_GET['offline_appoint_id'])) {
    $appoint_id = $_GET['offline_appoint_id'];
} elseif (isset($_GET['online_appoint_id'])) {
    $appoint_id = $_GET['online_appoint_id'];
    $payment_id = $_GET['payment_id'];
    $insertpaymentquery = $connect->query("UPDATE appointments SET paymentmode = '$online' OR status='paid' OR payment_id='$payment_id' WHERE id = '$appoint_id'");
} else {
    echo "<script>history.back();</script>";
}

$appointdetailquery = $connect->query("SELECT * FROM appointments WHERE id='$appoint_id'");
$appointdetail = $appointdetailquery->fetch_assoc();

$appointuserid = $appointdetail['userid'];
$appointuseridquery = $connect->query("SELECT * FROM users WHERE id='$appointuserid'");
$appointuseriddetail = $appointuseridquery->fetch_assoc();

$appointserviceid = $appointdetail['appointservice'];
$appointserviceidquery = $connect->query("SELECT * FROM services WHERE name='$appointserviceid'");
$appointserviceiddetail = $appointserviceidquery->fetch_assoc();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Glow & Shine - Salon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .animate-fade-in {
            animation: fadeIn 1s ease-out both;
        }

        .animate-slide-in {
            animation: slideIn 0.8s ease-out both;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        .animate-ping-once {
            animation: pingOnce 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: scale(0.95);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pingOnce {
            0% {
                transform: scale(0.2);
                opacity: 0;
            }

            80% {
                transform: scale(1.2);
                opacity: 1;
            }

            100% {
                transform: scale(1);
            }
        }
    </style>

    <style>
        .glow-button {
            animation: pulse-glow 2s infinite;
            box-shadow: 0 0 0px rgba(236, 72, 153, 0.6);
        }

        @keyframes pulse-glow {
            0% {
                box-shadow: 0 0 0px rgba(236, 72, 153, 0.5);
            }

            50% {
                box-shadow: 0 0 15px rgba(236, 72, 153, 1), 0 0 30px rgba(236, 72, 153, 0.6);
            }

            100% {
                box-shadow: 0 0 0px rgba(236, 72, 153, 0.5);
            }
        }
    </style>

</head>

<body class="bg-white">

    <?php include_once('includes/navbar.php') ?>




    <section class="min-h-screen bg-gradient-to-br from-pink-50 to-white flex items-center justify-center px-6 py-16">
        <div
            class="bg-white/70 backdrop-blur-lg border border-pink-100 rounded-2xl max-w-xl w-full p-10 text-center shadow-2xl animate-fade-in">

            <!-- Success Icon with Animation -->
            <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-green-100 flex items-center justify-center">
                <svg class="w-12 h-12 text-green-600 animate-ping-once" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <!-- Heading -->
            <h2 class="text-3xl font-bold text-gray-800 mb-2 animate-slide-in">Payment Confirmed!</h2>
            <p class="text-gray-600 mb-6 text-sm md:text-base animate-slide-in delay-100">
                Thank you for choosing <span class="text-pink-600 font-semibold">Glow & Shine</span>.
                Your appointment has been booked and payment is successfully received.
            </p>

            <!-- Appointment Summary -->
            <div
                class="text-left bg-white/80 rounded-xl border border-pink-100 p-6 mb-8 shadow-sm animate-fade-in delay-200">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-gray-500">Client</p>
                        <p class="font-semibold text-gray-800">Ankur Jha</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Date</p>
                        <p class="font-semibold text-gray-800"><?= $appointdetail['appointdate'] ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Time</p>
                        <p class="font-semibold text-gray-800"><?= $appointdetail['appointslot'] ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Service</p>
                        <p class="font-semibold text-gray-800"><?= $appointdetail['appointservice'] ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Payment Method</p>
                        <p class="font-semibold text-gray-800"><?= $appointdetail['paymentmode'] ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Status</p>
                        <p class="font-semibold text-gray-800"><?= $appointdetail['status'] ?></p>
                    </div>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="flex justify-center gap-4 animate-slide-in delay-300">
                <a href="index.php"
                    class="px-6 py-3 rounded-full bg-gray-200 text-gray-700 font-medium hover:bg-gray-300 transition">Home</a>
                <a href="myappointments.php"
                    class="px-6 py-3 rounded-full bg-pink-600 text-white font-medium hover:bg-pink-700 transition shadow-lg">View
                    Appointment</a>
            </div>
        </div>
    </section>




</body>

</html>