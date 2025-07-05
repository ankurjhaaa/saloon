<?php include_once('config/db.php') ?>
<?php

if (isset($_GET['appoint_id'])) {
    $appoint_id = $_GET['appoint_id'];
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


</head>

<body class="bg-white">

    <?php include_once('includes/navbar.php') ?>

    <section class="min-h-screen bg-gradient-to-br from-pink-50 to-white py-16 px-6 md:px-20">
        <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-md p-8 md:p-12 border border-pink-100">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Confirm Your Appointment</h2>

            <!-- Appointment Summary -->
            <div class="grid md:grid-cols-2 gap-6 mb-10">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Name</p>
                    <p class="font-semibold text-gray-700"><?= $appointuseriddetail['name'] ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Appointment Date</p>
                    <p class="font-semibold text-gray-700"><?= $appointdetail['appointdate'] ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Time Slot</p>
                    <p class="font-semibold text-gray-700"><?= $appointdetail['appointslot'] ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Service</p>
                    <p class="font-semibold text-gray-700"><?= $appointdetail['appointservice'] ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Paying Status</p>
                    <p class="font-semibold text-gray-700"><?= $appointdetail['ispaid'] ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Fee :</p>
                    <p class="font-semibold text-gray-700"><?= $appointserviceiddetail['price'] ?></p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-sm text-gray-500 mb-1">Additional Notes</p>
                    <p class="font-semibold text-gray-700">
                        <?= !empty($appointdetail['notes']) ? $appointdetail['notes'] : 'N.A.' ?>
                    </p>
                </div>

            </div>

            <!-- Divider -->
            <hr class="my-8 border-pink-200" />

            <form action="" method="post">
                <!-- Payment Options -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Select Payment Method</h3>
                    <div class="grid gap-4 md:grid-cols-2">
                        <label
                            class="flex items-center border border-gray-300 rounded-xl p-4 cursor-pointer hover:border-pink-400 transition">
                            <input type="radio" name="payment_method" value="offline" class="accent-pink-600 mr-3"
                                checked />
                            <span class="text-gray-700 font-medium">Pay at Saloon</span>
                        </label>

                        <label
                            class="flex items-center border border-gray-300 rounded-xl p-4 cursor-pointer hover:border-pink-400 transition">
                            <input type="radio" name="payment_method" id="rzp-button" value="online"
                                class="accent-pink-600 mr-3" />
                            <span class="text-gray-700 font-medium">Online Payment</span>
                        </label>


                    </div>
                </div>

                <div class="mt-10 flex justify-between items-center">
                    <button
                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-8 py-3 rounded-full shadow-sm transition">
                        Cancel
                    </button>

                    <button type="submit" name="payment"
                        class="bg-pink-600 hover:bg-pink-700 text-white font-semibold px-8 py-3 rounded-full shadow-md transition">
                        Proceed to Confirm
                    </button>
                </div>
            </form>
            <?php
            if (isset($_POST['payment'])) {
                $payment = $_POST['payment_method'];

                if ($payment === 'offline') {
                    $insertpaymentquery = $connect->query("UPDATE appointments SET paymentmode = '$payment' WHERE id = '$appoint_id'");
                    if ($insertpaymentquery) {
                        echo "<script>window.location.href='paymentconfirm.php?appoint_id=$appoint_id';</script>";
                    }


                } elseif ($payment === 'online') {
                    // User selected Online Payment
                    echo "Online payment selected — Redirect to payment gateway.";
                    // Redirect to Razorpay/Stripe/Instamojo etc.
                } else {
                    echo "Invalid payment method.";
                }
            }
            ?>


        </div>
    </section>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById('rzp-button').onclick = function (e) {
            e.preventDefault();

            var options = {
                "key": "rzp_test_wMrelPwjtkBE1b"   ,  // ✅ Replace with Ankur bhai ka test key
                 "amount": 50000, // in paise = ₹500.00
                "currency": "INR",
                "name": "Glow & Shine Salon",
                "description": "Salon Appointment Payment",
                "handler": function (response) {
                    // ✅ Jab payment ho jaye
                    window.location.href = "payment-success.php?payment_id=" + response.razorpay_payment_id;
                },
                "prefill": {
                    "name": "<?= $USERDETAIL['name'] ?? '' ?>",
                    "email": "<?= $USERDETAIL['email'] ?? '' ?>",
                    "contact": "<?= $USERDETAIL['phone'] ?? '' ?>"
                },
                "theme": {
                    "color": "#ec4899"
                }
            };

            var rzp1 = new Razorpay(options);
            rzp1.open();
        }
    </script>


</body>

</html>